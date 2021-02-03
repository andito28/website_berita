@extends('layouts.dashboard',['module'=>'Kategori'])

@section('content_dashboard')

<form class="form.horizontal" action="{{route('updatekategori',$kategori->id)}}" method="post">
    @method('PATCH')
    {{csrf_field()}}
    <div class="form-group">
      <label ><b> Kategori</b></label>
    <input type="text" name="kategori" class="form-control @error('kategori') is-invalid @enderror" value="{{$kategori->kategori}}">
    </div>
    <div class="form-group">
      <label ><b>Status</b></label>
      <div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="status"  value="on"
        {{$kategori->status == 'on'?'checked':''}}>
        <label class="form-check-label">On</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="status" value="off"
        {{$kategori->status == 'off'?'checked':''}}>
        <label class="form-check-label">Off</label>
      </div>
    </div>
    </div>
    <button type="submit" class="btn btn-primary btn-sm float-right">Update</button>
  </form>

@endsection
