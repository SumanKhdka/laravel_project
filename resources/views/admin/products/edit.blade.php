@extends('admin.shared.layout')

@section('title','Edit Product')

@section('content')
<div class="page-header">
<h3><i class="glyphicon glyphicon-pencil"></i> Edit Product</h3>
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


{!!Form::open(['url'=>'admin/products/'.$product->id,'method'=>'PUT','enctype'=>'multipart/form-data'])!!}
<div class="pull-right">

<button type="submit" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i></button>
{{link_to('admin/products','Back',['class'=>'btn btn-danger'])}}


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
<label>Name</label>
{{Form::text('name',$product->name,['class'=>'form-control'])}}
</div>
 
<div class="form-group">
    <label>Description</label>
    {{Form::textarea('description',$product->description,['class'=>'form-control'])}}
</div>

<div class="form-group">
    <label>Quantity</label>
    {{Form::number('quantity',$product->quantity,['class'=>'form-control'])}}
</div>

<div class="form-group">
    <label>Price</label>
    {{Form::number('price',$product->price,['class'=>'form-control'])}}
</div>

<div class="form-group">
    <label>Category</label>
    {{Form::select('category_id',$categories,null,['placeholder'=>'Select Category','class'=>'form-control'])}}
</div>

<div class="form-group">
    <label>Images</label>
    {{Form::file('image')}}
    @if($product->image!='')
        <img src="{{Storage::url($product->image)}}" style="height:100px"/>
        @endif
</div>

<div class="form-group">
<label>Display Order</label>
{{Form::text('display_order',$product->display_order,['class'=>'form-control'])}}
</div>

<div class="form-inline">
    <label>Status</label>
    <label>{{Form::checkbox('status','',$product->status)}} Is Active</label>
</div>
</div>
  <div role="tabpanel" class="tab-pane" id="meta">
  <div class="form-group">
    <label>Meta Description</label>
    {{Form::textarea('meta_description',$product->meta_description,['class'=>'form-control'])}}
</div>

<div class="form-group">
    <label>Meta Keywords</label>
    {{Form::textarea('meta_keywords',$product->meta_keywords,['class'=>'form-control'])}}
</div>
  </div>
  </div>
{{Form::token()}}
{!!Form::close()!!}

@endsection
