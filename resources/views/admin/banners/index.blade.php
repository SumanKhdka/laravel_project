@extends('admin.shared.layout')

@section('title','Banner')

@section('content')
<div class="page-header">

<ol class="breadcrumb">
<h3><i class="glyphicon glyphicon-th-list"></i> Banners</h3>
  <li class="breadcrumb-item"><a href="">Home</a></li>
  <li class="breadcrumb-item active">Banners</li>
</ol>
<div class="row">
<p>
    <div class="col-md-6">
        <form method="get" action="{{url('admin/banners')}}">
            <div class="form-group">
                <input type="text" name="q" placeholder="Search..."/>
                <a href="{{url('admin/banners')}}" class="btn btn-danger btn-xs">Clear</a>
                {{csrf_field()}}
            </div>
        </form>
    </div>

<div class="pull-right">

<a href="{{url('admin/banners/create')}}" title="Add New", class="btn btn-primary btn">
    <span class="glyphicon glyphicon-plus"/>
</a>
<a href="" data-toggle="tooltip" title="Refresh" class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i></a>
</div>
</p>
</div>

<table class="table">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Description</th>
        <th>Banner</th>
        <th>Added Date</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    @foreach($banners as $m)
        <tr>
            <td>{{$m->id}}</td>
            <td>{{$m->title}}</td>
            <td>{{$m->description}}</td>
            <td><img src="{{Storage::url($m->image)}}" style="height:100px;width:100px"></td>
            <td>{{$m->created_at}}</td>
            <td>
                @if($m->status)
                <label class="label label-success">Active</label>
                @else
                    <label class="label label-danger">InActive</label>
                @endif
                </td>
                <td>
                    {!!Form::open(['url'=>'admin/banners/'.$m->id,'method'=>'DELETE'])!!}
                    <a href="{{url('admin/banners/'.$m->id.'/edit')}}" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    {{Form::token()}}
                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete ?')">
                    <span class="glyphicon glyphicon-trash"> </span>
                    </button>
                    {!!Form::close()!!}
                </td>
        </tr>
    @endforeach
</table>

@endsection