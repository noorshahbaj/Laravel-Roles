@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Users') }}</div>
                    <div class="card-body">
                        @session('success')
                            <div class="alert alert-success">{{ $value }}</div>
                        @endsession

                        @can('user-create')
                            <a href="{{ route('users.create') }}" class="btn btn-success mb-3">Add User</a>
                        @endcan

                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col" width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th>{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @foreach ($user->getRoleNames() as $role)
                                                <button class="btn btn-success btn-sm">{{ $role }}</button>
                                            @endforeach
                                        </td>
                                        <td>
                                            <form method="post" action="{{ route('users.destroy', $user->id) }}">
                                                @csrf
                                                @method('DELETE')

                                                @can('user-list')
                                                    <a href="{{ route('users.show', $user->id) }}"
                                                        class="btn btn-info btn-sm">Show</a>
                                                @endcan

                                                @can('user-edit')
                                                    <a href="{{ route('users.edit', $user->id) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                @endcan

                                                @can('user-delete')
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
