@extends('dashboard');
@section('content');
<form method ="Post" action ="{{route('update.subcategory',$editsubcategory->id)}}">
@csrf
@method('put')
       <div class="form-group"> 
       <label for="Category">Category Name</label>
         <select id="inputState" class="form-control" name ="product_categories_id">
          <option selected>Choose...</option>
            @foreach ($category as $categories) 
          <option value="{{$categories->id}}">{{$categories->category_name}}</option>
            @endforeach 
          </select>
      </div>
  <div class="form-group">
    <label for="Category">SubCategory Name</label>
    <input type="name" class="form-control" name = "subcategory_name" value = "{{$editsubcategory->subcategory_name}}" id="subCategoryname" placeholder="subCategoryName">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection