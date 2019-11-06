@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome {{ Auth::User()->name }}, Now You are logged in </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">SL.</th>
                          <th scope="col">User Name</th>
                          <th scope="col">User Email</th>
                          <th scope="col">Created At</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach ($users as $key => $user)
                          <tr>
                            <th scope="row">{{ $users->firstItem()+$key }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->diffForHumans()}}</td>
                          </tr>
                        @endforeach

                      </tbody>
                    </table>
                    {{ $users->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
