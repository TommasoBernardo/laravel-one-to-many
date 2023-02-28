@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-info  bg-opacity-25">
        <div>
            <div class="logo">
                <h1 class="text-danger fw-bold">
                    PORTFOLIO
                </h1>
            </div>
            <h3 class="display-5 fw-bold">
                Welcome to Portfolio & Films
            </h3>

            <p class="col-md-8 fs-4">Enjoy an experience where you can get detailed information about all kinds of moviesx
            </p>
            <a href="{{ url('profile') }}" class="btn btn-primary btn-lg" type="button">Go to
                log-in</a>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora temporibus, dicta nemo aliquam totam nisi
                deserunt soluta quas voluptatum ab beatae praesentium necessitatibus minus, facilis illum rerum officiis
                accusamus dolores!</p>
        </div>
    </div>
@endsection
