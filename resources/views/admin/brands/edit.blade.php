@extends('admin.shared.layout')

@section('title','Edit Brand')

@section('content')
<div class="page-header">
<h3><i class="glyphicon glyphicon-pencil"></i> Edit Brand</h3>
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

{!!Form::open(['url'=>'admin/brands/'.$brand->id,'method'=>'PUT','enctype'=>'multipart/form-data'])!!}
<div class="pull-right">

<button type="submit" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i></button>
{{link_to('admin/brands','Back',['class'=>'btn btn-danger'])}}
</div>

<div class="form-group">
<label>Name</label>
{{Form::text('name',$brand->name,['class'=>'form-control'])}}
</div>
 
<div class="form-group">
    <label>Description</label>
    {{Form::textarea('description',$brand->description,['class'=>'form-control'])}}
</div>

<div class="form-group">
    <label>Logo</label>
    {{Form::file('image')}}
    @if($brand->image!='')
        <img src="{{Storage::url($brand->image)}}" style="height:100px"/>
        @endif
</div>

<div class="form-inline">
    <label>Status</label>
    <label>{{Form::checkbox('status','',$brand->status)}} Is Active</label>
</div>
</div>
  </div>
  </div>
{{Form::token()}}
{!!Form::close()!!}

@endsection
