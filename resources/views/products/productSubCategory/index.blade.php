@extends('dashboard')
@section('content')
<a href="/add-category">
            <span class="btn btn-success col fileinput-button" style = "width: 178px;">
                <i class="fas fa-plus"></i>
                <span>Add Category</span>
              </span>
            </a>       
<table class="table table-bordered">
  <thead>
    <tr class = "bg-primary">  
      <th scope="col">product_categories_id</th>
      <th scope="col">SubCategory Name</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($productSubCategory as $productSubCategories)
    <tr>
    <td>{{$productSubCategories->product_categories_id}}</td>
      <td>{{$productSubCategories->subcategory_name}}</td>
      <td>{{$productSubCategories->status}}</td>
      <td>
      <form method = "post" action = "{{route('destroy.subcategory',$productSubCategories->id)}}">
      @csrf
      @method('delete')
      <button type="submit" class="btn btn-warning" style ="background: red; color:white; ">Delete</button>
      </form>
       <form method = "get" action = "{{route('edit.subcategory', $productSubCategories->id)}}">
      <button type="submit" class="btn btn-primary" style = "width: 23%; padding: 2px; margin: 2px;height: 35px;">Edit</button>
      </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
  @endsection