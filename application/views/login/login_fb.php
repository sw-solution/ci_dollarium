<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login</title>
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
    <link href="<?php echo base_url(); ?>public/assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/assets/admin/pages/css/login-soft.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME STYLES -->
    <link href="<?php echo base_url(); ?>public/assets/global/css/components.css?v=<?php echo rand(0, 999); ?>" id="style_components" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/assets/global/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css" />
    <link id="style_color" href="<?php echo base_url(); ?>public/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>public/assets/css/bootstrap-social.css" rel="stylesheet" type="text/css" />

    <!-- END THEME STYLES -->
    <!-- <link rel="shortcut icon" href="favicon.ico" /> -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->

<body class="login">
    <!-- BEGIN LOGO -->
    <div class="logo">
        <a href="index.html">
            <!-- <img src="<?php echo base_url(); ?>public/assets/admin/layout/img/logo-big.png" alt="" /> -->
        </a>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
    <div class="menu-toggler sidebar-toggler">
    </div>
    <!-- END SIDEBAR TOGGLER BUTTON -->
    <!-- BEGIN LOGIN -->
    <div class="content">
        <!-- BEGIN LOGIN FORM -->
        <form class="login-form" action="<?php echo base_url(); ?>login/verify" method="post">
            <h3 class="form-title text-center">Verify your Facebook Account</h3>
            <?php
            if (isset($logout_message)) {
                echo "<div class='message' align='center' style='color:red; font-size:14px'>";
                echo $logout_message;
                echo "</div>";
            }
            ?>
            <?php
            if (isset($message_display)) {
                echo "<div class='message' align='center' style='color:green; font-size:14px'>";
                echo $message_display;
                echo "</div>";
            }
            ?>
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button>
                <span>
                    Enter any username and password. </span>
            </div>

              <div class="form-group" align=center>
                <a class="btn btn-block btn-social btn-facebook" style="width:200px;border-radius: 8px 8px !important" href='<?php echo base_url('/auth_oa2/session/facebook'); ?>'>
                    <span class="fa fa-facebook"></span><b class="text-center"> Sign in with Facebook</b>
                </a>
            </div>

        </form>
        <!-- END LOGIN FORM -->
        <!-- BEGIN PHONE LOGIN FORM -->
        <!-- END REGISTRATION FORM -->
    </div>
    <!-- END LOGIN -->
    <!-- BEGIN COPYRIGHT -->
    <!-- <div class="copyright">
        2014 &copy; Metronic - Admin Dashboard Template.
    </div> -->
    <!-- END COPYRIGHT -->
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
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/global/plugins/select2/select2.min.js"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?php echo base_url(); ?>public/assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/admin/pages/scripts/login-soft.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        jQuery(document).ready(function() {
            Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
            Login.init();
            Demo.init();
            $("#checkrole").click(function() {
                if ($(this).attr("checked")) {
                    $("#role").val(1);
                } else {
                    $("#role").val(0);
                }
            });
        });
    </script>
    <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>