<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\berita;
use App\Models\kategori;
use Storage;
use Time;



class BeritaController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }


    public function index(){
        $berita = berita::paginate(5);
        // $time = Time::waktu_lalu();
        // dd($time);
        return view('dashboard.berita.list',compact('berita'));
    }


    public function formberita(){
        $kategori = kategori::all();
        return view('dashboard.berita.form',compact('kategori'));
    }


    public function tambah(request $request){

        $message = ['required' => 'form wajib di isi'];

        $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'status' => 'required',
            'kategori' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'berita' => 'required'
        ],$message);

        $name_file =  $request->file('image')->store('images');

        berita::create([
            'kategori_id' => $request -> kategori,
            'title'  => $request -> title,
            'tags'  => $request -> tags,
            'content' => $request -> berita,
            'status' =>  $request->status,
            'image' =>  $name_file


        ]);

        return redirect('/berita')->with('succes','Data berhasil di tambahkan !!!');
    }



    public function edit($id){

       $berita = berita::where('id',$id)->first();
       $kategori = kategori::all();

        return view('dashboard.berita.edit',compact('berita'),['kategori'=>$kategori]);
    }


    public function update(request $request,$id){

        $berita = berita::where('id',$id)->first();

        if($request->file('image')){
            Storage::delete($berita->image);
        }

        if(!$request->file('image')){
            berita::where('id',$id)->update([
                'kategori_id' => $request -> kategori,
                'title'  => $request -> title,
                'tags'  => $request -> tags,
                'content' => $request -> berita,
                'status' =>  $request->status,
                'image' =>  $berita->image
            ]);
        }else{

        $name_file = $request->file('image')->store('images');

        berita::where('id',$id)->update([
            'kategori_id' => $request -> kategori,
            'title'  => $request -> title,
            'tags'  => $request -> tags,
            'content' => $request -> berita,
            'status' =>  $request->status,
            'image' =>  $name_file
        ]);
        }

        return redirect('/berita')->with('succes','Data berhasil di ubah !!!');
    }


    public function hapus($id){

      $berita =  berita::where('id',$id)->first();
      storage::delete($berita->image);
      berita::where('id',$id)->delete();

      return redirect()->back()->with('succes','Data berhasil di hapus !!!');

    }

    public function cari(request $request){

        $berita = $request -> cari;

        $berita = berita::where('title','like',"%".$berita."%")->paginate();

        return view('dashboard.berita.list',compact('berita'));
    }

    public function detail_berita($id){

        $detail_berita = berita::where('id',$id);
        return view('detailberita',compact('detail_berita'));
    }



}



