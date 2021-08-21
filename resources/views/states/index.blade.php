@extends('layouts.main')

@section('content')
    <div class="col-md-12">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">States</h1>
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
              <form method="GET" action="{{ route('states.index') }}">
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
                <a href="{{ route('states.create') }}" class="btn btn-primary">Create</a>
              </div>
            </div>
            <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">State</th>
                      <th scope="col">Country</th>
                      <th scope="col">Manage</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($states as $state)
                        <tr>
                          <th scope="row">{{ $state->id }}</th>
                          <td>{{ $state->name }}</td>
                          <td>{{ $state->country->name }}</td>
                          <td>
                            <a href="{{ route('states.edit', $state->id) }}" class="btn btn-success">Edit</a>
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
