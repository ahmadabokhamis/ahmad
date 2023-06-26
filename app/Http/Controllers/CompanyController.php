<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $companies =Company::get();
        return view('dashboard.companies.companies',compact('companies'));
    }
    public function addCompanyPage()
    {
        return view('dashboard.companies.add_company');
    }

    public function editCompanyPage($id)
    {    $company =Company::find($id)->first();
        return view('dashboard.companies.edit_company',compact('company'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'name' => 'required',
            'desciption' =>  'required',
            'establishment_date' =>  'required',
            'product_description' =>  'required',
            'phone' =>  'required|numeric',
            'country' =>  'required',
            'address' =>  'required',
            'email' =>  'required',

            'region' =>  'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'success' => 0,
                'errors' => $validator->getMessageBag()->toArray()

            ]);
        }



        $new_company = Company::create([
            'name' => $request->name,
            'desciption' => $request->desciption,
            'establishment_date' => $request->establishment_date,
            'product_description' => $request->product_description,
            'phone' => $request->phone,
            'email' => $request->email,
            'country' => $request->country,
            'region' => $request->region,
            'address' => $request->address,
        ]);





        if ($new_company){
            return response()->json([
                'success' => 1,
                'msg' => 'saved successful',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {

        $rules = [
            'name' => 'required',
            'desciption' =>  'required',
            'establishment_date' =>  'required',
            'product_description' =>  'required',
            'phone' =>  'required|numeric',
            'country' =>  'required',
            'address' =>  'required',
            'email' =>  'required',
            'region' =>  'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'success' => 0,
                'errors' => $validator->getMessageBag()->toArray()

            ]);
        }



        $updated_company = Company::where('id', $request->id)
        ->update([
            'name' => $request->name,
            'desciption' => $request->desciption,
            'establishment_date' => $request->establishment_date,
            'product_description' => $request->product_description,
            'phone' => $request->phone,
            'email' => $request->email,
            'country' => $request->country,
            'region' => $request->region,
            'address' => $request->address,
        ]);


        if ($updated_company){
            return response()->json([
                'success' => 1,
                'msg' => 'saved successful',
            ]);
        }
    }






    public function destroy(Company $company)
    {
        //
    }
}
