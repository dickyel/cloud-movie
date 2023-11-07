@extends('layouts.user')

@section('title','movie-detail')


@section('content')

<main class="main-content">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span>Detail Movie</span>
        </div>
    </div>

    <div class="fullwidth-block">
        <div class="container">
            <div class="row">
                <div class="content col-md-8">
                    <div class="post">
                        <h2 class="entry-title ">{{ $movie->name }}</h2>
                        <!-- Replace the featured-image div with an iframe -->
                        <!-- iframe -->
                        <iframe id="video-player" width="100%" height="460" src="{{ $movie->link->first()->name }}"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

                        <br><br><small>{{ $movie->genre->name }}</small><br>
                        <small>{{ $movie->tahun }}</small><br>
                        <p>{!! $movie->deskripsi!!}</p>
                        
                        <div id="film-gallery" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                @foreach ($movie->galleries as $index => $gallery)
                                    <li data-target="#film-gallery" data-slide-to="{{ $index }}" {{ $index === 0 ? 'class="active"' : '' }}></li>
                                @endforeach
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                @foreach ($movie->galleries as $index => $gallery)
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        <img src="{{ Storage::url($gallery->url) }}" alt="Image {{ $index + 1 }}">
                                    </div>
                                @endforeach
                            </div>

                            <!-- Left and right controls -->
                            <a class="carousel-control-prev" href="#film-gallery" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#film-gallery" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>
                        </div>



                    </div>

                  
                </div>
                <div class="sidebar col-md-3 col-md-offset-1">
                    <div class="widget">
                        <h3 class="widget-title">Menu</h3>
                        <ul class="arrow-list">
                            <li><a href="{{ route('home') }}">Beranda</a></li>
                            <li><a href="{{ route('category') }}">Category</a></li>
                            <li><a href="{{ route('genre') }}">Genre</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                            <li><a href="">Login</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main> <!-- .main-content -->

@endsection

@push('after-script')
<!-- Add this code inside your Blade template within the @push('after-script') section -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const videoPlayer = document.querySelector('#video-player');
        const episodeLinks = document.querySelectorAll('.episode-link');

        episodeLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const index = this.getAttribute('data-index');
                const newSrc = '{{ $movie->link->name }}'.replace(/Server \d+/, `Server ${index}`);
                videoPlayer.src = newSrc;
            });
        });
    });
</script>

@endpush
