@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Show Role') }}</div>
                    <div class="card-body">
                        <a href="{{ route('roles.index') }}" class="btn btn-info mb-3">Back</a>

                        <p><strong>Name: <span class="text-success">{{ $role->name }}</span></strong></p>

                        <h4>Permissions:</h4>
                        <table class="table table-striped table-bordered w-25">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($role->permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->name }}</td>
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
