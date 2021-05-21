@extends('layout.main')

@section('link')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
@endsection

@section('header')
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="https://github.com/bonzqbet" target="__blank" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3" action="" method="get" style="display:none">
    @csrf
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" name="t" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @if(!empty(Session::get('username')) && !empty(Session::get('status')))
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Session::get('status') }} : {{ Session::get('username') }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href=""
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{URL('logout')}}" method="get" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endif
    </ul>
  </nav>
  <!-- /.navbar -->

@endsection

@section('content')


<div class="row" >
    <div class="col-lg-3">

    </div>
    <div class="col-lg-6">
        <div class="card" style="margin-top:50px">
          
          <h5 class="card-title" style="margin-top:30px;margin-left:20px">แก้ไขสินค้าในระบบ</h5>

            <div class="card-body">

            @if(isset($success))
                <div class="alert alert-success">
                    {{ $success }}
                </div>
            @endif
                <form action="{{ route('ajax.update',$data[0]->id) }}" method="post">
                    <input type="text" class="form-control" name="product_id" placeholder="ชื่อสินค้า..." value="{{ $data[0]->id }}" style="display: none;">
                    <div class="form-group">
                        <label for="exampleInputEmail">ชื่อสินค้า</label>
                        <input type="text" class="form-control" name="Pname" placeholder="ชื่อสินค้า..." value="{{ $data[0]->product_name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">ราคาสินค้า</label>
                        <input type="number" class="form-control" name="price" placeholder="ราคาสินค้า..." value="{{ $data[0]->product_price }}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">รายละเอียดสินค้า</label>
                        <textarea name="Detail"  class="form-control" id="" cols="30" rows="4" placeholder="รายละเอียด..." required>{{ $data[0]->product_detail }}</textarea>
                    </div>
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection