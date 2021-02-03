@extends('layouts/portalberita')
@inject('time', 'App\Helpers\TimeHelper')

//ternary
@php
    $cari = isset($GET['search'])?$GET['search'] : false;
@endphp

@section('content')
    @foreach($berita as $brt)
        <div class="col-sm-4 grid-margin">
        <div class="position-relative">
            <div class="rotate-img">
            <img
            src="{{asset('storage/'.$brt->image)}}"
                alt="thumb"
                class="img-fluid img-thumbnail"
            />
            </div>
            <div class="badge-positioned">
            <br>
            </div>
        </div>
        </div>
        <div class="col-sm-8  grid-margin">
        <span class="title">
            {{$brt->title}}
        </span>
        <div class="fs-13 mb-2">
            <span class="mr-2">Post -</span>{{$time::waktu_lalu($brt->created_at)}}
        </div>
        <p class="mb-0">
            {{$brt->tags}}
            <br>
        <a href="{{route('detail_berita',$brt->id)}}" style="text-decoration:none"><b>Baca selengkapnya...</b></a>
        </p>
        </div>
     @endforeach

     @if($cari)
    <div>{{$search->links()}}</div>
    @endif

@endsection




