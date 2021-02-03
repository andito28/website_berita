@extends('layouts.dashboard',['module'=>'Users'])

@section('content_dashboard')

<form method="POST" action="{{route('updateuser',$user->id)}}">
    @method('PATCH')
    {{csrf_field()}}
    <div class="form-group">
        <label ><b> Name</b></label>
    <input type="text" name="name" class="form-control @error('name') is-invalid  @enderror" autocomplete="off" value="{{$user->name}}">
        <div>@error('name')<span class="text-danger">{{$message}}</span>@enderror</div>
     </div>

     <div class="form-group">
        <label ><b> Email</b></label>
     <input type="email" name="email" class="form-control  @error('email') is-invalid  @enderror" autocomplete="off" value="{{$user->email}}">
        <div>@error('email')<span class="text-danger">{{$message}}</span>@enderror</div>
     </div>

     <div class="form-group">
            <label ><b> Role</b></label>
            <select class="custom-select" name="role">
               <option selected disabled>P i l i h</option>
               <option value="admin" {{$user->role=='admin'?'selected':''}}>Admin</option>
               <option value="superadmin" {{$user->role=='superadmin'?'selected':''}}>SuperAdmin</option>
            </select>
            <div>@error('role')<span class="text-danger">{{$message}}</span>@enderror</div>
     </div>

     <button type="submit" class="btn btn-primary btn-sm float-right">Update</button>

</form>

@endsection
