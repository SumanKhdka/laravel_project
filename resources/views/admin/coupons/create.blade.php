@extends('admin.shared.layout')

@section('title','Add Coupons')

@section('content')
<div class="page-header">
<h3><i class="glyphicon glyphicon-pencil"></i> Add Coupons</h3>

{!!Form::open(['url'=>'admin/coupons','method'=>'post','enctype'=>'multipart/form-data'])!!}
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
    {{Form::text('name','',['class'=>'form-control'])}}
    </div>
</div>

<div class="col-md-3">
<div class="form-group">
<label>Code</label>
{{Form::text('code','',['class'=>'form-control'])}}
</div>
</div>

<div class="col-md-3">
<div class="form-group">
    <label> Discount</label>
    {{Form::number('discount','',['class'=>'form-control'])}}
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label>Discount Type</label>
<select name="discount_type" class="form-control">
    <option value="">Select Discount Type</option>
    <option value="amount">Amount</option>
    <option value="percentage">Percentage %</option>
</select>
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label>Minimum Phurchase</label>
{{Form::text('minumum_phurchase','',['class'=>'form-control'])}}
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label>Start Date</label>
{{Form::text('start_date','',['class'=>'form-control','id'=>'startdate'])}}
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label> End Date</label>
{{Form::text('end_date','',['class'=>'form-control','id'=>'enddate'])}}
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

<script>
$( function() {
    $("#startdate").datepicker({ dateFormat: "yy-mm-dd" }).val()
    $("#enddate").datepicker({ dateFormat: "yy-mm-dd" }).val()
  });
</script>

@endsection