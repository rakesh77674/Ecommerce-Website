@extends('dashboard');
@section('content');
<form method = "Post" action = "{{url('/store-category')}}">
@csrf
  <div class="form-group">
    <label for="Category">Category Name</label>
    <input type="name" class="form-control" name = "category_name" id="Categoryname" placeholder="CategoryName">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection