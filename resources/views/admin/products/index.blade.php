@extends('admin.shared.layout')

@section('title','Products')

@section('content')
<div class="page-header">
<ol class="breadcrumb">
<h3><i class="glyphicon glyphicon-th-list"></i> Product List</h3>
  <li class="breadcrumb-item"><a href="">Home</a></li>
  <li class="breadcrumb-item active">Products</li>
</ol>
</div>


<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapse" aria-expanded="false" aria-controls="collapse">
  Filter
</a>
<div class="collapse" id="collapse">
  <div class="well">
  <div class="row">
  <div class="col-md-3">
            <div class="form-group">
            <label>Name</label>
                <input type="text" class="form-control" name="Name" placeholder="Name" />
            </div>
    </div>
           

    <div class="col-md-3">                
            <div class="form-group">
            <label>Category</label>
            {{Form::select('category_id',$categories,null,['placeholder'=>'Select Category','class'=>'form-control'])}}
            </div>
           
    </div>
            
    <div class="col-md-3">            
            <div class="form-group">
            <label>Brand</label>
            {{Form::select('brand_id',$brands,null,['placeholder'=>'Select Brand','class'=>'form-control'])}}
            </div>
            </div

<div class="row">
<div class="col-md-3">  
<div class="form-group">
            <label>Price Label</label>   
            <p>
            <span id="amount"></span>
            </p>
            <div id="try-slider">
        </div>
        </div>
        </div>

<div class="col-md-3">  
<div class="form-group">
            <label>Start Date</label> 
            <input type="text" class="form-control" id="startdate"/>
            
</div>
</div>

<div class="col-md-3">  
<div class="form-group">
            <label>End Date</label> 
            <input type="text" class="form-control" id="enddate"/>
            
</div>
</div>

<div class="col-md-3">
<div class="form-inline">
<label>Status</label>
<p>
        <label>{{Form::checkbox('status')}} Is Active</label>
        </p>
</div>
</div>

<div class="col-md-3">
<div class="form-inline">
<label>features</label>
<p>
        <label>{{Form::checkbox('status')}} Is Active</label>
        </p>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="col-md-3">
    <form method="get" action="{{url('admin/products')}}">
            <div class="form-group">
                <button type="submit" class="btn btn-success btn">Search</button>
                <a href="{{url('admin/products')}}" class="btn btn-danger btn">Clear</a>
                {{csrf_field()}}
            </div>
        </form>
  </div>
</div>
</div>
</div>
</div></div>

   

<div class="pull-right">
    <p>
        <a href="{{url('admin/products/create')}}" class="btn btn-primary btn">
            <span class="glyphicon glyphicon-plus"/>
        </a>
        <a href="" data-toggle="tooltip" title="Refresh" class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i></a>

    </p>
</div>

<table class="table">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Category ID</th>
        <th>Images</th>
        <th>Display Orders</th>
        <th>Added Date</th>
        <th>Updated Date</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    @foreach($products as $m)

    
        <tr>
            <td>{{$m->id}}</td>
            <td>{{$m->name}}</td>
            <td>{{$m->description}}</td>
            <td>{{$m->quantity}}</td>
            <td>{{$m->price}}</td>
            <td>{{$m->category_id}}</td>
            <td><img src="{{Storage::url($m->image)}}" style="height:100px;width:100px"></td>
            <td>{{$m->display_order}}</td>
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
                    {!!Form::open(['url'=>'admin/products/'.$m->id,'method'=>'DELETE'])!!}
                    <a href="{{url('admin/products/'.$m->id.'/edit')}}" class="btn btn-success btn-xs">
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
    <div class="clearfix"></div>
    {{$products->appends(request()->query())->links()}}
</div>



<script type="text/javascript">
    $(document).ready(function(){
		$("#try-slider").slider({
			range: true,
			min: 0,
			max: 50000,
			values: [0, 50000],
			slide: function( event, ui ) {
				$("#amount").html("Rs. " + ui.values[ 0 ] + " - Rs. " + ui.values[ 1 ]);
			}
		});
		$("#amount").html( "Rs. " + $("#try-slider").slider("values", 0) +
			" - Rs. " + $("#try-slider").slider( "values", 1 ) );

    });

   $( function() {
    $("#startdate").datepicker({ dateFormat: "yy-mm-dd" }).val()
    $("#enddate").datepicker({ dateFormat: "yy-mm-dd" }).val()
  });


</script>


@endsection