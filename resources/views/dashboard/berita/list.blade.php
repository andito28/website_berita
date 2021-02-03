@extends('layouts.dashboard',['module'=>'Berita'])

@section('content_dashboard')

<div class="row">
    <div class="col-md-12">
    <a href="{{route('formberita')}}" class="btn btn-dark btn btn-sm float-right">+ Tambah Berita</a>
    </div>
</div>
<br>
    <div class="col-md-12">
    <form  action="{{route('cari_berita')}}">
            <div class="form-row">
              <div class="col-md-4 mb-3">
              <input type="text"  name="cari" class="form-control mb-2 mr-sm"  placeholder="C a r i  B e r i t a">
              </div>
              <div class="col-md-3 mb-3">
                <button type="submit" class="btn btn-secondary  mb-2 btn-sm" class="cari" >C a r i</button>
              </div>
            </div>
          </form>
    </div>

    @if($message = session('succes'))
    <div class="alert alert-info alert-dismissable">
    <a class="panel-close close" data-dismiss="alert">×</a>
    <i class="fa fa-coffee"></i>
        {{$message}}
    </div>
    @endif

    <div class="col md-12">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Berita</th>
                <th scope="col">Gambar</th>
                <th scope="col">Status</th>
                <th scope="col">Action </th>
                <th> &nbsp;</th>
                <th> &nbsp;</th>
                <th> &nbsp;</th>
                <th> &nbsp;</th>
              </tr>
            </thead>
            <tbody>

            @foreach($berita as $brt)
              <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td>{{$brt->title}}</td>
              <td><img src="{{asset('storage/'.$brt->image)}}" alt="" height="50px" width="80px"></td>
              <td>{{$brt->status}}</td>
              <td colspan="4">
                  <a href="{{route('editberita',$brt->id)}}" class="btn btn-primary btn-sm">Edit</a>
                  <a href="{{route('hapus_berita',$brt->id)}}" class="btn btn-danger btn-sm">Hapus</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

        <div class="col md-12">{{$berita->links()}} </div>
    </div>
@endsection
