<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Genre;
use App\Models\Link;

use Illuminate\Support\Str;



class AdminMovieController extends Controller
{
    //
    public function index()
    {
        
        if(request()->ajax()){
            $query = Movie::with(['category','genre','link']);

            return Datatables::of($query)
                ->addColumn('action', function($item){
                    return 
                    '
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-primary" href="' . route('movie-admin.edit', $item->id) . '">
                            Edit
                        </a>
                        <span>
                            <a href="' .route('movie-admin.destroy', $item->id) . '" class="btn btn-danger">
                                Hapus
                            </a>
                        </span>   
                                           
                    </div>
                    ';
                })
                ->editColumn('url', function ($item) {
                    return $item->url ? '<img src="' . Storage::url($item->url) . '" style="max-height: 80px;"/>' : '';
                })
                ->rawColumns(['action','url'])
                ->make();
        }


        return view('pages.admin.movie.index');
    }

    public function create(){
        
        $categories  = Category::all();
        $links = Link::all();
        $genres = Genre::all();

        return view('pages.admin.movie.create',[
            'categories' => $categories,
            'links' => $links,
            'genres' => $genres
        ]);
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['studio_slug'] = Str::slug($request->studio);
        Movie::create($data);

        return redirect()->route('movie-admin.index');
    }

    public function uploadGallery(Request $request)
    {
        $data = $request->all();

        $data['url'] = $request->file('url')->store('assets/gallery','public');

        Gallery::create($data);

        return redirect()->route('movie-admin.edit', $request->movie_id);
        
    }

    public function deleteGallery(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();
        return redirect()->route('movie-admin.edit', $gallery->movie_id);
        
    }

    public function edit($id)
    {
        $item = Movie::findOrFail($id);
        $categories = Category::all();
        $links = Link::all();
        $genres = Genre::all();
        return view('pages.admin.movie.edit',[
            'item' => $item,
            'categories' =>$categories,
            'links' => $links,
            'genres' => $genres
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = Movie::findOrFail($id);
        $data['slug'] = Str::slug($request->name);
        $data['studio_slug'] = Str::slug($request->studio);
       
        
        $item->update($data);

        return redirect()->route('movie-admin.index');
    }

    public function destroy($id)
    {
        $item = Movie::findOrFail($id);
        $item->delete();

        return redirect()->route('movie-admin.index');
    }

}
