<?php

namespace App\Http\Controllers;
use App\Models\user;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function account(){
        return view('dashboard.account')->with('test','test');
    }

    public function update(request $request,$id)
    {

        $user = user::where('id',$id)->first();

        if (!Hash::check($request->password, $user->password)) {
            return back()->with('gagalp','password tidak sesuai !!!');
        }

        if (Hash::check($request->password, $user->password)) {
            if($request->new_password == $request->confirm_password){
                $user->update([
                    'password' => Hash::make($request -> confirm_password)
                ]);
                return back()->with('succes','Password anda berhasil di ubah !!!');
            }else{
            return back()->with('gagal','password tidak sesuai !!!');
            }
        }
    }
}
