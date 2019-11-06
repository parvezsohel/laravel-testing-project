@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-3">
        <div class="card">
          <div class="card-header">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('product/viewlist') }}">View Products list</a></li>
              </ol>
            </nav>
            <h2 style="color:red">Add Products</h2>
            <!-- <ul>
               @foreach($errors->all() as $error) // default error message
                <li>{{ $error }}</li>
               @endforeach
            </ul> -->

            <!-- success message -->
           @if(session('message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Good! </strong> {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
           @endif

          </div>
          <div class="card-body">
            <form action="{{ url('product/insert') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Category Name</label>
                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" >
                  <option value="">--Select One--</option>
                  @foreach ($categories as $key => $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                  @endforeach
                </select>
                @error('category_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Product Name</label>
                <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Product Name" name="product_name" value="{{ old('product_name') }}">
                @error('product_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Product Price</label>
                <input type="text" class="form-control @error('product_price') is-invalid @enderror" id="exampleInputPassword1" placeholder="Enter Your Product Price" name="product_price" value="{{ old('product_price') }}">
                @error('product_price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Product Description</label>
                <textarea type="text" class="form-control @error('product_description') is-invalid @enderror" id="exampleInputPassword1" cols="3" name="product_description">
                  {{ old('product_description') }}
                </textarea>
                @error('product_description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Product Quantity</label>
                <input type="text" class="form-control @error('product_quantity') is-invalid @enderror" id="exampleInputPassword1" placeholder="Enter Your Product Quantity" name="product_quantity" value="{{ old('product_quantity') }}">
                @error('product_quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Alert Quantity</label>
                <input type="text" class="form-control @error('alert_quantity') is-invalid @enderror" id="exampleInputPassword1" placeholder="Enter Your Product Alert Qantity" name="alert_quantity" value="{{ old('alert_quantity') }}">
                @error('alert_quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Product Image</label>
                <input type="file" class="form-control @error('product_image') is-invalid @enderror" id="exampleInputPassword1" name="product_image">
                @error('product_image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Add Products</button>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
