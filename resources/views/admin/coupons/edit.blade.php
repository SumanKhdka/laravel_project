@extends('admin.shared.layout')

@section('title','Edit Coupons')

@section('content')
<div class="page-header">
<h3><i class="glyphicon glyphicon-pencil"></i> Edit Coupons</h3>

{!!Form::open(['url'=>'admin/coupons/'.$coupon->id,'method'=>'PUT','enctype'=>'multipart/form-data'])!!}
<div class="pull-right">
    <button type="submit" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i></button>
    {{link_to('admin/coupons','Back',['class'=>'btn btn-danger'])}}
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
    {{Form::text('name',$coupon->name,['class'=>'form-control'])}}
    </div>
</div>

<div class="col-md-3">
<div class="form-group">
<label>Code</label>
{{Form::text('code',$coupon->code,['class'=>'form-control'])}}
</div>
</div>

<div class="col-md-3">
<div class="form-group">
    <label> Discount</label>
    {{Form::text('discount',$coupon->discount,['class'=>'form-control'])}}
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label>Discount Type</label>
{{Form::text('discount_type',$coupon->discount_type,['class'=>'form-control'])}}
</div>
</div>


<div class="col-md-3">
<div class="form-group">
<label>Minimum Phurchase</label>
{{Form::text('minumum_phurchase',$coupon->minumum_phurchase,['class'=>'form-control'])}}
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label>Start Date</label>
{{Form::text('start_date',$coupon->start_date,['class'=>'form-control'])}}
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label> End Date</label>
{{Form::text('end_date',$coupon->end_date,['class'=>'form-control'])}}
</div>
</div>

<div class="col-md-3">
<div class="form-inline">
    <label>Status</label>
    <label>{{Form::checkbox('status','',$coupon->status)}} Is Active</label>
</div>
</div>

{{Form::token()}}
{!!Form::close()!!}

@endsection
