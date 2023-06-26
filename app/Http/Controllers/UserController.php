<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Admin;

use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {

     $users = Admin::all();

        return view('Dashboard.users.index' , compact('users'));

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        $roles = Role::pluck('name','name')->all();

        return view('Dashboard.users.create',compact('roles'));

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {
    // return $request;
        $rules = [
            'first_name' =>  'required',
            'last_name' => 'required',
            'user_name' => 'required',
            'password' => ['confirmed'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'success' => 0,
                'errors' => $validator->getMessageBag()->toArray()

            ]);
        }




        $input = $request->all();

        $input['password'] = Hash::make($input['password']);



        $user = Admin::create($input);

       $user->assignRole($request->input('roles'));


        if ($user)
        return response()->json([
            'status' => 1,
            'msg' => 'saved successful',
        ]);

    }



    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $user = User::find($id);

        return view('Dashboard.users.show',compact('user'));

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $user = Admin::find($id);

        $roles = Role::pluck('name','name')->all();

        $userRole = $user->roles->pluck('name','name')->all();



        return view('Dashboard.users.edit',compact('user','roles','userRole'));

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id)

    {
        //  return $request;
        // $this->validate($request, [

        //     'name' => 'required',

        //     'email' => 'required|email|unique:users,email,'.$id,

        //     'password' => 'same:confirm-password',

        //     'roles' => 'required'

        // ]);



        $input = $request->all();

        if(!empty($input['password'])){

            $input['password'] = Hash::make($input['password']);

        }else{

            $input = Arr::except($input,array('password'));

        }



        $user = User::find($id);

        $user->update($input);

        DB::table('model_has_roles')->where('model_id',$id)->delete();



        $user->assignRole($request->input('roles'));



        return redirect()->route('admin.users.index')

                        ->with('success','User updated successfully');

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        User::find($id)->delete();

        return redirect()->route('admin.users.index')

                        ->with('success','User deleted successfully');

    }

}
