@extends('layouts.dashboard',['module' => 'Home'])

@section('content_dashboard')
<div class="row">
    <div class="col-sm-4">
        <div class="card text-white bg-secondary mb-3">
            <div class="card-header">Berita</div>
            <div class="card-body">
            <h5 class="card-title"><strong>{{$berita}}</strong></h5>
            </div>
          </div>
    </div>
    <div class="col-sm-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-header">Kategori</div>
            <div class="card-body">
            <h5 class="card-title"> <strong>{{$kategori}}</strong></h5>
            </div>
          </div>
  </div>


<div class="col-sm-4">
    <div class="card text-white bg-info mb-3">
        <div class="card-header">User</div>
        <div class="card-body">
        <h5 class="card-title"><strong>{{$user}}</strong></h5>
        </div>
      </div>
</div>


<div class="col-sm-12">
    <div class="card border-secondary mb-3">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>
</div>
@endsection


