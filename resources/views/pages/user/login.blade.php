@extends('layouts.user')


@section('title','contact')

@section('content')


<main class="main-content">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span>Login</span>
        </div>
    </div>

    <div class="fullwidth-block">
        <div class="container">
    
            <div class="col-md-10 col-md-offset-1">
                <h2 class="section-title">Login</h2>
                <p>Silahkan login dengan anda!!</p>
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="/login" method="POST" class="contact-form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input type="email" placeholder="Your name..." name="email">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="password" placeholder="Your password..." name="password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="text-right">
                        <input type="submit" placeholder="Send message">
                    </div>
                </form>

            </div>
        </div>
    </div>
    
</main> <!-- .main-content -->

@endsection