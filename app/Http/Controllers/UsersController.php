<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\user;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('Cekrole');

    }

    public function index(){
        $users = DB::table('users')->paginate(5);
        return view('dashboard.users.list',compact('users'));
    }

    public function create()
    {
        return view('dashboard.users.form');
    }

    public function tambah(request $request)
    {
        $message = ['required' => ':attribute wajib di isi'];
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required'
        ],$message);

        $password = $request->name;

        user::create([
            'name' => $request -> name,
            'email' => $request -> email,
            'password' => Hash::make($password),
            'role' => $request -> role
        ]);

        return redirect('/Users');
    }

    public function edit($id){
        $user = user::where('id',$id)->first();
        return view('dashboard.users.edit',compact('user'));
    }

    public function hapus($id){
        user::where('id',$id)->delete();
        return back();
}

public function update(request $request,$id){
    user::where('id',$id)->update([
        'name' => $request -> name,
        'email' => $request -> email,
        'role' => $request -> role
    ]);

    return redirect('/Users');
}


public function cari(request $request){
    $user = $request-> cari;
    $users = user::where('name','like',"%".$user."%")->paginate();
    return view('dashboard.users.list',compact('users'));
}

}
