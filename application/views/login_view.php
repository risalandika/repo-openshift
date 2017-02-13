<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  <title>Online Analytics - Login</title>

  <!-- Favicons-->
  <link rel="icon" href="<?php echo base_url()?>assets/images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="<?php echo base_url()?>assets/images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="<?php echo base_url()?>assets/images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="<?php echo base_url();?>assets/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url();?>assets/css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="<?php echo base_url();?>assets/css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url();?>assets/css/layouts/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="<?php echo base_url();?>assets/js/plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url();?>assets/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
</head>


<style type="text/css" >
  .input-field div.error{
    position: relative;
    top: -1rem;
    left: 0rem;
    font-size: 0.8rem;
    color:#FF4081;
    -webkit-transform: translateY(0%);
    -ms-transform: translateY(0%);
    -o-transform: translateY(0%);
    transform: translateY(0%);
  }
  .input-field label.active{
      width:100%;
  }
  .left-alert input[type=text] + label:after, 
  .left-alert input[type=password] + label:after, 
  .left-alert input[type=email] + label:after, 
  .left-alert input[type=url] + label:after, 
  .left-alert input[type=time] + label:after,
  .left-alert input[type=date] + label:after, 
  .left-alert input[type=datetime-local] + label:after, 
  .left-alert input[type=tel] + label:after, 
  .left-alert input[type=number] + label:after, 
  .left-alert input[type=search] + label:after, 
  .left-alert textarea.materialize-textarea + label:after{
      left:0px;
  }
  .right-alert input[type=text] + label:after, 
  .right-alert input[type=password] + label:after, 
  .right-alert input[type=email] + label:after, 
  .right-alert input[type=url] + label:after, 
  .right-alert input[type=time] + label:after,
  .right-alert input[type=date] + label:after, 
  .right-alert input[type=datetime-local] + label:after, 
  .right-alert input[type=tel] + label:after, 
  .right-alert input[type=number] + label:after, 
  .right-alert input[type=search] + label:after, 
  .right-alert textarea.materialize-textarea + label:after{
      right:70px;
  }
  </style>    
   
<body class="cyan" style="background:url('<?php echo base_url()?>assets/images/bg1.jpg') no-repeat center center fixed; ;background-size:100%;">
  <!-- Start Page Loading 
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->
 
    <div class="col s12 z-depth-4 card-panel" style="min-width:350px;">
       
      <form class="right-alert" action="<?php echo base_url('login') ?>" method="post" autocomplete="off">
        <div class="row">
          <div class="input-field col s12 center">
            <img src="<?php echo base_url()?>assets/images/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">
            <p class="center login-form-text">Online Analytics</p>
          </div>
        </div>
         <?php
   // Cetak session
  if($this->session->flashdata('sukses')) {
    echo '<div id="card-alert" class="card deep-purple">
                      <div class="card-content white-text">
                        <p align="center">'.$this->session->flashdata('sukses').'</p>
                      </div>
                      <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>';
  }
  // Cetak error
  echo validation_errors('<div id="card-alert" class="card deep-purple">
                      <div class="card-content white-text">
                        <p align="center">','</p>
                      </div>
                      <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>');
  ?>

        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-communication-email prefix"></i>
            <input id="username" name="username" class="validate" type="email" required>
            <label for="username" data-error="Please enter a valid email." class="left-alert active">Email</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password"  name="password" type="password" class="validate" required>
            <label for="password" data-error="Please enter a password." class="left-alert" style="transform:translateY(-140%);font-size:0.8rem;">Password</label>
          </div>
        </div>
        <div class="row">          
          <div class="input-field col s12 m12 l12  login-text">
              <input type="checkbox" id="remember-me" />
              <label for="remember-me">Remember me</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button type="submit" class="btn waves-effect waves-light col s12">Login</button>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 m6 l12">
            <p class="margin medium-small" style="text-align:-webkit-center;">Don't have an account? Please <a href="<?php echo base_url();?>register">register</a> first.</p>
          </div>
          <div class="input-field col s6 m6 l6" style="display:none;">
              <p class="margin right-align medium-small"><a href="#">About</a></p>
          </div>          
        </div>

      </form>
    </div>
<!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
  <!--prism-->
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/prism/prism.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

      <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/custom-script.js"></script>

</body>

<script type="text/javascript">
  function go_to_login()
  {
    <?php 
    
          $this->session->set_userdata('state_root','home');
          $this->session->set_userdata('state_leaf','home_account'); 
          $this->session->set_userdata('ACTIVE_WEBSITE','Choose a website..'); 
          $this->session->set_userdata('ID_PUB','');
    ?>

      window.location='dashboard.php';
  }
</script>

</body>
</html>
