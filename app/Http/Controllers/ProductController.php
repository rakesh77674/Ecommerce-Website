<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = ProductSubCategory::all();
        return view('products.create',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->product_name = $request->product_name;
        $product->slug = $request->product_name;
        $product->price = $request->price;
        $banner = $request->banner;
        $imageName = time().'.'.$banner->getClientOriginalExtension();
        $request->banner->move('productimage', $imageName);
        $product->banner = "/productimage/".$imageName;
        $product->product_sub_categories_id = $request->product_sub_categories_id;
        $product->description = $request->description;
        $product->updated_by = Auth::user()->id;
        $product->created_by = Auth::user()->id; 
        $product->save();
        return redirect('/product');
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
    public function edit($id)
    {
        $editproducts = Product::find($id);
        $product = ProductSubCategory::all();
        return view("products.edit",compact('editproducts','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->slug = $request->product_name;
        $product->price = $request->price;
        $banner = $request->banner;
        $imageName = time().'.'.$banner->getClientOriginalExtension();
        $request->banner->move('productimage', $imageName);
        $product->banner = "/productimage/".$imageName;
        $product->product_sub_categories_id = $request->product_sub_categories_id;
        $product->description = $request->description;
        $product->updated_by = Auth::user()->id;
        $product->created_by = Auth::user()->id; 
        $product->save();
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return Redirect("/product");
    }
}
