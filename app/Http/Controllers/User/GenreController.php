<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Category;
use App\Models\Genre;
use App\Models\Movie;

use Illuminate\Support\Facades\Storage;

class GenreController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        $genres = Genre::all();

        $movies = Movie::when(request()->keyword, function($movies){
            $movies = $movies->where('name','like',"%". request()->keyword . '%');
        })->with('genre','category')->latest()->paginate(12);

        return view('pages.user.genre',[
            'categories' => $categories,
            'genres' => $genres,
            'movies' => $movies,
        ]);
    }

    public function detail(Request $request, $slug)
    {
        $genres = Genre::all();
        $genre = Genre::where('slug', $slug)->firstOrFail();
        $movies = Movie::where('genre_id', $genre->id)->paginate($request->input('limit', 12));

        return view('pages.user.genre',[
            'genres' => $genres,
            'genre' => $genre,
            'movies' => $movies
        ]);
    }
}
