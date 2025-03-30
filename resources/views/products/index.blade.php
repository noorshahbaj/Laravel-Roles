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

                        @can('product-create')
                            <a href="{{ route('products.create') }}" class="btn btn-success mb-3">Add Product</a>
                        @endcan

                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col" width="20%">Action</th>
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

                                                @can('product-list')
                                                    <a href="{{ route('products.show', $product->id) }}"
                                                        class="btn btn-info btn-sm">Show</a>
                                                @endcan

                                                @can('product-edit')
                                                    <a href="{{ route('products.edit', $product->id) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                @endcan

                                                @can('product-delete')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                @endcan
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
