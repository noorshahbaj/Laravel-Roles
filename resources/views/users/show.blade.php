@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Show User') }}</div>
                    <div class="card-body">
                        <a href="{{ route('users.index') }}" class="btn btn-info mb-3">Back</a>

                        <p><strong>Name: {{ $user->name }}</strong></p>
                        <p><strong>Email: {{ $user->email }}</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
