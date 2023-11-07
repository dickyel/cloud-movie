@extends('layouts.user')


@section('title','Genre')


@section('content')

<div class="hero" data-bg-image="{{ asset('./weather/images/banner.png') }}">
    <div class="container">
        <form action="/genre" class="find-location" method="GET">
            <input type="text" name="keyword" id="keyword" placeholder="Find your movie..." value="{{ request('keyword') }}">
            <input type="submit" value="cari movie">
        </form>

    </div>
</div>


<main class="main-content">
    <div class="container">
        <br><br><div class="breadcrumb ">
            <a href="{{ route('home') }}">Home</a>
            <span>Genre</span>
        </div>

        <!-- Episode Links -->
        <br><br><div class="episode-links ">
            <div class="card-deck">
                <div class="row">
                    @php $incrementGenre = 0 @endphp
                    @forelse($genres as $genre)
                    <div class="col-md-4 px-5">
                        <h3 class="card-title"><a href="{{ route('genre.detail', $genre->slug ) }}">{{ $genre->name }}</a></h3>    
                    </div>
                    @empty
                    <div class="col-12 text-center">
                        tidak ada genre
                    </div>
                    @endforelse
                </div>
                
            
                <!-- Add more episode cards as needed -->
            </div>
        </div>
    </div>

    <div class="fullwidth-block">
        <div class="container">
            
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    @php $incrementMovie = 0 @endphp
                    @forelse($movies as $movie)
                    <div class="live-camera">
                        <a href="{{ route('movie.detail', $movie->slug) }}"><figure class="live-camera-cover"><img src="/weather/images/live-camera-1.jpg" alt=""></figure></a>
                        <h3 class="location">{{ $movie->name }}</h3>
                        <small class="date">{{ $movie->genre->name }}</small><br>
                        <small>{{ $movie->category->name }}</small>
                    </div>
                    @empty
                    <div class="col-12 text-center">
                        tidak ada movie
                    </div>

                    @endforelse
                </div>
               
            </div>
        </div>

        <div class="mt-5">
        {{ $movies->links('pagination::bootstrap-5') }}
        </div>
    </div>
    
</main> <!-- .main-content -->

@endsection