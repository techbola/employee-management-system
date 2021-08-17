@extends('layouts.main')

@section('content')
    <div class="col-md-12">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">All Users</h1>
        </div>
        <div>
          @if (session()->has('message'))
            <div class="alert alert-success">
              {{ session('message') }}
            </div>
          @endif
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
              <form method="GET" action="{{ route('users.index') }}">
                <div class="form-row align-items-center">
                  <div class="col-auto">
                    <input type="text" name="search" class="form-control mb-2" placeholder="Search">
                  </div>
                  <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                  </div>
                </div>
              </form>
              <div>
                <a href="{{ route('users.create') }}" class="btn btn-primary">Create</a>
              </div>
            </div>
            <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Username</th>
                      <th scope="col">Email</th>
                      <th scope="col">Manage</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                        <tr>
                          <th scope="row">{{ $user->id }}</th>
                          <td>{{ $user->username }}</td>
                          <td>{{ $user->email }}</td>
                          <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success">Edit</a>
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
