@extends('layouts.main')

@section('content')
    <div class="col-md-12">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cities</h1>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                Edit City
                <a href="{{ route('cities.index') }}" class="float-right text-decoration-none">Back</a>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('cities.update', $city->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $city->name) }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="state_id" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                        <div class="col-md-6">
                            <select id="state_id" name="state_id" class="custom-select @error('state_id') is-invalid @enderror" required>
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}" @if ($city->state->id == $state->id) selected @endif>{{ $state->name }}</option>
                                @endforeach
                            </select>

                            @error('state_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body d-flex justify-content-center">
                <form method="POST" action="{{ route('cities.destroy', $city->id) }}">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger">Delete {{ $city->name }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
