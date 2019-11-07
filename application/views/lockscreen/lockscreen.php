<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Lock Screen</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?php echo base_url(); ?>public/assets/admin/pages/css/lock2.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="<?php echo base_url(); ?>public/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/assets/global/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="<?php echo base_url(); ?>public/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css" />
    <!-- END THEME STYLES -->
    <!-- <link rel="shortcut icon" href="favicon.ico" /> -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->

<body>
    <div class="page-lock">
        <div class="page-logo">
            <a class="brand" href="index.html">
                <!-- <img src="<?php echo base_url(); ?>public/assets/admin/layout/img/logo-big.png" alt="logo" /> -->
            </a>
        </div>
        <div class="page-body">
            <img class="page-lock-img" src="<?php echo base_url(); ?>public/assets/admin/pages/media/profile/profile.jpg" alt="">
            <div class="page-lock-info">
                <h1><?php echo $full_name ?></h1>
                <span class="email">
			<?php echo $email ?>  </span>
                <span class="locked">
			Locked </span>
                <form class="form-inline" action="<?php echo base_url(); ?>lockscreen/verify" method="post">
                    <div class="input-group input-medium">
                        <input type="text" class="form-control" placeholder="Password">
                        <span class="input-group-btn">
					<button type="submit" class="btn blue icn-only"><i class="m-icon-swapright m-icon-white"></i></button>
					</span>
                    </div>
                    <!-- /input-group -->
                    <div class="relogin">
                        <a href="<?php echo base_url(); ?>login/">
					Not <?php echo $full_name ?> ? </a>
                    </div>
                </form>
            </div>
        </div>
        <!-- <div class="page-footer-custom">
            2014 &copy; Metronic. Admin Dashboard Template.
        </div> -->
    </div>
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <!--[if lt IE 9]>
<script src="<?php echo base_url(); ?>public/assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="<?php echo base_url(); ?>public/assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/admin/pages/scripts/lock.js"></script>
    <script>
        $(document).ready(function() {
            Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
            Lock.init();
            Demo.init();
        });
    </script>
    <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>