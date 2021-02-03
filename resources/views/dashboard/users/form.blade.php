@extends('layouts.dashboard',['module'=>'Users'])

@section('content_dashboard')

<form method="POST" action="{{ route('tambahusers') }}">
    {{csrf_field()}}
    <div class="form-group">
        <label ><b>Username</b></label>
        <input type="text" name="name" class="form-control @error('name') is-invalid  @enderror" autocomplete="off">
        <div>@error('name')<span class="text-danger">{{$message}}</span>@enderror</div>
     </div>

     <div class="form-group">
        <label ><b> Email</b></label>
        <input type="email" name="email" class="form-control  @error('email') is-invalid  @enderror" autocomplete="off">
        <div>@error('email')<span class="text-danger">{{$message}}</span>@enderror</div>
     </div>

     <div class="form-group">
            <label ><b> Role</b></label>
            <select class="custom-select" name="role">
               <option selected disabled>P i l i h</option>
               <option value="admin">Admin</option>
               <option value="superadmin">SuperAdmin</option>
            </select>
            <div>@error('role')<span class="text-danger">{{$message}}</span>@enderror</div>
     </div>

     <button type="submit" class="btn btn-primary btn-sm float-right">Tambahkan</button>

</form>

@endsection
