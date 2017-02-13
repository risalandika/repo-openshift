
    <!-- START HEADER -->
    <header id="header" class="page-topbar" style="display:none;">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="navbar-color">
                <div class="nav-wrapper">
                    <ul class="left">                      
                      <li><h1 class="logo-wrapper"><a href="index.html" class="brand-logo darken-1">Analytics</a> <span class="logo-text">Telkom Analytics</span></h1></li>
                    </ul>
                    <ul class="right hide-on-med-and-down">
                        <li>
                        <a href="javascript:void(0);" class="waves-effect waves-block waves-light translation-button"><i class="mdi-social-public" style="font-size:24px;"></i> </a>
                        </li>
                        <li >
                        <a id="a_website" href="javascript:void(0);" class="waves-effect waves-block waves-light translation-button" data-activates="websites-dropdown" style="font-size:16px !important;"><?php if(isset($this->session->userdata['ACTIVE_WEBSITE']))echo ' '.$this->session->userdata['ACTIVE_WEBSITE']; else echo ' Choose a website..';?> </a>
                           
                        </li>
                    </ul>
                    <!-- translation-button -->

                   
                </div>
            </nav>
        </div>
        <!-- end header nav-->
    </header>
    <!-- END HEADER -->
        <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">

    <script type="text/javascript">
          function change_website(website)
      {
        var txt = website;

        jQuery.ajax({
        url: '<?php echo base_url(); ?>menu/website/'+txt,
        type: 'POST',
        data: {
            txt: txt,
        },
        dataType : 'json',
        success: function(data, textStatus, xhr) {
            console.log(data); // do with data e.g success message
            location.reload();
        },
        error: function(xhr, textStatus, errorThrown) {
            console.log(textStatus.reponseText);
        }
        });
      }
    </script>