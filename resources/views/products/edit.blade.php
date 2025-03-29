@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Update Product') }}</div>
                    <div class="card-body">
                        <a href="{{ route('products.index') }}" class="btn btn-info mb-3">Back</a>
                        <form method="POST" action="{{ route('products.update', $product->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name"
                                    value="{{ $product->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
