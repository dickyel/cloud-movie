<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Models\Movie;
use App\Models\Gallery;


class AdminGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (request()->ajax()) {
            $query = Gallery::with(['movie']);

            return Datatables::of($query)
                ->addColumn('action', function($item){
                    return 
                    '
                    <div class="d-flex justify-content-center">
                      
                        <span>
                            <a href="' .route('gallery-admin.destroy', $item->id) . '" class="btn btn-danger">
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
        return view('pages.admin.gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $item = Gallery::findOrFail($id);
        $item->delete();

        return redirect()->route('gallery-admin.index');
    }
}
