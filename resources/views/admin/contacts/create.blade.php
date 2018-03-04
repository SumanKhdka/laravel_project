@extends('admin.shared.layout')

@section('title','Add Contacts')

@section('content')
<div class="page-header">
<h3><i class="glyphicon glyphicon-pencil"></i> Add Contact</h3>


@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

    {!!Form::open(['url'=>'admin/contacts','method'=>'post','enctype'=>'multipart/form-data'])!!}
    <div class="pull-right">

    <button type="submit" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i></button>
    {{link_to('admin/contacts','Back',['class'=>'btn btn-danger'])}}
    </div>
    </div>

<div class="row">
<div class="col-md-4">
    <div class="form-group">
    <label>Name</label>
    {{Form::text('name','',['class'=>'form-control'])}}
    </div>
</div>

<div class="col-md-4">
<div class="form-group">
<label>Subject</label>
{{Form::text('subject','',['class'=>'form-control'])}}
</div>
</div>

<div class="col-md-4">
<div class="form-group">
    <label>Email</label>
    {{Form::text('email','',['class'=>'form-control'])}}
</div>
</div>
</div>

<div class="form-group">
    <label>Message</label>
    {{Form::textarea('meassage','',['class'=>'form-control'])}}
</div>

<div class="form-group">
    <label>Images</label>
    {{Form::file('image')}}
</div>

<div class="form-inline">
    <label>Status</label>
    <label>{{Form::checkbox('ststus')}} IS Active</label>
</div>

{!!Form::close()!!}

@endsection