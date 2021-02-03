
@extends('layouts.dashboard',['module'=>'Berita'])


@section('content_dashboard')

<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.tiny.cloud/1/k7pxqedmsnky5xyhqxa4g9lufmldm1wr03cdaatvchh7bb0c/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
<form action="{{route('tambah_berita')}}" enctype="multipart/form-data" method="POST">

{{ csrf_field() }}

        <div class="form-group">
            <label ><b> Title</b></label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}" autocomplete="off">
             <div>@error('title') <span class="text-danger">{{$message}}</span> @enderror</div>
        </div>

         <div class="form-group">
            <label ><b> Tags</b></label>
         <input type="text" name="tags" class="form-control @error('tags') is-invalid @enderror" value="{{old('tags')}}" autocomplete="off">
            <div>@error('tags') <span class="text-danger">{{$message}}</span> @enderror</div>
        </div>

       <div class="form-group">
           <div class="form-row">
           <div class="col-md-3">
            <label ><b> Kategori</b></label>
            <select class="custom-select" name="kategori" width=>
                  <option value="0" selected disabled>P i l i h</option>
                @foreach($kategori as $ktg)
                   <option  value="{{$ktg->id}}">{{$ktg->kategori}}</option>
                @endforeach
            </select>
             <div>@error('kategori') <span class="text-danger"> {{$message}} @enderror</span></div>
           </div>
           <div class="col-md-1">&emsp;</div>
           <div class="col-md-4">
            <label ><b>Status</b></label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status"  value="on">
                <label class="form-check-label">On</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" value="off">
                <label class="form-check-label">Off</label>
              </div>
              <div>@error('status') <span class="text-danger"> {{$message}} @enderror</span></div>
           </div> &emsp;

           <div class="col-md-4">
            <label ><b>Gambar</b></label><br>
            <input type="file" name="image"><br>
            <div>@error('image') <span class="text-danger"> {{$message}} @enderror</span></div>
           </div>
           </div>
       </div>

         <div class="form-group">
            <label ><b>Content</b> </label>
         <textarea name="berita" rows="10">
             {{old('berita')}}
            </textarea>
            <div>@error('berita') <span class="text-danger"> {{$message}} @enderror</span></div>
         </div>

         <button type="submit" class="btn btn-primary btn-sm float-right">S i m p a n</button>
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
