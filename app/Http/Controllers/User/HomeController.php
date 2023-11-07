<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Genre;
use App\Models\Movie;

use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        $genres = Genre::all();

        $movies = Movie::when(request()->keyword, function($movies){
            $movies = $movies->where('name','like',"%". request()->keyword . '%');
        })->with('genre')->latest()->paginate(12);
        return view('pages.user.home',[
            'genres' => $genres,
            'movies' => $movies
        ]);
    }

  
}
