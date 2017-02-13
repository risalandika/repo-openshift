<aside id="left-sidebar-nav">
    <ul id="slide-out" class="side-nav fixed leftside-navigation" >
        <li class="red darken-2">
        <a id="a_website" style="color:white;" href="javascript:void(0);" class="waves-effect waves-block waves-light translation-button" data-activates="websites-dropdown" style="font-size:16px !important;"><?php if(isset($this->session->userdata['ACTIVE_WEBSITE']))echo ' '.$this->session->userdata['ACTIVE_WEBSITE']; else echo ' Choose a website..';?> </a>

        </li>
    <li class="user-details cyan darken-2">
    <div class="row">
        <div class="col col s4 m4 l4">
            <img src="<?php echo base_url(); ?>assets/images/login-logo-white.png" alt="" class="circle responsive-img valign profile-image">
        </div>
        <div class="col col s8 m8 l12">
            <ul id="profile-dropdown" class="dropdown-content">

                <li><a href="<?php echo base_url('login/logout') ?>"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                </li>
            </ul>
            <a style="font-size:1.2rem;" class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $this->session->userdata['username'];?><i class="mdi-navigation-arrow-drop-down right"></i></a>
            <p class="user-roal">Administrator</p>
                    <ul class=" hide-on-med-and-down" style="white-text">
                        
                    </ul>
        </div>
    </div>
    </li>
    <li class="no-padding" id="list_menu">
        <ul class="collapsible collapsible-accordion">
            <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                       <li class="<?php $class='bold'; if(isset($this->session->userdata['state_root']) && $this->session->userdata['state_root'] === 'home') echo $class. " active"; else echo $class; ?>">
                        <a href="<?php echo base_url()?>dashboard/page/home_account" ><i class="mdi-action-home"></i> Home</a>
                        <li class="li-hover"><p class="ultra-small margin more-text">Reporting</p></li>
                        <li class="li-hover"><div class="divider"></div></li>
                        <li class="bold"><a href="javascript:void(0)" class="<?php $class='collapsible-header waves-effect waves-cyan'; if(isset($this->session->userdata['state_root']) && $this->session->userdata['state_root'] == 'audience') echo $class. " active"; else echo $class; ?>"><i class="mdi-social-person"></i> Audience</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li class="<?php if($this->session->userdata['state_leaf']=='audience_overview') echo "active"; ?>"><a href="<?php echo base_url()?>dashboard/page/audience_overview">Overview</a>
                                    </li>
                                    <li class="<?php if($this->session->userdata['state_leaf']=='audience_active_users') echo "active"; ?>"><a href="<?php echo base_url()?>dashboard/page/audience_active_users">Active Users</a>
                                    </li>
                                   <li class="<?php if($this->session->userdata['state_leaf']=='audience_user_explorer') echo "active"; ?>"><a href="<?php echo base_url()?>dashboard/page/audience_user_explorer">User Explorer</a>
                                     </li>
                                    <!--<li><a href="#">Behaviour</a>
                                    </li>
                                    <li><a href="#">Technology</a>
                                    </li>
                                    <li><a href="#">Mobile</a>
                                    </li>
                                -->
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
           <!--
            <li class="bold"><a href="?page=users_overview" class=" waves-effect waves-cyan active"> Users Overview</a></li>
            -->
        </ul>
    </li>
   
    </ul>
    <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i>
    </a>
</aside>

<script type="text/javascript">
    
    function change_menu(menu)
    {
        window.location="?page="+menu;

                        //window.location.reload();
        //alert('wa');
        //$('#list_menu').html('asucok');

    }

</script>