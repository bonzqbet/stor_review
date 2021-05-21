<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="<?php echo asset('assets/css/theme.css'); ?>">
    <script language="JavaScript" type="text/javascript" src="<?php echo asset('assets/js/jquery-1.9.0.js'); ?>"></script>
    <script language="JavaScript" type="text/javascript" src="<?php echo asset('assets/js/jquery.blockUI.js'); ?>"></script>
    @yield('link')  

</head>
<body>
    @yield('content')  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo asset('assets/js/core.js'); ?>"></script>
    <script src="<?php echo asset('assets/js/main.js'); ?>"></script>
</body>
</html>