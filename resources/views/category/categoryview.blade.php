@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <div class="card">
          <div class="card-header">
            <h2 style="color:red">Add Categories</h2>
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
            <form action="{{ url('category/insert') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Category Name</label>
                <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Category Name" name="category_name" value="{{ old('category_name') }}">
                @error('category_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Add Category</button>
            </form>
          </div>

        </div>
      </div>
      <div class="col-md-7">
        <div class="card">
          <div class="card-header">
            <h2 style="color:orange;">View All Categories</h2>
            @if(session('delete_message'))
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                 <strong>Good! </strong> {{ session('delete_message') }}
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
            @endif
          </div>
          <div class="card-body">
            <table class="table table-bordered">
             <thead>
               <tr>
                 <th scope="col">SL.</th>
                 <th scope="col">Category Name </th>
                 <th scope="col">Created_at</th>
                 <th scope="col">Action</th>
               </tr>
             </thead>
             <tbody>
               @forelse($categories as $key => $category)
                 <tr>
                   <td> {{ $categories->firstItem()+$key }}</td>
                   <td>{{ $category->category_name }}</td>
                   <td>{{ $category->created_at->diffForHumans() }}</td>
                   <td>
                     <a href="{{ url('category/edit') }}/{{ $category->id }}" class="btn btn-warning btn-sm">Edit</a> |
                     <a href="{{ url('category/delete') }}/{{ $category->id }}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure delete product [{{ $category->category_name }}]')"> Delete</a>
                   </td>
                 </tr>
               @empty
                 <tr class="text-center text-danger">
                   <td colspan="4"> No Data Available</td>
                 </tr>
               @endforelse
             </tbody>
           </table>
           {{ $categories->links() }}

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
