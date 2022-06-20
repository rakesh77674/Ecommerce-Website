    @extends('dashboard')
    @section('content')
    <form method = "post" action = "{{route('update.index',$editproducts->id)}}" enctype="multipart/form-data">
    @csrf
    @method('put')
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputEmail4">Product Name</label>
            <input type="text" name = "product_name" class="form-control" value = "{{$editproducts->product_name}}" id="product_name" placeholder="product_name" required>
            </div>
            <div class="form-group col-md-6">
            <label for="inputPassword4">price</label>
            <input type="text" name = "price" class="form-control"value = "{{$editproducts->price}}" id="price" placeholder="contact" required>
            </div>
        </div>
        <div class="form-group col-md-4">
            <label for="inputState">SubCategory_Name</label>
            <select id="inputState" class="form-control"  name ="product_sub_categories_id" required>
                <option selected>Choose...</option>
                  @foreach($product as $SubCategories)
                <option value = "{{$SubCategories->id}}">{{$SubCategories->subcategory_name}}</option>
                @endforeach
            </select>
        </div>
        <div class = "form-group">
           <label for="img">Image:</label>
           <img style = "height: 150px;padding: 20px 20px; text-align: center;" src = "{{$editproducts->banner}}">
    </div>
        <div class = "form-group">
               <label for="img">Image:</label>
               <input type="file" id="img" name="banner" accept="image/*" required>
        </div>
         <div class = "form-group">
              <label for="inputAddress">description</label>
            <input type="text" name = "description" class="form-control" value = "{{$editproducts->description}}" id="description" placeholder="description" required>
              
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endsection