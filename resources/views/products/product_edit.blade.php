@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-3 mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('product/viewlist') }}">Product List</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Product {{ $single_products->product_name }}</li>
          </ol>
         </nav>
        <div class="card">
          <div class="card-header">
            <h2 class="text-info">Edit Products</h2>
            <!-- success message -->
            @if(session('edit_msg'))
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                 <strong>Good! </strong> {{ session('edit_msg') }}
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
            @endif
          </div>
          <div class="card-body">
            <form action="{{ url('product/edit/insert') }}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="product_id" value="{{ $single_products->id }}">

              <div class="form-group">
                <label for="exampleInputEmail1">Ctegory Name</label>
                <select class="form-control" name="category_name" >
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ ($single_products->category_id == $category->id)?'selected':'' }}>{{ $category->category_name }}</option>
                  @endforeach

                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Product Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $single_products->product_name }}" name="product_name">
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Product Price</label>
                <input type="text" class="form-control" id="exampleInputPassword1" value="{{ $single_products->product_price }}" name="product_price">
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Product Description</label>
                <textarea type="text" class="form-control" id="exampleInputPassword1" cols="3" name="product_description">
                  {{ $single_products->product_description }}
                </textarea>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Product Quantity</label>
                <input type="text" class="form-control" id="exampleInputPassword1" value="{{ $single_products->product_quantity }}" name="product_quantity">
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Alert Quantity</label>
                <input type="text" class="form-control" id="exampleInputPassword1" value="{{ $single_products->alert_quantity }}" name="alert_quantity">
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Product Image</label>
                <input type="file" class="form-control" id="exampleInputPassword1" name="product_image"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1" class="text-danger">Preview</label>
                <img id="blah" alt="your image" width="100" height="100" src="{{ asset('uploads/product_img') }}/{{ $single_products->product_image }}" />
              </div>
              <button type="submit" class="btn btn-primary">Edit Products</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
