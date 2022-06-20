@extends('dashboard')
@section('content')
<a href="/add-product">
    <span class="btn btn-success col fileinput-button" style = "width: 138px;">
        <i class="fas fa-plus"></i>
        <span>Add Product</span>
      </span>
    </a>
        <a href="/add-category">
        <span class="btn btn-success col fileinput-button" style = "width: 140px;">
            <i class="fas fa-plus"></i>
            <span>Add Category</span>
          </span>
        </a>
        <a href="/add-subcategory">
            <span class="btn btn-success col fileinput-button" style = "width: 178px;">
                <i class="fas fa-plus"></i>
                <span>Add SubCategory</span>
              </span>
            </a>
        <table class="table table-bordered">
            <thead>
            <tr class = "bg-primary">
                <th scope="col">Product subCategory Name</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">description</th>
                <th scope="col">image</th>
                <th scope="col">status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$product->product_sub_categories_id}}</td>
                <td>{{$product->product_name}}</td>
                <td>${{$product->price}}</td>
                <td>{{$product->description}}</td>
                <td><img height = "50" width = "50" margin = "12"src = "{{$product->banner}}"></td>
                <td>{{$product->status}}</td>
                <td>
                <form method = "post" action = "{{route('destroy.index',$product->id)}}">
                 @csrf
                 @method('delete')
                <button type="submit" class="btn btn-warning" style ="background: red; color:white; ">Delete</button>
                </form>
                <form method = "post" action = "{{route('edit.index',$product->id)}}">
                @csrf
                <button type="submit" class="btn btn-primary" style = "width: 23%; padding: 2px; margin: 2px;height: 35px;">Edit</button>
                </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
  @endsection