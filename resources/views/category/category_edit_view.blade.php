@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-3 mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('category/add/view') }}">Category List</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Category {{ $single_category_info->category_name }}</li>
          </ol>
         </nav>
        <div class="card">
          <div class="card-header">
            <h2 class="text-info">Edit Categories</h2>
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
            <form action="{{ url('category/edit/insert') }}" method="post">
              @csrf
              <input type="hidden" name="category_id" value="{{ $single_category_info->id }}">
              <div class="form-group">
                <label for="exampleInputEmail1">Category Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $single_category_info->category_name }}" name="category_name">
              </div>
              <button type="submit" class="btn btn-primary">Update Category</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
