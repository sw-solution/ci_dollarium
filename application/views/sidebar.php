<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
            <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
            <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
            <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                
                <!-- <li class="sidebar-toggler-wrapper">                     -->
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<!-- <div class="sidebar-toggler"> -->
					<!-- </div> -->
					<!-- END SIDEBAR TOGGLER BUTTON -->
                <!-- </li> -->
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
                        <!-- <div align="center"> -->
                        <div class="title" align="center" style="font-size:14px; color:#ffffff">
                            <?php echo isset($profile['full_name']) ? $profile['full_name'] : "";?> 
                        </div>
                        <!-- </div>                         -->
					</a>					
				</li>                
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				<?php if($user_role){
                        echo '<li >
                                <a href="#" id="addMoney1">
                                    <i class="fa fa-diamond"></i>
                                    <span class="title">Add Dollarium</span>
                                </a>
                            </li>';
                        }    
                    ?>
<!--                <li>-->
<!--                    <a href="#" id="sendMoney1">-->
<!--                        <i class="fa fa-diamond"></i>-->
<!--					    <span class="title">Send Dollarium</span>-->
<!--					</a>					-->
<!--				</li>-->
				<li class="<?php echo $flag==1 ? 'active' : ''; ?>" id='home'>
                    <a href="<?php echo base_url(); ?>main/">
                        <i class="fa fa-home"></i>
					    <span class="title">Home
                            <!-- <span class="badge badge-default" id="receive-count" style="background: coral;visibility: hidden">
                            </span> -->
                        </span>
					</a>					
				</li>
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
				<!-- <li class="<?php echo $flag==2 ? 'active' : ''; ?>">
					<a href="<?php echo base_url(); ?>main/index/2" id="receive">
                        <i class="fa fa-plus-square"></i>
                        <span class="title">Receive
                            <span class="badge badge-default" id="receive-count" style="background: coral;visibility: hidden">
                            </span>
                        </span>
					</a>					
				</li> -->
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
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->	
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="clearfix">
                </div>
                <div class="row" style="margin:0">