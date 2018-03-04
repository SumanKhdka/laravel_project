<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Latest compiled and minified CSS -->

    <link rel="stylesheet" href="{{url('css/jquery-ui.min.css')}}">
	<link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{url('css/bootstrap-theme.min.css')}}">
	<link rel="stylesheet" href="{{url('css/bootstrap-datetimepicker.min.css')}}">
	<link rel="stylesheet" href="{{url('font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{url('css/custom.css')}}">

	<script type="text/javascript" src="{{url('js/moment.min.js')}}"></script>
	<script type="text/javascript" src="{{url('js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{url('js/jquery-ui.min.js')}}"></script>
	<script type="text/javascript" src="{{url('js/bootstrap-datetimepicker.min.js')}}"></script>
	<script type="text/javascript" src="{{url('js/bootstrap.min.js')}}"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


    <script src="//cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>

<link rel="stylesheet" href="{{url('css/admin.css')}}"/>


</head>
<body>

<!--top nav start=======-->
<nav class="navbar navbar-inverse top-navbar" id="top-nav">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="">Ecommerce</a>
        <a href="javascript:;" class="sidebar-toggle">
        <i class="fa fa-bars"></i></a>
        <span class="close-btn" id="hide-btn"><i class="fa fa-times" aria-hidden="true"></i></span>
    </div>

    <ul class="social-icon pull-right list-inline">

          <li class="dropdown">
          <a class="messages-link dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-envelope"></span>
              <span class="number">4</span>
              <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Page 1-1</a></li>
            
          </ul>
        </li>

          <li class="dropdown">
          <a class="alerts-link dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-bell"></span>
              <span class="number">6</span>
              <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Page 1-1</a></li>
            
          </ul>
        </li>
        
          <li class="dropdown">
            <a class="user-link dropdown-toggle"data-toggle="dropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-user"> {{ Auth::user()->name }} <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="{{url('admin/users/1/edit')}}">Profile</a></li>
            <li><a href="#">Setting</a></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form></li>
            </ul>
        </li>
    </div>
</nav>
<!--    top nav end===========-->

    <!-- begin SIDE NAV USER PANEL -->
<div class="container-1" id="user-profil">
<ul id="side" class="nav navbar-nav-1 side-nav">

 <li class="side-user">
  <img class="img-circle" src="" alt="Suman-Khadka">
    <p class="welcome"><i class="fa fa-key"></i> Logged in as</p>
    <p class="name tooltip-sidebar-logout">
    <a href="#" aria-haspopup="true" >
     {{ Auth::user()->name }} </a>

 </li>

    <li class="nav-search">
   <form class="navbar-form">
    <div class="input-group">
     <input type="text" class="form-control" placeholder="Search">
     <div class="input-group-btn">
     <button class="btn btn-default" type="submit">
     <i class="glyphicon glyphicon-search"></i>
     </button>
     </div>
   </div>
  </form>
 </li>

    <li class="dashboard">
   <a class="active" href="#"><i class="fa fa-dashboard"></i> Dashboard</a>
 </li>

    <li class="panel">
   <a href="javascript:;" data-toggle="collapse" data-target="#charts">
   <i class="fa fa-tags fw"></i> Catalog <i class="fa fa-caret-down pull-right"></i>
   </a>

  <ul class="collapse nav" id="charts">
    <li>
        <a href="{{url('admin/categories')}}"><i class="fa fa-angle-double-right"></i>Categories</a>
    </li>
    <li>
        <a href="{{url('admin/products')}}"><i class="fa fa-angle-double-right"></i>Products</a>
    </li>
    <li>
        <a href="{{url('admin/brands')}}"><i class="fa fa-angle-double-right"></i>Brand</a>
    </li>
  </ul>
</li>

    <li class="panel">
   <a href="javascript:;" data-toggle="collapse" data-target="#calendar">
   <i class="fa fa-puzzle-piece fw"></i> Extensions<i class="fa fa-caret-down pull-right"></i>
   </a>

  <ul class="collapse nav" id="calendar">
  <li>
        <a href="{{url('admin/pages')}}"><i class="fa fa-angle-double-right"></i>Page</a>
    </li>
  </ul>
</li>

    <li class="panel">
   <a href="javascript:;" data-toggle="collapse" data-target="#clipboard">
   <i class="fa fa-television fw"></i> Design <i class="fa fa-caret-down pull-right"></i>
   </a>

  <ul class="collapse nav" id="clipboard">
    <li>
        <a href="{{url('admin/banners')}}"><i class="fa fa-angle-double-right"></i> Banner</a>
    </li>
    <li>
        <a href="{{url('admin/featured/banners')}}"><i class="fa fa-angle-double-right"></i>Featured Banner</a>
    </li>
  </ul>
</li>

    <li class="panel">
   <a href="javascript:;" data-toggle="collapse" data-target="#edit">
   <i class="fa fa-shopping-cart fw"></i> Sales <i class="fa fa-caret-down pull-right"></i>
   </a>

  <ul class="collapse nav" id="edit">
    <li>
        <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a>
    </li>
    <li>
        <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a>
    </li>
  </ul>
</li>

    <li class="panel">
   <a href="javascript:;" data-toggle="collapse" data-target="#inbox">
   <i class="fa fa-user fw"></i> Customers <i class="fa fa-caret-down pull-right"></i>
   </a>

  <ul class="collapse nav" id="inbox">
  <li>
        <a href="{{url('admin/customers')}}"><i class="fa fa-angle-double-right"></i>Customer</a>
    </li>
    <li>
        <a href="{{url('admin/customer/groups')}}"><i class="fa fa-angle-double-right"></i>Customer Group</a>
    </li>
    <li>
        <a href="{{url('admin/contacts')}}"><i class="fa fa-angle-double-right"></i>Contact</a>
    </li>
  </ul>
</li>

    <li class="panel">
   <a href="javascript:;" data-toggle="collapse" data-target="#cogs">
   <i class="fa fa-share-alt fw"></i> Marketing <i class="fa fa-caret-down pull-right"></i>
   </a>

  <ul class="collapse nav" id="cogs">
  <li>
        <a href="{{url('admin/coupons')}}"><i class="fa fa-angle-double-right"></i>Coupons</a>
    </li>
  </ul>
</li>

    <li class="panel">
   <a href="javascript:;" data-toggle="collapse" data-target="#paper">
   <i class="fa fa-cog fw"></i> System <i class="fa fa-caret-down pull-right"></i>
   </a>

  <ul class="collapse nav" id="paper">
    <li>
        <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a>
    </li>
  </ul>
</li>

<li class="panel">
   <a href="javascript:;" data-toggle="collapse" data-target="#report">
   <i class="fa fa-bar-chart-o fw"></i> Reports <i class="fa fa-caret-down pull-right"></i>
   </a>

  <ul class="collapse nav" id="report">
    <li>
        <a href="#"><i class="fa fa-angle-double-right"></i> Flot Charts</a>
    </li>
    <li>
        <a href="#"><i class="fa fa-angle-double-right"></i> Morris.js</a>
    </li>
  </ul>
</li>

</ul>
</div>


    <div class="container-2">
     <div id="page-wrapper">
     <div class="col-md-12">
      <div class="page-title">
        <ol class="breadcrumb">
          <li class="pull-right"></li>
        </ol>
       </div>
      </div>
     @yield('content')
    </div><!-- page-wrapper END-->
   </div><!-- container-1 END-->



<script type="text/javascript">
    $(document).ready(function(){
        $(".sidebar-toggle").click(function(){
            $(this).hide();

           $("#user-profil").show();

           $("#hide-btn").show();

           $(".container-2").css("width", "85%");


        });

        $("#hide-btn").click(function(){
            $(this).hide();

           $("#user-profil").hide();

           $(".sidebar-toggle").show();

           $(".container-2").css("width", "100%");


        });

    });

</script>

<div class="col-sm-12 text-center"><ul class="pagination pagination-sm">
    <footer id="footer"><a href="http://localhost:8000">ecommerce</a> <span class="glyphicon glyphicon-copyright-mark"></span> 2018 All Rights Reserved.</footer></div>

    </div>

</body>
</html>
