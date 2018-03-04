@extends('admin.shared.layout')

@section('title','Edit Contact')

@section('content')
<div class="page-header">
<h3><i class="glyphicon glyphicon-pencil"></i> Edit Contact</h3>


@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

{!!Form::open(['url'=>'admin/contacts/'.$contact->id,'method'=>'PUT','enctype'=>'multipart/form-data'])!!}
<div class="pull-right">

<button type="submit" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i></button>
{{link_to('admin/contacts','Back',['class'=>'btn btn-danger'])}}
</div>
</div>
<div class="row">
<div class="col-md-4">
    <div class="form-group">
    <label>Name</label>
    {{Form::text('name',$contact->name,['class'=>'form-control'])}}
    </div>
</div>

<div class="col-md-4">
<div class="form-group">
<label>Subject</label>
{{Form::text('subject',$contact->subject,['class'=>'form-control'])}}
</div>
</div>

<div class="col-md-4">
<div class="form-group">
    <label>Email</label>
    {{Form::text('email',$contact->email,['class'=>'form-control'])}}
</div>
</div>
</div>

<div class="form-group">
    <label>Message</label>
    {{Form::textarea('meassage',$contact->meassage,['class'=>'form-control'])}}
</div>

<div class="form-group">
    <label>Image</label>
    {{Form::file('image')}}
    @if($contact->image!='')
        <img src="{{Storage::url($contact->image)}}" style="height:100px"/>
        @endif
</div>

<div class="form-inline">
    <label>Status</label>
    <label>{{Form::checkbox('status','',$contact->status)}} Is Active</label>
</div>
{{Form::token()}}
{!!Form::close()!!}

@endsection
