@extends('layouts.dashboard',['module' => 'Kategori'])

@section('content_dashboard')

@php
$status = isset($_GET['status'])?$_GET['status']:false;
$cari = isset($_GET['cari'])?$_GET['cari']:false;
@endphp

<div class="row">
    <div class="col-md-12">
    <a href="{{route('formkategori')}}" class="btn btn-dark btn btn-sm float-right">+ Tambah Kategori</a>
    </div>
</div>
<br>
    <div class="col-md-12">
        <form  action="{{route('cari')}}">
            <div class="form-row">
              <div class="col-md-4 mb-3">
              <input type="text"  name="cari" class="form-control mb-2 mr-sm"  placeholder="K a t e g o r i " value="{{$cari}}">
              </div>
              <div class="col-md-2 mb-3">
                <select class="custom-select" name="status">
                <option value="">S t a t u s</option>
                <option value="on" {{$status == "on"?"selected":''}}>On</option>
                <option value="off" {{$status == "off"?"selected":''}}>Off</option>
                </select>
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
                <th scope="col">Kategori</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($kategori as $ktg)
              <tr>
              <th scope="row">{{$loop->iteration}}</th>
                <td>{{$ktg->kategori}}</td>
                <td>{{$ktg->status}}</td>
              <td><a href="{{route('editkategori',$ktg->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <a href="{{route('hapuskategori',$ktg->id)}}" class="btn btn-danger btn-sm">Hapus</a>
              </td>
              </tr>
            @endforeach
            </tbody>
          </table>

        <div class="col md-12"> {{ $kategori->links() }}</div>
    </div>


@endsection
