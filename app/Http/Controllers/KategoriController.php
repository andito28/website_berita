<?php

namespace App\Http\Controllers;
use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index(){

    $kategori = DB::table('kategori')->paginate(5);

    return view('dashboard.kategori.list',compact('kategori'));
    }



    public function formkategori(){
        return view('dashboard.kategori.form');
    }




    public function tambah(request $request){

        $message = ['required' => ':attribute wajib di isi'];

        $request->validate([
            'kategori' => 'required',
            'status' => 'required'
        ],$message);


        kategori::create([
        'kategori' => $request-> kategori,
        'status' => $request -> status
        ]);

        return redirect('/kategori')->with('succes','Data berhasil di tambahkan !!!');
    }



    public function update(request $request,$id){

        $request->validate([
            'kategori' => 'required'
        ]);

        kategori::where('id',$id)->update([

            'kategori' => $request -> kategori,
            'status' => $request -> status

        ]);

        return redirect('/kategori')->with('succes','Data berhasil di ubah !!!');
    }



    public function edit($id){

        $kategori = kategori::where('id',$id)->first();

        return view('dashboard.kategori.edit',compact('kategori'));
    }


    public function cari(request $request){

        $cari = $request -> cari;
        $status = $request -> status;

        $query = DB::table('kategori');

        if($cari){
            $query ->where('kategori','like',"%".$cari."%");
        }

         if($status){
            $query->Where('status',"=",$status);
        }
        $kategori = $query->paginate(5);

        return view('dashboard.kategori.list',compact('kategori'),['status'=>$status]);

    }



    public function hapus($id){
        kategori::where('id',$id)->delete();
        return redirect('/kategori')->with('succes','Data berhasil di hapus !!!');
    }
}
