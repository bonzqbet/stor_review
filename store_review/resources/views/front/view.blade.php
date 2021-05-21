@extends('layout.main')


@section('header')
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('store.index') }}" class="nav-link">Home</a>
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

<a href="{{ route('store.index') }}" ><img src="https://png.pngtree.com/png-vector/20190412/ourlarge/pngtree-vector-back-icon-png-image_931209.jpg" alt="" style="width: 30px;height:30px"></a>



  @if(isset($success))
        <div class="alert alert-success">
            {{ $success }}
        </div>
    @endif

    <div class="row" style="margin-top:50px">
    <div class="col-lg-3">

    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">

            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endif
                <form action="/add">
                      <h2 class="card-title"></h2>
                    <div class="form-group">
                        <label for="exampleInputEmail">ชื่อสินค้า : </label><span> {{ $data[0]->product_name }}</span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">ราคาสินค้า : </label><span> ฿{{ number_format($data[0]->product_price) }}</span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">รายละเอียดสินค้า : </label><span> {{ $data[0]->product_detail }}</span>
                    </div>
                    <a href="{{ route('store.index') }}" class="btn btn-primary btn-block">Back</a>
                </form>
            </div>
        </div>
    </div>
  </div>

<!-- Comment scroll -->
  <div class="row" style="margin-top:5px">
    <div class="col-lg-3">
      
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                      <h2 class="card-title"></h2>
                    <div class="form-group">
                        <label for="exampleInputEmail">แสดงความคิดเห็น</label>
                    </div>
                  <form action="{{ route('store.edit',$data[0]->id) }}" method="PUT">
                  <input type="text" name="id_product" value="{{ $data[0]->id }}" class="Remove">
                    <div class="form-group">
                        <label for="exampleInputEmail">{{ Session::get('username') }} : </label>
                        <textarea name="comment"  class="form-control" id="" cols="30" rows="3" placeholder="เพิ่มความคิดเห็น..."></textarea>
                    </div>
                    <button class="btn btn-primary btn-block dis-block-30">โพสต์</button>
                  </form>
                    <div class="scrollbar" id="style-default">
                    <div class="force-overflow"></div>
                @if(isset($comment[0]))
                @foreach($comment as $key => $valueCom)
                <div class="form-group my-4 p-3">
                      @if(Session::get('status')!='Normal' || Session::get('id')==$valueCom->sy_stf_id)
                        <form action="{{ route('ajax.destroy',$valueCom->comment_id) }}"  method="post">
                          @csrf
                          @method('DELETE')
                        <button class="dis-block-5" title="delete" style="border: none;"><img src="<?php echo asset('assets/img/delete.png'); ?>" alt="" style="width: 30px;height: 30px;"></button>
                        </form>
                      @endif
                      <div class="DivbuttomBorder">
                        <span> {{ $valueCom->sy_stf_username }} :</span><br>
                        <span> {{ $valueCom->comment_description }} </span><br>
                        <span class="font-12"> {{ DateFormat($valueCom->comment_credate) }} </span><br>

                      </div>
                    </div>
                @endforeach
                @endif
                @if(!isset($comment[0]))
               
                <span colspan="7" align="center"  valign="middle"  class="divRightContantTbRL" style="display: grid;margin-top: 22%;" >None</span>
                @endif
                <div id="wrapper">
                  </div>
                </div>
                <!-- <a href="{{ route('ajax.show','1') }}" class="btn btn-primary btn-block dis-block-30">ดูความคิดเห็นเพิ่มเติม</a> <span style="margin-left: 60%;">6 จาก 10</span> -->
                
              </div>
              <div style="padding: 3%;">{!! $comment->links() !!}</div>
        </div>
    </div>
  </div>

@endsection