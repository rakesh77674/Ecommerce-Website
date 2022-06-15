@extends('dashboard')
@section('content')
<a href="/add-subcategory">
            <span class="btn btn-success col fileinput-button" style = "width: 178px;">
                <i class="fas fa-plus"></i>
                <span>Add SubCategory</span>
              </span>
            </a>       
<table class="table table-bordered">
  <thead>
    <tr class = "bg-primary">  
    
      <th scope="col">CategoryName</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    @foreach($productCategory as $productcategories)  
      <td>{{$productcategories->category_name}}</td>
      <td>{{$productcategories->status}}</td>
      <td>
      <button type="submit" class="btn btn-warning" style ="background: red; color:white; ">Delete</button>
       <button type="submit" class="btn btn-primary" style = "width: 23%; padding: 2px; margin: 2px;height: 35px;">Edit</button>
      </td>
      @endforeach
    </tr>
  </tbody>
</table>
  @endsection