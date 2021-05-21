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
<div class="container">
    <div class="content-header">
    <div class="row md-5">
        <div class="col md-12 my-3">
            <h2>Product Grid</h2>
        </div>
    </div>
</div>
    @if($message = Session::get('success'))
      <div class="alert alert-success">
        {{ $message }}
      </div>
    @endif
    <div class="grid-container">
    @foreach($data as $key => $value)
        <div class="grid-item">
            <a href="{{ route('store.show',$value->id) }}"><span title="View">{{ $value->product_key }} : {{ $value->product_name }}</span></a>    
        </div>
    @endforeach 
    </div>
    <div style="margin-top:5px;">
        {!! $data->links() !!}
    </div>

</div>

@endsection