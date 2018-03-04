@extends('admin.shared.layout')

@section('title','User Profile')

@section('content')

<div class="page-header">
<h3><i class="glyphicon glyphicon-pencil"></i> Edit Profile</h3>

{!!Form::open(['url'=>'admin/users/'.$user->id,'method'=>'PUT','enctype'=>'multipart/form-data'])!!}
<div class="pull-right">
    <button type="submit" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i></button>
    {{link_to('admin/users','',['class'=>'fa fa-reply'])}}
</div>
</div>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Name *</label>
{{Form::text('name',$user->name,['class'=>'form-control'])}}
</div>

<div class="form-group">
<label>Email *</label>
{{Form::text('email',$user->email,['class'=>'form-control'])}}
</div>

<div class="form-group">
<label>Password*</label>
{{Form::text('password',$user->password,['class'=>'form-control'])}}
</div>

<div class="form-group">
<label>Token</label>
{{Form::text('remember_token',$user->remember_token,['class'=>'form-control'])}}
</div>


<div class="form-inline">
    <label>Status</label>
    <label>{{Form::checkbox('status','',$user->status)}} Is Active</label>
</div>
</div>
</div>


{{Form::token()}}
{!!Form::close()!!}

@endsection
