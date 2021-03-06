<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Universitas Jember</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes"> 
        <LINK REL="SHORTCUT ICON" HREF="<?php echo base_url(); ?>asset/img/logo_unej.png">	
        <link href="<?php echo base_url(); ?>asset/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>asset/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>asset/css/font-awesome.css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">

        <link href="<?php echo base_url(); ?>asset/css/style.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>asset/css/pages/signin.css" rel="stylesheet" type="text/css">
    </head>
    <body>

        <div class="navbar navbar-fixed-top">

            <div class="navbar-inner">

                <div class="container">

                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </a>
                    <a class="brand" href="index.html"> 
                        <div class="row">
                            <div style=" width:110px; float:left; text-align:center;"><img src="<?php echo base_url(); ?>asset/img/logo_unej.png" width="80" height="80" ></div>
                            <div style="margin-top:15px; width:300px; float:left; text-align:left; font-family:'Trebuchet MS', Helvetica, sans-serif; font-size:22px;" >Sistem Informasi Akademik</br> Universitas Jember</div>
                        </div> 
                    </a>


                </div> <!-- /container -->

            </div> <!-- /navbar-inner -->

        </div> <!-- /navbar -->
        <div class="account-container">

            <div class="content clearfix">

                <?php
                $operasi = $this->session->userdata('operation');
                if ($operasi != null) {
                    if ($operasi == "gagal") {
                        echo '<div class="alert alert-error">
      <a class="close" data-dismiss="alert">×</a>
      <i class="icon icon-warning-sign"></i> <b>Maaf</b> ' . $this->session->userdata('message') . '</i></div>';
                    } else if ($operasi == "validasi") {
                        echo '<div class="alert alert-error">
      <a class="close" data-dismiss="alert">×</a>
      <i class="icon icon-warning-sign"></i> <b>Maaf</b> ' . $this->session->userdata('message') . '</i></div>';
                    }
                }
                $this->session->unset_userdata('operation');
                $this->session->unset_userdata('message');
                ?>
                <form action="index.php/login/proses" method="post">

                    <h1>Login</h1>		
                    <div class="login-fields">
                        <div class="field">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" value="" placeholder="Username" class="login username-field" />
                        </div> <!-- /field -->

                        <div class="field">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field"/>
                        </div> <!-- /password -->
                        <input type="hidden" id="password" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>"/>
                        <?php //echo $_SERVER['SERVER_ADDR']; ?>
                    </div> <!-- /login-fields -->
                    <div class="login-actions">
                        <button class="button btn btn-success btn-large"><a href="index2.html"></a>Sign In</button>
                    </div> <!-- .actions -->
                </form>
            </div> <!-- /content -->

        </div> <!-- /account-container -->
        <div class="login-extra">
            <a href="#">Reset Password</a>
        </div> <!-- /login-extra -->
        <script src="<?php echo base_url(); ?>asset/js/jquery-1.7.2.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/js/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>asset/js/signin.js"></script>
    </body>
</html>
