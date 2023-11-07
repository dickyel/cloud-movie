<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Movie;
use App\Models\Genre;
use App\Models\Link;
use App\Models\Category;


use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    //
    public function show($slug)
    {
        $movie = Movie::where('slug', $slug)->firstOrFail();
        $genre = Genre::all();
        $category = Category::all();
        $link = Link::all();

        
        return view('pages.user.movie-detail', [
            'movie' => $movie,
            'category' => $category,
            'genre' => $genre,
            'link' => $link
          // Kirim daftar link ke tampilan
        ]);
    }


}
