@extends('admin.shared.layout')

@section('title','Add Customer Group')

@section('content')
<div class="page-header">
<h3><i class="glyphicon glyphicon-pencil"></i> Add Customer Group</h3>

{!!Form::open(['url'=>'admin/customer/groups','method'=>'post','enctype'=>'multipart/form-data'])!!}
<div class="pull-right">
    <button type="submit" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i></button>
    {{link_to('admin/customer/groups','Back',['class'=>'btn btn-danger'])}}
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
<div class="col-md-3">
    <div class="form-group">
    <label>Name</label>
    {{Form::text('name','',['class'=>'form-control'])}}
    </div>
</div>

<div class="col-md-3">
<div class="form-group">
<label>Discount</label>
{{Form::number('discount','',['class'=>'form-control'])}}
</div>
</div>

<div class="col-md-3">
<div class="form-group">
    <label> Discount Type</label>
    {{Form::text('discount_type','',['class'=>'form-control'])}}
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