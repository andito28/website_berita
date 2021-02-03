@extends('layouts.dashboard',['module' => 'Users'])

@section('content_dashboard')

@php
    $cari = isset($_GET['cari'])?$_GET['cari']:false;
@endphp


<div class="row">
    <div class="col-md-12">
    <a href="{{route('formusers')}}" class="btn btn-dark btn btn-sm float-right">+ Tambah Users</a>
    </div>
</div>

<div class="col-md-12">
<form  action="{{route('cari_user')}}">
        <div class="form-row">
          <div class="col-md-4 mb-3">
          <input type="text"  name="cari" class="form-control mb-2 mr-sm"  placeholder="U s e r s " value="{{$cari}}">
          </div>
          <div class="col-md-3 mb-3">
            <button type="submit" class="btn btn-secondary  mb-2 btn-sm" class="cari" >C a r i</button>
          </div>
        </div>
      </form>
</div>


<div class="col md-12">
    <table class="table">
        <thead>
          <tr style="font-size: 14.4px">
            <th scope="col">No</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach($users as $usr)
          <tr style="font-size: 14.4px">
          <th scope="row">{{$loop->iteration}}</th>
            <td>{{$usr->name}}</td>
            <td>{{$usr->email}}</td>
            <td>{{$usr->role}}</td>
          <td><a href="{{route('edituser',$usr->id)}}" class="btn btn-primary btn-sm">Edit</a>
            <a href="{{route('hapususer',$usr->id)}}" class="btn btn-danger btn-sm">Hapus</a>
          </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    <div>{{$users->links()}}</div>
@endsection

</div>
