<?php

namespace App\Http\Controllers;

use App\Models\ProductSubCategory;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productSubCategory = ProductSubCategory::all();
        return view('products.productSubCategory.index', compact('productSubCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = ProductCategory::all();
        return view('products.productSubCategory.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new ProductSubCategory;
        $category->product_categories_id = $request->product_categories_id;
        $category->subcategory_name = $request->subcategory_name;
        $category->slug = $request->subcategory_name;
        $category->updated_by = Auth::user()->id;
        $category->created_by = Auth::user()->id;
        $category->save();
        return redirect('/productSubCategory');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductSubCategory  $productSubCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductSubCategory $productSubCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductSubCategory  $productSubCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editsubcategory = ProductSubCategory::find($id);
        $category = ProductCategory::all();
        return view("products.productSubCategory.edit",compact('editsubcategory','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductSubCategory  $productSubCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = ProductSubCategory::find($id);
        $category->product_categories_id = $request->product_categories_id;
        $category->subcategory_name = $request->subcategory_name;
        $category->slug = $request->subcategory_name;
        $category->updated_by = Auth::user()->id;
        $category->created_by = Auth::user()->id;
        $category->save();
        return redirect('/productSubCategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductSubCategory  $productSubCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       ProductSubCategory::find($id)->delete();
       return redirect('/productSubCategory');
    }
}
