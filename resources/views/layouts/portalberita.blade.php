<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('assets/style.css')}}">
    <title>Portal_berita</title>
  </head>
  <body>

    <div class="header">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
        <a class="navbar-brand text-white  mr-5" href="{{url('/')}}"><h3>Portal Berita</h3> </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link text-white mr-4" href="#">Home <span class="sr-only " >(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white mr-4" href="#">Tentang</a>
            </li>

            <li class="nav-item">
              <a class="nav-link text-white mr-4" href="#">Wisata</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white mr-4" href="#">Adat</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white mr-4" href="#">Contact</a>
            </li>
          </ul>
          <ul class="navbar-nav mr-auto">
          </ul>

          <form class="form-inline my-2 my-lg-0" action="{{route('search')}}">
            <input class="form-control mr-sm-2 form-control-sm " type="search" placeholder="Search" aria-label="Search" name="search" autocomplete="off">
            <button class="btn btn-outline-secondary my-2 my-sm-0 text-white btn-sm form-control mr-sm-2 form-control-sm" type="submit" >Search</button>
          </form>

          @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    <form class="form-inline my-2 my-lg-0" action="{{ url('/home') }}">
                        <button class="btn btn-outline-secondary my-2 my-sm-0 text-white btn-sm form-control mr-sm-2 form-control-sm" type="submit" >Dashboard</button>
                    </form>
                    @else
                    <span class="navbar-text mr-n3">
                        <a href="{{ route('login') }}" class="btn btn-outline-secondary mr-3 text-white btn-sm">Login</a>
                    </span>
                    @endauth
                </div>
            @endif


       </div>
      </div>
      </nav>
  </div>



<div class="test">
<div class="card">
    <div class="container">
    <div class="card-t">
      <button class="btn btn-dark btn-sm">flash news</button>
    <span class="float-right">Makassar - {{date('d  M  Y')}}</span>
    </div>
  </div>
</div>
</div>



<div class="content">
  <div class="container">
    <div class="row" data-aos="fade-up">
      <div class="col-lg-9 stretch-card grid-margin">
        <div class="card border border-light">
          <div class="card-body">
            <div class="row">
                @yield('content')
            </div>
          </div>
        </div>
      </div>
        <div class="col-lg-3 stretch-card grid-margin">
            <div class="card">
            <div class="card-body">
                <h5>Category</h5>
                <ul class="vertical-menu">
                    @foreach($kategori as $ktg)
                         <li><h6><a href="{{route('detailkategori',$ktg->id)}}" style="text-decoration:none">{{$ktg->kategori}}</a></h6></li>
                    @endforeach
              </ul>
          </div>
        </div>
      </div>
     </div>
    </div>
   </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
