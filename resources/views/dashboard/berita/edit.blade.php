@extends('layouts.dashboard',['module'=>'Berita'])


@section('content_dashboard')

<!DOCTYPE html>
<html>
<head>
  <script src="https://cdn.tiny.cloud/1/k7pxqedmsnky5xyhqxa4g9lufmldm1wr03cdaatvchh7bb0c/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
<form action="{{route('update_berita',$berita->id)}}" method="POST" enctype="multipart/form-data">
     @method("PATCH")
     {{ csrf_field() }}
        <div class="form-group">
        <label ><b> Title</b></label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{$berita->title}}">
        @error('title') <span class="text-danger">{{$message}}</span> @enderror
        </div>

        <div class="form-group">
            <label ><b> Tags</b></label>
            <input type="text" name="tags" class="form-control @error('tags') is-invalid @enderror" value="{{$berita->tags}}">
            @error('tags') <span class="text-danger">{{$message}}</span> @enderror
            </div>

            <div class="form-group">
                <div class="form-row">

                    <div class="col-md-4">
                        <label ><b>Gambar</b></label><br>
                        <input type="file" name="image"><br><br>
                        <span>
                        <img src="{{asset('storage/'.$berita->image)}}" alt="" height="130px">
                        </span>
                    </div>

                <div class="col-md-3">
                 <label ><b> Kategori</b></label>
                 <select class="custom-select @error('kategori_id') is-invalid @enderror" name="kategori">
                    <option>P i l i h</option>
                    @foreach($kategori as $ktg)
                     <option value="{{$ktg->id}}" {{$berita->kategori->kategori == $ktg->kategori?'selected' : ''}}  >
                     {{$ktg->kategori}}</option>
                    @endforeach
                 </select>
                 @error('kategori_id') <span class="text-danger">{{$message}}</span> @enderror
                </div>

                <div class="col-md-1"></div>
                <div class="col-md-4">
                 <label ><b>Status</b></label><br>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="status"  value="on"
                      {{$berita->status == 'on'?'checked':''}}>
                      <label class="form-check-label">On</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="status" value="off"
                      {{$berita->status == 'off'?'checked':''}}>
                      <label class="form-check-label">Off</label>
                    </div>
                </div>
            </div><br>

         <div class="form-group">
            <label ><b>Content</b> </label>
         <textarea name="berita" rows="10" value="">
        {{$berita->content}}
        </textarea>
        @error('content') <span class="text-danger">{{$message}}</span> @enderror
         </div>


         <button type="submit" class="btn btn-primary btn-sm float-right">U p d a t e</button>
    </form>




    <script>
        tinymce.init({
          selector: 'textarea',
          plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
          toolbar_mode: 'floating',
        });
      </script>
</body>
</html>


</html>
@endsection
