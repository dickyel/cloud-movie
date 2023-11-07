<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Genre;
use App\Models\Movie;

use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        $genres = Category::all();

        $movies = Movie::when(request()->keyword, function($movies){
            $movies = $movies->where('name','like',"%". request()->keyword . '%');
        })->with('genre','category')->latest()->paginate(12);

        return view('pages.user.category',[
            'categories' => $categories,
            'genres' => $genres,
            'movies' => $movies,
        ]);
    }

    public function detail(Request $request, $slug)
    {
        $categories = Category::all();
        $category = Category::where('slug', $slug)->firstOrFail();
        $movies = Movie::where('category_id', $category->id)->paginate($request->input('limit', 12));

        return view('pages.user.category',[
            'categories' => $categories,
            'category' => $category,
            'movies' => $movies
        ]);
    }
}
