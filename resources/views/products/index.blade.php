@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Products') }}</div>
                    <div class="card-body">
                        @session('success')
                            <div class="alert alert-success">{{ $value }}</div>
                        @endsession

                        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add Product</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <th>{{ $product->id }}</th>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            <form method="post" action="{{ route('products.destroy', $product->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('products.show', $product->id) }}"
                                                    class="btn btn-info btn-sm">Show</a>
                                                <a href="{{ route('products.edit', $product->id) }}"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
