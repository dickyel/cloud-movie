@extends('layouts.user')

@section('title','Cloud Movie')

@section('content')

<div class="hero" data-bg-image="{{ asset('./weather/images/banner.png') }}">
    <div class="container">
        <form action="/" class="find-location" method="GET">
            <input type="text" name="keyword" id="keyword" placeholder="Find your movie..." value="{{ request('keyword') }}">
            <input type="submit" value="cari movie">
        </form>

    </div>
</div>


<main class="main-content">
    <div class="fullwidth-block">
        <div class="container">
            <h2 class="section-title">Film Terbaru</h2>
            <div class="row">
                @php $incrementMovie = 0 @endphp
                @forelse($movies as $movie)
                <div class="col-md-3 col-sm-6">
                    <div class="live-camera">
                        <a href="{{ route('movie.detail', $movie->slug) }}"><figure class="live-camera-cover"><img src=" {{ Storage::url($movie->galleries->first()->url) }}" alt=""></figure></a>
                        
                        <h3 class="location">{{ $movie->name }}</h3>
                        <small class="date">{{ $movie->genre->name }}</small>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-4 px-4">
                    Tidak ada movie
                </div>
                @endforelse            
            </div>
        </div>
        <div class="mt-5">
        {{ $movies->links('pagination::bootstrap-5') }}
        </div>
    </div>

</main> <!-- .main-content -->

@endsection