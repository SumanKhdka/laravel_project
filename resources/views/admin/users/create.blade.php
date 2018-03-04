@extends('admin.shared.layout')

@section('title','Add User')

@section('content')
<div class="page-header">
<h3><i class="glyphicon glyphicon-pencil"></i> Add User</h3>
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



{!!Form::open(['url'=>'admin/users','method'=>'post','enctype'=>'multipart/form-data'])!!}
<div class="pull-right">
<button type="submit" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i></button>
{{link_to('admin/users','Back',['class'=>'btn btn-danger'])}}
</div>

<div class="row">
<div class="col-md-3">
    <div class="form-group">
    <label>Name</label>
    {{Form::text('name','',['class'=>'form-control'])}}
    </div>
</div>

<div class="col-md-3">
<div class="form-group">
<label>Email</label>
{{Form::text('email','',['class'=>'form-control'])}}
</div>
</div>

<div class="col-md-3">
<div class="form-group">
    <label> Password</label>
    {{Form::text('password','',['class'=>'form-control'])}}
</div>
</div>


<div class="col-md-3">
<div class="form-group">
<label>token </label>
{{Form::text('remember_token','',['class'=>'form-control'])}}
</div>
</div>


<div class="col-md-3">
<div class="form-inline">
    <label>Status</label>
    <label>{{Form::checkbox('status')}} Is Active</label>
</div>
</div>


{{Form::token()}}
{!!Form::close()!!}

@endsection