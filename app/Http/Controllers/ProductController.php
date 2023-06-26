<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Rules\UserOwnsProduct;
use App\Services\RecommendationService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
        return response()->json($request);
    }

    public function addProductPage()
    {
        $brands = Brand::get();
        $categories = Category::get();
        return view('dashboard.products.add_product', compact('brands', 'categories'));
    }
    public function editProductPage()
    {
        return view('dashboard.products.edit_product');
    }


    public function companyAddProductPage()
    {
        $brands = Brand::get();
        $categories = Category::get();
        $company = Category::get();


        return view('company.products.add_product');
    }
    public function companyEditProductPage()
    {
        return view('company.products.edit_product');
    }










    public function index()
    {
        // ini_set("max_execution_time", "-1");
        // ini_set("max_file_uploads", "200M");
        // ini_set("max_input_time", "1000000000000");
        // ini_set("memory_limit", "1000000000000M");
        // ini_set('post_max_size', '5000000000000M');
        // ini_set('upload_max_filesize', '50000000000000M');
        // $recommendationservice = new RecommendationService;
        // $x = $recommendationservice->getRecommendedProducts(auth()->user()->id);
        // return response()->json($x);

        return view('dashboard.products.products');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        return $request;
        
        $rules = [
            'name' => 'required',
            'description' =>  'required|numeric',
            'email' =>  'required',
            'password' => ['confirmed'],

        ];



        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'table' => 'User',
            'table_id' => auth()->user()->id
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Product created successfully',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $product = Product::find($request->product_id);
        $this->validate($request, [
            'product_id' => ['required', new UserOwnsProduct($product)],
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        if (auth()->company_id != null) {
            $product->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->quantity,
            ]);
        } else {
            $product->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->quantity,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
