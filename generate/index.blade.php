@extends('admin.shared.layout')

@section('title','title')

@section('content')

<div class="page-header">
    <h1>Add Title</h1>
</div>
<div class="pull-right">
    <p>
        <a href="{{url('admin/controller')}}" class="btn btn-primary btn-xs">
            <span class="glyphicon glyphicon-plus"></span>
        </a>
    </p>
</div>

<table class="table">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Added Date</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    @foreach($models as $m)
        <tr>
            <td>{{$m->id}}</td>
            <td>{{$m->name}}</td>
            <td>{{$m->created_at}}</td>
            <td>
                @if(m->status)
                <label class="label label-success">Active</label>
                @else
                <label class="label label-danger">InActive</label>
                @endif
                </td>
                <td>
                    {{!!Form::open(['url'=>'admin/controller/'.$m->id,'method'=>'DELETE'])!!}}
                    <a href="{{url('admin/controller/'.$m->id)}}" class="btn btn-success btn-xs">
                    <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    {{Form::token()}}
                    <button type="submit" class="btn btn-danger btn=xs" onclick='retutn confirm("Are you sure to delete ?'>
                    <span class="glyphicon gliphicon-trash"> </span>
                    </button>
                    {{!!Form::close()!!}}
                </td>
        </tr>
    @endforeach
</table>

@endsection