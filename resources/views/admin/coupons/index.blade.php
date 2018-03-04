@extends('admin.shared.layout')

@section('title','Coupon')

@section('content')
<div class="page-header">

<ol class="breadcrumb">
<h3><i class="glyphicon glyphicon-user"></i> Coupons</h3>
  <li class="breadcrumb-item"><a href="">Home</a></li>
  <li class="breadcrumb-item active">Coupons</li>


<div class="pull-right">
        <a href="{{url('admin/coupons/create')}}" title="Add New", class="btn btn-primary btn">
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
        <th>Minumum Phurchase</th>
        <th>Valid Date</th>
        <th>Added Date</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    @foreach($coupons as $m)
        <tr>
            <td>{{$m->id}}</td>
            <td>{{$m->name}}</br>{{$m->code}}</td>
            <td>{{$m->discount}} in ({{$m->discount_type}})</td>
            <td>{{$m->minumum_phurchase}}</td>
            <td>{{$m->start_date}} to {{$m->end_date}}</td>
            <td>{{$m->created_at}}</td>
            <td>
                @if($m->status)
                <label class="label label-success">Active</label>
                @else
                    <label class="label label-danger">InActive</label>
                @endif
                </td>
                <td>
                   
                    <form class="send-coupon-form">
                    <input type="hidden" name="coupon_id" value="{{$m->id}}"/>
                    <button type="button" class="btn btn-default btn-xs send-coupon-btn">
                    <span class="glyphicon glyphicon-send"></span>
                </button>
                {{csrf_field()}}
                </form>

                {!!Form::open(['url'=>'admin/coupons/'.$m->id,'method'=>'DELETE'])!!}

                    <a href="{{url('admin/coupons/'.$m->id.'/edit')}}" class="btn btn-success btn-xs">
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

<script>
    $(document).ready(function(){
        $(".send-coupon-btn").on('click',function(){
            var $form=$(this).parent();
            $.post('{{url("admin/coupons/send")}}',
                $form.serialize(),function(res){
                    console.log(res);
                },'json');
        });
    });
   
</script>

@endsection
