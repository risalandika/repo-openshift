<?php
// Proteksi halaman
$this->simple_login->cek_login();
?>

<!DOCTYPE html>
<html lang="en">

<!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 3.1
	Author: GeeksLabs
	Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->


<!-- Mirrored from demo.geekslabs.com/materialize/v3.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Oct 2016 06:33:31 GMT -->
<head>
   <!-- Material -->
   <title>Telkom Analytics - Dashboard</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Telkom Online Analytics.">
    <meta name="keywords" content="telkom, online, analytics, website,">
    <!-- Favicons-->
    <link rel="icon" href="<?php echo base_url()?>assets/images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url()?>assets/images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="<?php echo base_url()?>assets/images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->

    <!-- CORE CSS-->    
    <link href="<?php echo base_url(); ?>assets/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url(); ?>assets/css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="<?php echo base_url(); ?>assets/css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">

    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="<?php echo base_url(); ?>assets/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url(); ?>assets/js/plugins/jvectormap/jquery-jvectormap.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url(); ?>assets/js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?php echo base_url(); ?>assets/js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/amcharts/plugins/export/export.css">


 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/jquery-1.11.2.min.js"></script>    

  <!-- Include Required Prerequisites -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/moment.js"></script>

    <!--materialize js-->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
 

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/amcharts/amcharts2.js"></script>
    <script src="<?php echo base_url();?>assets/amcharts/pie.js"></script>
    <script src="<?php echo base_url();?>assets/amcharts/plugins/export/export.min.js"></script>
    <script src="<?php echo base_url();?>assets/amcharts/plugins/export/libs/fabric.js/fabric.min.js"></script>
    <script src="<?php echo base_url();?>assets/amcharts/plugins/export/libs/jszip/jszip.min.js"></script>
    <script src="<?php echo base_url();?>assets/amcharts/plugins/export/libs/FileSaver.js/FileSaver.min.js"></script>
    <script src="<?php echo base_url();?>assets/amcharts/plugins/export/libs/xlsx/xlsx.min.js"></script> 
    <script src="<?php echo base_url();?>assets/amcharts/plugins/export/libs/pdfmake/pdfmake.min.js "></script> 
    <script src="<?php echo base_url();?>assets/amcharts/serial.js"></script>
    <script src="<?php echo base_url();?>assets/amcharts/themes/black.js"></script>
    <script src="<?php echo base_url();?>assets/amcharts/themes/chalk.js"></script>
    <script src="<?php echo base_url();?>assets/amcharts/themes/dark.js"></script>
    <script src="<?php echo base_url();?>assets/amcharts/themes/light.js"></script>
    <script src="<?php echo base_url();?>assets/amcharts/themes/patterns.js"></script>





 
<!-- Include Date Range Picker -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/daterangepicker2/daterangepicker.css">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.daterangepicker.js"></script>

</head>
<body>

