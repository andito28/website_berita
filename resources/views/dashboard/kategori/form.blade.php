@extends('layouts.dashboard',['module'=>'Kategori'])

@section('content_dashboard')

<form class="form.horizontal" action="{{route('tambah_kategori')}}" method="post">
    {{csrf_field()}}
    <div class="form-group">
      <label ><b> Kategori</b></label>
    <input type="text" name="kategori" class="form-control @error('kategori') is-invalid @enderror" value="{{old('kategori')}}">
    @error('kategori') <span class="text-danger">{{$message}} @enderror</span>
    </div>
    <div class="form-group">
      <label ><b>Status</b></label>
      <div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="status"  value="on">
        <label class="form-check-label">On</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="status" value="off">
        <label class="form-check-label">Off</label>
      </div>
      <br>
      @error('status') <span class="text-danger">{{$message}}</span> @enderror
    </div>
    </div>
    <button type="submit" class="btn btn-primary btn-sm float-right">Tambahkan</button>
  </form>

@endsection
