<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="utf-8" />
    <title>Main</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/global/plugins/clockface/css/clockface.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
     <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"/>
    <link href="<?php echo base_url(); ?>public/assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/global/plugins/bootstrap-select/bootstrap-select.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/global/plugins/select2/select2.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/global/plugins/jquery-multi-select/css/multi-select.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/css/main.css" />
    <link href="<?php echo base_url(); ?>public/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/assets/admin/pages/css/profile-old.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css">
    <!-- END PAGE LEVEL PLUGIN STYLES -->
    <!-- BEGIN PAGE STYLES -->
    <link href="<?php echo base_url(); ?>public/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="<?php echo base_url(); ?>public/assets/global/css/components.css?v=<?php echo rand(0,999999); ?>" id="style_components" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/assets/global/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/assets/admin/layout/css/layout.css?v=<?php echo rand(0,999999); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/assets/admin/layout/css/themes/grey.css?v=<?php echo rand(0,999999); ?>" rel="stylesheet" type="text/css" id="style_color" />
    <link href="<?php echo base_url(); ?>public/assets/admin/layout/css/custom.css?v=<?php echo rand(0,999999); ?>" rel="stylesheet" type="text/css" />
    <!-- END THEME STYLES -->
     <link rel="shortcut icon" href="favicon.ico" />

    <style>
        thead {
        background: #e8e8e8;
    }
    td{
        vertical-align: middle !important;
        font-size: 14px;
    }

/* The sidebar menu */
.sidebar {
    height: 100%; /* 100% Full-height */
    width: 0; /* 0 width - change this with JavaScript */
    position: fixed; /* Stay in place */
    z-index: 1; /* Stay on top */
    top: 0;
    left: 0;
    /* background-color: #4276A4;  Black*/
    background-color: #333333; /* Black*/
    overflow-x: hidden; /* Disable horizontal scroll */
    padding-top: 60px; /* Place content 60px from the top */
    transition: 0.1s; /* 0.5 second transition effect to slide in the sidebar */
}

.circleBase {
    border-radius: 50%;
    behavior: url(PIE.htc); /* remove if you don't care about IE8 */
}

.type1 {
    width: 100px;
    height: 100px;
    background: yellow;
    border: 3px solid red;
}
.type2 {
    width: 50px;
    height: 50px;
    background: #ccc;
    border: 3px solid #000;
}
.type3 {
    width: 500px;
    height: 500px;
    background: aqua;
    border: 30px solid blue;
}

.circleDiv {
  width: 300px;
  height: 200px;
  border-radius: 50%;
  font-size: 40px;
  color: blue;
  line-height: 200px;
  text-align: center;
  background: #fff
}

/* The sidebar links */
.sidebar a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #C9DFF5;
    display: block;
    transition: 0.3s;
}

/* When you mouse over the navigation links, change their color */
.sidebar a:hover {
    color: #f1f1f1;
}

/* Position and style the close button (top right corner) */
.sidebar .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

/* The button used to open the sidebar */
.openbtn {
    font-size: 20px;
    cursor: pointer;
    background-color: #4276A4;
    color: white;
    padding: 10px 15px;
    border: none;
}

.openbtn:hover {
    background-color: #444;
}

/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
#main {
    transition: margin-left .5s; /* If you want a transition effect */
    padding: 20px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
    .sidebar {padding-top: 15px;}
    .sidebar a {font-size: 18px;}
    .modal.fade.in{left:0;}
}
    </style>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->

<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo page-container-bg-solid">
<!-- BEGIN HEADER -->
<div class="page-header -i navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
        <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
		<!-- BEGIN LOGO -->
		<!-- <div class="page-logo">
			<a href="index.html">
			<img src="<?php echo base_url(); ?>public/assets/admin/layout/img/logo.png" alt="logo" class="logo-default"/>
			</a>
			<div class="menu-toggler sidebar-toggler hide">
			</div>
		</div> -->
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler">
        </a>
       <div id="mySidebar" class="sidebar page-sidebar" style="margin: 0 !important; width:0">
           <a href="javascript:void(0)" class="closebtn">&times;</a>
           <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                
                <!--<li class="sidebar-toggler-wrapper">                    -->
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<!--<div class="sidebar-toggler">-->
					<!--</div>-->
					<!-- END SIDEBAR TOGGLER BUTTON -->
                <!--</li>-->
                <li class="dropdown dropdown-user" align="center">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
                        
                        <div align="center" width="100%">
                            <img alt="" style = "width: 180px;height: 180px;border: 2px solid #ffffff;min-width: 20px;min-height: 20px;max-width: 200px;max-width: 100%;"class="img-circle user-img" src="<?php 
                                                        if(isset($profile['img_url'])){
                                                            $path = base_url();
                                                            $path.=$profile['img_url'];
                                                            echo $path;
                                                        }else{
                                                            echo "https://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" ;   
                                                        }
                                                    ?>">
                        </div>
                        <div class="title" align="center" style="font-size:14px; color:#ffffff">
                            <?php echo isset($profile['full_name']) ? $profile['full_name'] : "";?>
                        </div>
					</a>
				</li>                
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				<?php if($user_role){
                        echo '<li >
                                <a href="#" id="addMoney2">
                                    <i class="fa fa-diamond"></i>
                                    <span class="title">Add Dollarium</span>
                                </a>
                            </li>';
                        }    
                    ?>
				<li class="<?php echo $flag==1 ? 'active' : ''; ?>">
                    <a href="<?php echo base_url(); ?>main/">
                        <i class="fa fa-home"></i>
					    <span class="title">Home
                            <!-- <span class="badge badge-default" id="receive-count" style="background: coral;visibility: hidden">
                            </span> -->
                        </span>
					</a>					
				</li>
				<!-- <li class="<?php echo $flag==2 ? 'active' : ''; ?>">
					<a href="<?php echo base_url(); ?>main/index/2" id="receive">
                        <i class="fa fa-plus-square"></i>
                        <span class="title">Receive
                            <span class="badge badge-default" id="receive-count" style="background: coral;visibility: hidden">
                            </span>
                        </span>
					</a>					
				</li> -->
                <?php if($user_role){ ?>
                    <li class="<?php echo $flag==4 ? 'active' : ''; ?>">
                        <a href="<?php echo base_url(); ?>totalHistory/">
                            <i class="fa fa-history"></i>
                            <span class="title">Total Transaction History</span>
                        </a>					
                    </li>
                    <li class="<?php echo $flag==5 ? 'active' : ''; ?>">
                        <a href="<?php echo base_url(); ?>ManageUsers/">
                            <i class="fa fa-users"></i>
                            <span class="title">Manage Users</span>
                        </a>					
                    </li>
                <?php } ?>
				<li class="<?php echo $flag==3 ? 'active' : ''; ?>" id="user_menu">
					<a href="<?php echo base_url(); ?>userprofile">
					<i class="icon-user"></i>
					<span class="title">User Profile</span>
					</a>
				</li>
                <?php if($user_role){?>
                    <li class="<?php echo $flag==6 ? 'active' : ''; ?>">
                        <a href="<?php echo base_url(); ?>setting/">
                            <i class="fa fa-gears"></i>
                            <span class="title">Setting</span>
                        </a>					
                    </li>
                <?php } ?>
				<li class="side_menu" id="logout_menu">
					<a href="<?php echo base_url(); ?>login/logout">
                        <i class="icon-logout"></i>
                        <span class="title">Log out</span>
					</a>					
				</li>				
			</ul>
       </div>
		<!-- END RESPONSIVE MENU TOGGLER -->
		
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
    <!-- BEGIN CONTAINER -->
    <!-- <div class="page-container" style="background-image: linear-gradient(130deg, #0641a5,#077b7a);"> -->
    <div class="page-container" style="">
