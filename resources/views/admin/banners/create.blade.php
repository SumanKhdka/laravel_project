@extends('admin.shared.layout')

@section('title','Add Banners')

@section('content')
<div class="page-header">
    <h1>Add Banner</h1>
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

{!!Form::open(['url'=>'admin/banners','method'=>'post','enctype'=>'multipart/form-data'])!!}

<div class="form-group">
<label>Title</label>
{{Form::text('title','',['class'=>'form-control'])}}
</div>

<div class="form-group">
    <label>Description</label>
    {{Form::textarea('description','',['class'=>'form-control'])}}
</div>

<div class="form-group">
    <label>Images</label>
    {{Form::file('image')}}
</div>

<div class="form-inline">
    <label>Status</label>
    <label>{{Form::checkbox('status')}} Is Active</label>
</div>
<button type="submit" class="btn btn-success">Save</button>
{{link_to('admin/banners','Back',['class'=>'btn btn-danger'])}}
{!!Form::close()!!}

@endsection