<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories =Category::get();

        return view('dashboard.categories.categories',compact('categories'));
    }


    public function addCategoryPage()
    {
        return view('dashboard.categories.add_category');
    }


    public function editCategoryPage($id)
    {
        $category =Category::find($id)->first();
        $categories =Category::get();

        return view('dashboard.categories.edit_category',compact('category','categories'));
    }







    public function CompanyAddCategoryPage()
    {
        return view('company.categories.add_category');
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'description' =>  'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'success' => 0,
                'errors' => $validator->getMessageBag()->toArray()

            ]);
        }



        $new_category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'parent_id' => $request->has('parent_id') ? $request->parent_id : null,
        ]);





        if ($new_category){
            return response()->json([
                'success' => 1,
                'msg' => 'saved successful',
            ]);
        }
    }


    public function show(Category $category)
    {
    }


    public function edit(Category $category)
    {

    }



    public function update(Request $request)
    {


        $rules = [
            'name' => 'required',
            'description' =>  'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'success' => 0,
                'errors' => $validator->getMessageBag()->toArray()

            ]);
        }



  $updated_category = Category::where('id', $request->id)
        ->update([
            'name' => $request->name,
            'description' => $request->description,
            'parent_id' => $request->has('parent_id') ? $request->parent_id : null,
        ]);





        if ($updated_category){
            return response()->json([
                'success' => 1,
                'msg' => 'saved successful',
            ]);
        }
    }


    public function destroy(Category $category)
    {

    }
}
