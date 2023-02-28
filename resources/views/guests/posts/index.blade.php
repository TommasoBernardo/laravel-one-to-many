@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center g-4">
            <div class="col-12">
                <h3 class="text-center">
                    Welcome, enjoy, all the experience of Portfolio, a site full of information on any film content.
                </h3>
            </div>
            @foreach ($posts as $post)
                <div class="col-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title c fw-bold">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->content }}</p>
                            <h5 class="card-title">{{ $post->date }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-5 text-center">
                <h5>
                    Are you passionate? What are you waiting forSubscribe now to our site to take advantage of premium
                    services
                </h5>
            </div>
            <div class="col-5 text-center">
                <a href="{{ url('login') }}" class="btn btn-info">go to subscribe</a>
            </div>
        @endsection
