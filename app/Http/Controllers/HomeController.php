<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\berita;
use App\Models\kategori;
use App\Models\user;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = user::count();
        $kategori = kategori::count();
        $berita = berita::count();
        return view('dashboard.home.list',['user'=>$user,'kategori'=>$kategori,'berita'=>$berita]);
    }





}
