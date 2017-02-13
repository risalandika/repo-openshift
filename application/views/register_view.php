<!DOCTYPE html>
<html>
<head>
  <title>Online Analytics</title>
  <!--
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="font-awesome/<?php echo base_url()?>assets/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
  <script src="<?php echo base_url();?>assets/js/jquery-1.11.3.min.js"></script>
  -->

  <!-- Material -->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Telkom Online Analytics.">
  <meta name="keywords" content="telkom, online, analytics, website,">
  <!-- Favicons-->
  <link rel="icon" href="<?php echo base_url();?>assets/images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>assets/images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="<?php echo base_url();?>assets/images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->

  <link href="<?php echo base_url()?>assets/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url()?>assets/css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- Custome CSS-->    
  <link href="<?php echo base_url()?>assets/css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url()?>assets/css/layouts/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="<?php echo base_url();?>assets/js/plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="<?php echo base_url();?>assets/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">

  <link href="<?php echo base_url();?>assets/js/plugins/sweetalert/sweetalert.css" type="text/css" rel="stylesheet" media="screen,projection">

  <link href="<?php echo base_url();?>assets/js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
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
</head>
<body class="grey" style="background:url('<?php echo base_url()?>assets/images/bg1.jpg') no-repeat center center fixed; ;background-size:100%;"> 

  
  

  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->



  <div id="login-page" class="row">
    
    <div id="register_panel" class="col s12 m12 z-depth-4 card-panel" style="display:block;">
        <div class="row">
          <div class="input-field col s12 center">
            <h5 class="center">Registration</h5>
            <p style="min-width:300px;">Online Analytics<small> by<b> Telkom Indonesia</b></small></p>  
          </div>
        </div>
        <form class="right-alert" action="javascript:check_website();">
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-language prefix"></i>
            <input id="web" type="url" class="validate" required>
            <label for="web" data-error="Please enter valid url." class="left-align">Website</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-communication-email prefix"></i>
            <input id="email" type="email" class="validate" required>
            <label for="email" data-error="Please enter valid email." class="left-align">Email</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-communication-phone prefix"></i>
            <input id="hp" type="text" class="validate" required> 
            <label for="hp" data-error="Please enter first name." class="left-align">Nomor Handphone</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person prefix"></i>
            <input id="nama" type="text" class="validate" required>
            <label for="nama" data-error="Please enter first name." class="left-align">Nama</label>
          </div>
        </div>
        <br/>
           <div class="col s12 m12 19" id="progress_bar" style="visibility:hidden;">
                <div class="progress">
                  <div class="indeterminate"></div>
                </div>
              </div>
        <div class="row">
           <div class="input-field col s12">
            <button class="btn btn-success waves-effect waves-light light-green darken-2 col s12" type="submit">Register</button>

          </div>
          <!--
          <div class="input-field col s6">
            <a href="dashboard.php" class="btn btn-success waves-effect waves-light col s12">Login</a>
          </div>
        -->
        </div > 
        <div align="center" style="margin-top:-15px;margin-bottom:10px;display:block;">Already have an account? Please <a href="<?php echo base_url()?>">Login</a> first.</div>
       
      </form>
    </div>

     <div id="tracking_panel" class="col s12 m12 z-depth-4 card-panel" style="display:none;">
      <p class="caption">Tracking Code for <span><a href="#"><?php echo $this->session->userdata['WEB']?> </span></a></p>
      <?php if($this->session->userdata['IS_ACTIVE']==0){ ?>
      <p><small>Please activate your e-mail. No e-mail? please <a href="javascript:kirim_ulang_aktivasi();">resend the activation.</a></small> </p>
      <?php }?>
      <div class="divider"></div>
      <p>Please embed this javascript-code in your website:</p>
  <pre class="line-numbers language-javascript">
    <code class=" language-javascript" data-language="javascript"><span class="p">&lt;</span><span class="nt">script</span> <span class="na">type</span><span class="o">=</span><span class="s">"text/javascript"</span><span class="p">&gt;</span>
        <span class="var">var</span> <span class="nx">_tar</span><span class="o">=</span> <span class="p">{</span><span class="p">}</span><span class="p">;</span><span class="nx">_tar</span><span class="p">.</span><span class="p">ID</span><span class="o">=</span><span class="s2">"<?php echo $this->session->userdata["PROV"]; ?>"</span><span class="p">;</span>
    <span class="p">&lt;/</span><span class="nt">script</span><span class="p">&gt;</span>

    <span class="p">&lt;</span><span class="nt">script</span> <span class="na">src</span><span class="o">=</span><span class="s1">'</span><span class="s"><a href="https://track.analytic.rocks/load">https://track.analytic.rocks/load/</a></span><span class="s1">'</span> <span class="na">async</span><span class="p">&gt;</span>
    <span class="p">&lt;/</span><span class="nt">script</span><span class="p">&gt;</span></code>
  </pre>
   <div class="divider"></div>
   <div >
      <br/>
      <span class="left-align"><small>Your website has been registered to: <a href="mailto:<?php echo $this->session->userdata['EMAIL'];?>"><?php echo $this->session->userdata['EMAIL'];?></a></small></span>
     <span class="right-align" style="float:right;"><small>Back to <a href="javascript:hide('tracking_panel');show('register_panel');">Registration</a> | <a href="javascript:window.location.href = '<?php echo base_url();?>login';">Login</a></small></span>
     <br/><br/>
   </div>
</div>
    </div>
  </div>  


  


    <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/materialize.min.js"></script>
  <!--prism-->
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/prism/prism.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
   <!--sweetalert -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>   

        <!-- chartist -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/jquery-validation/additional-methods.min.js"></script>
      <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/custom-script.js"></script>

        <script type="text/javascript">
      $('.btn-success').click(function(){
          //check_website();
          
        });



      // A $( document ).ready() block.
      $( document ).ready(function() {
        
          var sess_prov = '<?php if(isset($this->session->userdata["PROV"])) echo trim($this->session->userdata["PROV"]);?>';
          if(sess_prov!='')
          {
           show('tracking_panel');
           hide('register_panel');
          }
          
      });

      function hide(element)
      {
        var element=element;
        document.getElementById(element).style.display='none';
      }
      function show(element)
      {
        var element=element;
        document.getElementById(element).style.display='block';
      }

      function visible(element)
      {
        var element=element;
        document.getElementById(element).style.visibility='visible';
      }

      function invisible(element)
      {
        var element=element;
        document.getElementById(element).style.visibility='hidden';
      }

      function check_website()
     {
      var web = document.getElementById('web').value;
      var email = document.getElementById('email').value;
      var hp = document.getElementById('hp').value;
      var nama = document.getElementById('nama').value;
      //alert(web);
      visible('progress_bar');
      $.ajax({
          url : "register/add_website",
          type : "post",
          data : {'web':web, 'email':email, 'hp':hp, 'nama':nama},
          dataType : "json", 
          success : function(data) {
              if(data=='false')
              {
                //swal("Error!", "Website "+ web +" sudah terdaftar!", "error");

                swal({    title: "Warning!",
              text: web +" already registered, please see your e-mail.",   
              type: "warning",   
              showCancelButton: false,   
              confirmButtonColor: "#DD6B55",   
              confirmButtonText: "Continue",   
              closeOnConfirm: false }, 
              function(){   
              location.reload();
              });
              }
              else{
                //swal("Success!", "Website "+ web +" telah terdaftar!", "success");
                swal({    title: "Success!",
              text: web +" has been registered.",   
              type: "success",   
              showCancelButton: false,   
              confirmButtonColor: "#DD6B55",   
              confirmButtonText: "Continue",   
              closeOnConfirm: false }, 
              function(){   
              location.reload();
              });
              }
        //        alert(data);
                
          },
          complete: function()
          {
            invisible('progress_bar');
            //alert('User telah dibuat!');
          }
      })
     }

     function kirim_ulang_aktivasi()
     {

        var web = "<?php if(isset($this->session->userdata['WEB'])) echo $this->session->userdata['WEB']; else echo 'wa'; ?>";
        var email ="<?php if(isset($this->session->userdata['EMAIL_ASLI'])) echo $this->session->userdata['EMAIL_ASLI']; else echo 'wa'; ?>";
          $.ajax({
          url : "register/resend_activation",
          type : "post",
          data : {'web':web, 'email':email},
          dataType : "json", 
          success : function(data) {   
              if(data=='sukses')
              {           
                 swal({    title: "Success!",
                text: "Email aktivasi telah dikirim!",   
                type: "success",   
                showCancelButton: false,   
                confirmButtonColor: "#DD6B55",   
                confirmButtonText: "Close",   
                closeOnConfirm: true }, 
                function(){   
                //window.location.href = "<?php echo base_url();?>login";
                });
              }
             }

           });
     }
    </script>


</body>
</html>