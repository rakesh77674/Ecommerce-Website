    @extends('dashboard')
    @section('content')
    <form method = "post" action = "{{url('/store-product')}}" enctype="multipart/form-data">
    @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputEmail4">Product Name</label>
            <input type="text" name = "product_name" class="form-control" id="product_name" placeholder="product_name">
            </div>
            <div class="form-group col-md-6">
            <label for="inputPassword4">price</label>
            <input type="text" name = "price" class="form-control" id="price" placeholder="contact">
            </div>
        </div>
        <div class="form-group col-md-4">
            <label for="inputState">SubCategory_Name</label>
            <select id="inputState" class="form-control" name ="product_sub_categories_id">
                <option selected>Choose...</option>
                  @foreach($product as $SubCategories)
                <option value = "{{$SubCategories->id}}">{{$SubCategories->subcategory_name}}</option>
                @endforeach
            </select>
        </div>
        <div class = "form-group">
               <label for="img">Image:</label>
               <input type="file" id="img" name="banner" accept="image/*">
        </div>
         <div class = "form-group">
              <label for="inputAddress">description</label>
            <input type="text" name = "description" class="form-control" id="description" placeholder="description">
              
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endsection