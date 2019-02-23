<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>index</title>
    <!-- Favicon-->
    <link rel="icon" href="assets/images/logo.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    
    <?php
    $host = 'https://fonts.googleapis.com/icon?family=Material+Icons';
    if($socket =@ fsockopen($host, 80, $errno, $errstr, 30)) {
        ?>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <?php
    fclose($socket);
    } else {
            ?>
            <link href="assets/iconfont/material-icons.css" rel="stylesheet" type="text/css">
            <?php
    }
    ?>

    <!-- Bootstrap Core Css -->
    <link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
    html { 
      background: url(assets/images/cvsu.jpg) no-repeat center center fixed; 
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }
    .login-page{
        border-radius: 5px;
    }
    </style>
</head>

