@extends('layouts/portalberita')
@inject('waktu','App\Helpers\TimeHelper')

@section('content')
<div class="col-md-12">
    @foreach($detail_berita as $brt)
    <h3 class="card-title"><b> {{$brt->title}}</b></h3>
<p class="card-text"><small class="text-muted">{{date('d M Y,  h :i :s',strtotime($brt->created_at))}}</small></p>
    <div>
        <img src="{{asset('storage/'.$brt->image)}}" class="card-img-top" alt="...">
        <div>
          <p class="card-text">{!!$brt->content!!}</p>
        </div>
      </div>
      @endforeach
</div>

@endsection



