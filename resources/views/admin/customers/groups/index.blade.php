@extends('admin.shared.layout')

@section('title','Customer Group')

@section('content')
<div class="page-header">
<ol class="breadcrumb">
<h3><i class="glyphicon glyphicon-th-list"></i> Customer Group List</h3>
  <li class="breadcrumb-item"><a href="">Home</a></li>
  <li class="breadcrumb-item active">CustomerGroup</li>


<div class="pull-right">
        <a href="{{url('admin/customer/groups/create')}}" title="Add New", class="btn btn-primary btn">
            <span class="glyphicon glyphicon-plus"/>
        </a>
        <a href="" data-toggle="tooltip" title="Refresh" class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i></a>
</div>
</ol>



<table class="table">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Discount</th>
        <th>Discount Type</th>
        <th>Added Date</th>
        <th>Updated Date</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    @foreach($customergroups as $m)
        <tr>
            <td>{{$m->id}}</td>
            <td>{{$m->name}}</td>
            <td>{{$m->discount}}</td>
            <td>{{$m->discount_type}}</td>
            <td>{{$m->created_at}}</td>
            <td>{{$m->updated_at}}</td>
            <td>
                @if($m->status)
                <label class="label label-success">Active</label>
                @else
                    <label class="label label-danger">InActive</label>
                @endif
                </td>
                <td>
                    {!!Form::open(['url'=>'admin/customer/groups/'.$m->id,'method'=>'DELETE'])!!}
                    <a href="{{url('admin/customer/groups/'.$m->id.'/edit')}}" class="btn btn-success btn-xs">
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

<div class="row">
<div class="col-sm-6 text-left"><ul class="pagination pagination-sm">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul></div>
<div class="col-sm-6 text-right">Showing 1 to 10 of 21 (3 Pages)</div>
</div>
</div>

@endsection