<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class AdminUserController extends Controller
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
            $query = User::with('role');

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle mr-1 mb-1" 
                                    type="button" id="action' .  $item->id . '"
                                        data-toggle="dropdown" 
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                        Aksi
                                </button>
                                <div class="dropdown-menu" aria-labelledby="action' .  $item->id . '">
                                    <a class="dropdown-item" href="' . route('user-admin.edit', $item->id) . '">">
                                        Edit
                                    </a>
                                    <form action="' . route('user-admin.destroy', $item->id) . '" method="POST">
                                        ' . method_field('delete') . csrf_field() . '
                                        <button type="submit" class="dropdown-item text-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
     
        return view('pages.admin.user.create',[
            'roles' => $roles,

        ]);
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
        
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
            'role_id' => 'nullable|integer|exists:roles,id',
            'avatar' => 'nullable|string',
            'password' => 'required|string',
           
        ]);

        $data['password'] = bcrypt($data['password']);
        
        User::create($data);
        return redirect()->route('user-admin.index');
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
        $item = User::with(['role'])->findOrFail($id);
        $roles = Role::all();

        return view('pages.admin.user.edit',[
            'item' => $item,
            'roles' => $roles,
        ]);
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
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
            'role_id' => 'nullable|integer|exists:roles,id',
            'avatar' => 'nullable|string',
            'password' => 'required|string',
        
        ]);

        
        $item = User::findOrFail($id);

       
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }

        $item->update($data);
        
        return redirect()->route('user-admin.index');
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
        $item = User::findOrFail($id);
        $item->delete();

        return redirect()->route('user-admin.index');
    }
}
