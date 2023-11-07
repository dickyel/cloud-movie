@extends('layouts.user')


@section('title','contact')

@section('content')

@include('sweetalert::alert')

<main class="main-content">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span>Contact</span>
        </div>
    </div>

    <div class="fullwidth-block">
        <div class="container">
  
            <div class="col-md-10 col-md-offset-1">
                <h2 class="section-title">Contact us</h2>
                <p>Silahkan hubungi contact kami untuk iklan!!</p>
                <form action="{{ route('contact.store') }}" method="POST" class="contact-form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6"><input type="email" placeholder="Your name..." name="email"></div>
                      
                    </div>
                 
                    <textarea name="pesan_akun" placeholder="Message..."></textarea>
                    <div class="text-right">
                        <input type="submit" placeholder="Send message">
                    </div>
                </form>

            </div>
        </div>
    </div>
    
</main> <!-- .main-content -->

@endsection