@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <nav class="admin-menu">
                <ul>
                <li><a {{$module == "Home" ? 'class=active':''}} href="{{route('home')}}">Home</a></li>
                <li><a {{$module == "Berita" ? 'class=active' : ''}} href="{{route('berita')}}" >Berita</a></li>
                <li><a  {{$module == "Kategori" ? 'class=active' : ''}} href="{{route('kategori')}}">Kategori</a></li>
                @if(auth()->user()->role == 'superadmin')
                <li><a {{$module == "Users" ? 'class=active':''}} href="{{route('users')}}">Users</a></li>
                @endif
                <li><a  {{$module == "Account" ? 'class=active' : ''}} href="{{route('account')}}">Account</a></li>
                <li><a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                </ul>
            </nav>
</div>


        <div class="col-md-9 no-padding">
            <div class="card">
            <div class="card-header bg-dark text-white">{{$module}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   @yield('content_dashboard')

                </div>
            </div>
        </div>
    </div>
</div>


@endsection


