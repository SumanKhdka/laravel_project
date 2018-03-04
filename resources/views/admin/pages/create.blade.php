@extends('admin.shared.layout')

@section('title','Add Page')

@section('content')
<div class="page-header">
<h3><i class="glyphicon glyphicon-pencil"></i> Add Page</h3>
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



{!!Form::open(['url'=>'admin/pages','method'=>'post','enctype'=>'multipart/form-data'])!!}
<div class="pull-right">

<button type="submit" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i></button>
{{link_to('admin/pages','Back',['class'=>'btn btn-danger'])}}
</div>

<div>
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li role="presentation" class="active"><a href="#details" aria-controls="details" role="tab" data-toggle="tab">Details</a></li>
  <li role="presentation"><a href="#meta" aria-controls="meta" role="tab" data-toggle="tab">Meta</a></li>
  </ul>

<!-- Tab panes -->
<div class="tab-content">
  <div role="tabpanel" class="tab-pane active" id="details">
  
  <div class="form-group">
<label>Title</label>
{{Form::text('title','',['class'=>'form-control'])}}
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
  <div role="tabpanel" class="tab-pane" id="meta">

  <div class="form-group">
    <label>Slug</label>
    {{Form::textarea('slug','',['class'=>'form-control'])}}
</div>

  <div class="form-group">
    <label>Meta Description</label>
    {{Form::textarea('meta_description','',['class'=>'form-control'])}}
</div>

<div class="form-group">
    <label>Meta Keywords</label>
    {{Form::textarea('meta_keywords','',['class'=>'form-control'])}}
</div>
  </div>
  </div>

</div>

{{Form::token()}}
{!!Form::close()!!}

@endsection