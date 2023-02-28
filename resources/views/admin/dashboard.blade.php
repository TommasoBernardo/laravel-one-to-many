@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-info my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="col">
            <div class="card">
                <div class="card-header bg-info text-light">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
    <div>
        <h3 class="fw-bold text-center mt-5">choose the button</h3>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-6 text-center">
                <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">list-films</a>
            </div>
            <div class="col-6 text-center">
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">create-films</a>
            </div>
        </div>
    </div>
    </div>
@endsection
