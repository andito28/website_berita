<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\berita;
use App\Models\kategori;

class NewsController extends Controller
{
      public function detail($id)
        {
        $kategori = kategori::where('status','on')->get();
        $detail_berita = berita::where('id',$id)->get();
        return view('detailberita',compact('detail_berita'),['kategori'=>$kategori]);

        }

        public function search(request $request){

            $search = $request -> search;
            $kategori = kategori::where('status','on')->get();
            $berita = berita::where('title','like',"%".$search."%")->where('status','on')->paginate();

            return view('berita',compact('berita'),['kategori'=>$kategori]);

        }


        public function detailkategori($id){

           $kategori = kategori::where('status','on')->get();
           $berita = berita::where('kategori_id',$id)->get();
           return view('detailkategori',compact('berita'),['kategori'=>$kategori]);
        }



}
