@extends('admin.shared.layout')

@section('title','Add Brand')

@section('content')
<div class="page-header">
<h3><i class="glyphicon glyphicon-pencil"></i> Add Brand</h3>
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

    {!!Form::open(['url'=>'admin/brands','method'=>'post','enctype'=>'multipart/form-data'])!!}
    <div class="pull-right">

    <button type="submit" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i></button>
    {{link_to('admin/brands','Back',['class'=>'btn btn-danger'])}}
    </div>

<div>
<label>Name</label>
{{Form::text('name','',['class'=>'form-control'])}}
</div>

<div class="form-group">
    <label>Description</label>
    {{Form::textarea('description','',['class'=>'form-control'])}}
</div>

<div class="form-group">
    <label>Image</label>  
    {{Form::file('image')}}
</div>

<div class="form-inline">
    <label>Status</label>
    <label>{{Form::checkbox('status')}} Is Active</label>
</div>
  </div>
 
</div>

{{Form::token()}}
{!!Form::close()!!}

@endsection