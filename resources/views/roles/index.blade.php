@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Roles') }}</div>
                    <div class="card-body">
                        @session('success')
                            <div class="alert alert-success">{{ $value }}</div>
                        @endsession

                        @can('role-create')
                            <a href="{{ route('roles.create') }}" class="btn btn-success mb-3">Add Role</a>
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
                                @foreach ($roles as $role)
                                    <tr>
                                        <th>{{ $role->id }}</th>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <form method="post" action="{{ route('roles.destroy', $role->id) }}">
                                                @csrf
                                                @method('DELETE')

                                                @can('role-list')
                                                    <a href="{{ route('roles.show', $role->id) }}"
                                                        class="btn btn-info btn-sm">Show</a>
                                                @endcan

                                                @can('role-edit')
                                                    <a href="{{ route('roles.edit', $role->id) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                @endcan

                                                @can('role-delete')
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
