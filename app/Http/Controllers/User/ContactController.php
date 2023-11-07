<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    //
    public function index()
    {
        return view('pages.user.contact');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $contact = Contact::create($data);

        if($contact){
            Alert::success('Berhasil','Data komen telah berhasil di kirim');
            return back();
        }
        else {
            Alert::error('Gagal','Data komen Tidak Terkirim');
            return back();
        }
        
    }
}
