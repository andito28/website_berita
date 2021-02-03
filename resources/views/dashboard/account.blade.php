@extends('layouts.dashboard',['module' => 'Account'])

@section('content_dashboard')

@if($message = session('succes'))
<div class="alert alert-info alert-dismissable">
    <a class="panel-close close" data-dismiss="alert">×</a>
    <i class="fa fa-coffee"></i>
        {{$message}}
  </div>
@endif
 <h5>&nbump; Account info</h5>
<form action="{{route('updateaccount',Auth::user()->id)}}" method="post" class="form-horizontal" role="form">
    {{csrf_field()}}
    @method('PATCH')

    <div class="form-group">
      <label class="col-md-3 control-label"><b> Username:</b> </label>
      <div class="col-md-12">
      <input name="username" class="form-control" type="text" value="{{Auth::user()->name}}" disabled/>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-3 control-label"><b>Email:</b> </label>
      <div class="col-lg-12">
        <input name="email" class="form-control" type="text" value="{{Auth::user()->email}} " disabled/>
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-3 control-label"> <b>Password:</b> </label>
      <div class="col-md-12">
      <input name="password" class="form-control" type="password" required placeholder="Password"/>
        @if($message = session('gagalp'))
        <span class="text-danger">{{$message}}</span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-3 control-label"><b>New Password:</b></label>
      <div class="col-md-12">
        <input name="new_password" class="form-control" type="password" required placeholder="New Password"/>
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-3 control-label"><b>Confirm password:</b></label>
      <div class="col-md-12">
        <input name="confirm_password" class="form-control" type="password" value="" required placeholder="Confirm Password"/>
        @if($message = session('gagal'))
        <span class="text-danger">{{$message}}</span>
         @endif
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-3 control-label"></label>
      <div class="col-md-8">
        <input type="submit" name="editAccount" class="btn btn-primary btn-sm" value="Save Changes" />
        <span></span>
        <input type="reset" class="btn btn-danger btn-sm" value="Cancel" />
      </div>
    </div>
  </form>
@endsection
