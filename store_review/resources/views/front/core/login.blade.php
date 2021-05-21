@extends('layout.master')

    <title>ระบบบริหารจัดการสินค้า</title>

@section('content')
</head>
<body class="new_login" style="background: url('https://coolbackgrounds.io/images/backgrounds/index/compute-ea4c57a4.png');"> 
    <div class="loginBack">
        <div class="login-form">
            <div class="header" style="background: url('../upload/core/') center;background-repeat: round;">
                <div class="brand">
                    <img src="<?php echo asset('assets/img/295128.png'); ?>" alt="">
                </div>
            </div>
            <div class="body">
                <div class="title">System Management Product.</div>

                <form class="form-default" action="{{ route('Login.index') }}" method="get" name="myFormLogin" id="myFormLogin">
                    <input id="inputUrl" name="inputUrl" type="hidden" value="">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="fa fa-user-o"></span>
                            </span>
                            <input class="form-control" type="text" name="inputUser" id="inputUser" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="fa fa-key"></span>
                            </span>
                            <input class="form-control" type="password" name="inputPass" id="inputPass" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-btn">
                        <input class="btn btn-primary" name="input" type="submit" value="LOGIN" />
                    </div>
                        <a class="margin-top:10%" href="/register">Register</a>
                </form>
                @if(isset($success))
                <div id="loadAlertLogin">
                    <img src="<?php echo asset('assets/img/error.png'); ?>" align="absmiddle" hspace="10" />{{$success}}</div>
                </div>
                @endif
        </div>

        <div id="loadCheckComplete"></div>
    </div>


    <div class="loginBack" style="display: none;">
    </div>

    <div class="footerBackOffice">
        <div>
            <div class="imgLogo">&copy; 2020 Copyright. </div>
            <div class="divLogin">Email: playgroundclub_1@hotmail.com</div>
        </div>
    </div>
    <div id="tallContent" style="display:none">
        <span style="font-size:18px;">Please waiting..</span>
        <div style="height:10px;"></div>
        <img src="img/loader/login.gif" />
    </div>

@endsection

