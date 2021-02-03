@extends('layouts/portalberita')

@php
    function waktu_lalu($timestamp)
{
    $selisih = time() - strtotime($timestamp) ;
    $detik = $selisih ;
    $menit = round($selisih / 60 );
    $jam = round($selisih / 3600 );
    $hari = round($selisih / 86400 );
    $minggu = round($selisih / 604800 );
    $bulan = round($selisih / 2419200 );
    $tahun = round($selisih / 29030400 );
    if ($detik <= 60) {
        $waktu = $detik.' detik yang lalu';
    } else if ($menit <= 60) {
        $waktu = $menit.' menit yang lalu';
    } else if ($jam <= 24) {
        $waktu = $jam.' jam yang lalu';
    } else if ($hari <= 7) {
        $waktu = $hari.' hari yang lalu';
    } else if ($minggu <= 4) {
        $waktu = $minggu.' minggu yang lalu';
    } else if ($bulan <= 12) {
        $waktu = $bulan.' bulan yang lalu';
    } else {
        $waktu = $tahun.' tahun yang lalu';
    }
    return $waktu;
}
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
        <h2 class="mb-2 font-weight-600">
            {{$brt->title}}
        </h2>
        <div class="fs-13 mb-2">
            <span class="mr-2">Post -</span>{{waktu_lalu($brt->created_at)}}
        </div>
        <p class="mb-0">
            {{$brt->tags}}
            <br>
        <a href="{{route('detail_berita',$brt->id)}}"><b>Baca selengkapnya...</b></a>
        </p>
        </div>
     @endforeach
@endsection


