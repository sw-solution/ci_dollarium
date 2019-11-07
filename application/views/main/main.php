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
    <!-- END PAGE LEVEL PLUGIN STYLES -->
    <!-- BEGIN PAGE STYLES -->
    <link href="<?php echo base_url(); ?>public/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE STYLES -->
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

    <div class="clearfix">
    </div>
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="clearfix">
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <!-- BEGIN PORTLET-->
                        <div class="portlet box red">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>Balance
                                </div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                    <a href="#portlet-config" data-toggle="modal" class="config">
                                    </a>
                                    <a href="javascript:;" class="reload">
                                    </a>
                                    <a href="javascript:;" class="remove">
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-12" align="center">
                                        <h4>Current Dollarium Balance</h4>
                                        <input class="knob" data-width="200" data-max="20000" data-min="0" data-displayprevious=true value="3750">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- END PORTLET-->
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <!-- BEGIN PORTLET-->
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-bar-chart font-green-sharp hide"></i>
                                    <span class="caption-subject font-green-sharp bold uppercase">Balance</span>
                                    <!-- <span class="caption-helper">weekly stats...</span> -->
                                </div>
                                <div class="actions">
                                    <!-- <div class="btn-group btn-group-devided" data-toggle="buttons">
                                        <label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
                                        <input type="radio" name="options" class="toggle" id="option1">New</label>
                                        <label class="btn btn-transparent grey-salsa btn-circle btn-sm">
                                        <input type="radio" name="options" class="toggle" id="option2">Returning</label>
                                    </div> -->
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div id="site_statistics_loading">
                                    <img src="<?php echo base_url(); ?>public/assets/admin/layout/img/loading.gif" alt="loading" />
                                </div>
                                <div id="site_statistics_content" class="display-none">
                                    <div id="site_statistics" class="chart">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PORTLET-->
                    </div>
                </div>
<!--                <div class="row">-->
<!--                    <div class="col-md-6 col-sm-6">-->
<!--                        <!-- BEGIN EXAMPLE TABLE PORTLET-->-->
<!--                        <div class="portlet box yellow">-->
<!--                            <div class="portlet-title">-->
<!--                                <div class="caption" id="table-caption">-->
<!--                                    <i class="fa fa-user"></i>Send-->
<!--                                </div>-->
<!--                                <div class="actions" id="table-tool">-->
<!--                                    <a href="#responsive" class="btn btn-default btn-sm" data-toggle="modal">-->
<!--                                        <i class="fa fa-pencil"></i> Add </a>-->
<!--                                    <div class="btn-group">-->
<!--                                        <a class="btn btn-default btn-sm" href="javascript:;" data-toggle="dropdown">-->
<!--                                            <i class="fa fa-cogs"></i> Tools <i class="fa fa-angle-down"></i>-->
<!--                                        </a>-->
<!--                                        <ul class="dropdown-menu pull-right">-->
<!--                                            <li>-->
<!--                                                <a href="javascript:;">-->
<!--                                                    <i class="fa fa-pencil"></i> Edit </a>-->
<!--                                            </li>-->
<!--                                            <li>-->
<!--                                                <a href="javascript:;">-->
<!--                                                    <i class="fa fa-trash-o"></i> Delete </a>-->
<!--                                            </li>-->
<!--                                            <li>-->
<!--                                                <a href="javascript:;">-->
<!--                                                    <i class="fa fa-ban"></i> Ban </a>-->
<!--                                            </li>-->
<!--                                            <li class="divider">-->
<!--                                            </li>-->
<!--                                            <li>-->
<!--                                                <a href="javascript:;">-->
<!--                                                    <i class="i"></i> Make admin </a>-->
<!--                                            </li>-->
<!--                                        </ul>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <!-- /.modal -->-->
<!--                            <div id="responsive" class="modal fade" tabindex="-1" aria-hidden="true">-->
<!--                                <div class="modal-dialog" style="margin: 0">-->
<!--                                    <div class="modal-content">-->
<!--                                        <div class="modal-header">-->
<!--                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>-->
<!--                                            <h4 class="modal-title">Send</h4>-->
<!--                                        </div>-->
<!--                                        <div class="modal-body">-->
<!--                                            <div class="scroller" style="height:300px" data-always-visible="1" data-rail-visible1="1">-->
<!--                                                <div class="row">-->
<!--                                                    <div class="col-md-9">-->
<!--                                                        <!-- BEGIN SAMPLE FORM PORTLET-->-->
<!--                                                        <div class="portlet-body form">-->
<!--                                                            <form class="form-horizontal" role="form">-->
<!--                                                                <div class="form-body">-->
<!--                                                                    <div class="form-group">-->
<!--                                                                        <label class="control-label col-md-3">Date & Time</label>-->
<!--                                                                        <div class="col-md-9">-->
<!--                                                                            <div class="input-group date form_meridian_datetime" data-date="2019-01-01T00:00:00Z">-->
<!--                                                                                <input type="text" size="16" class="form-control">-->
<!--                                                                                <span class="input-group-btn">-->
<!--                                                                                <button class="btn default date-reset" type="button"><i class="fa fa-times"></i></button>-->
<!--                                                                                <button class="btn default date-set" type="button"><i class="fa fa-calendar"></i></button>-->
<!--                                                                                </span>-->
<!--                                                                            </div>-->
<!--                                                                            <!-- /input-group -->-->
<!--                                                                        </div>-->
<!--                                                                    </div>        -->
<!--                                                                    <div class="form-group">-->
<!--                                                                        <label class="col-md-3 control-label">User</label>-->
<!--                                                                        <div class="col-md-9">-->
<!--                                                                            <div class="input-inline">-->
<!--                                                                                <div class="input-group">-->
<!--                                                                                    <span class="input-group-addon">-->
<!--                                                                                            <i class="fa fa-user"></i>-->
<!--                                                                                        </span>-->
<!--                                                                                    <input type="email" class="form-control" placeholder="user">-->
<!--                                                                                </div>-->
<!--                                                                            </div>-->
<!--                                                                        </div>-->
<!--                                                                    </div>-->
<!--                                                                    <div class="form-group">-->
<!--                                                                        <label class="col-md-3 control-label">Amount</label>-->
<!--                                                                        <div class="col-md-9">-->
<!--                                                                            <div class="input-group">-->
<!--                                                                                <span class="input-group-addon">-->
<!--                                                                                        <i class="fa fa-diamond"></i>-->
<!--                                                                                    </span>-->
<!--                                                                                <input type="email" class="form-control" placeholder="0">-->
<!--                                                                            </div>-->
<!--                                                                        </div>-->
<!--                                                                    </div>-->
<!--                                                                    <div class="form-group">-->
<!--                                                                        <div class="col-md-12" align="center">-->
<!--                                                                            <div class="col-md-3"></div>-->
<!--                                                                            <div class="col-md-9">-->
<!--                                                                                <button type="button" class="btn green">Send</button>-->
<!--                                                                                <button type="button" data-dismiss="modal" class="btn red">Close</button>-->
<!--                                                                            </div>-->
<!--                                                                        </div>-->
<!---->
<!--                                                                    </div>-->
<!---->
<!---->
<!--                                                                </div>-->
<!--                                                            </form>-->
<!--                                                        </div>-->
<!--                                                        <!-- END SAMPLE FORM PORTLET-->-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <!-- <div class="modal-footer">-->
<!--                                            <button type="button" data-dismiss="modal" class="btn default">Close</button>-->
<!--                                            <button type="button" class="btn green">Save changes</button>-->
<!--                                        </div> -->-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="portlet-body">-->
<!--                                <table class="table table-striped table-bordered table-hover" id="sample_2">-->
<!--                                    <thead style="background: ">-->
<!--                                        <tr>-->
<!--                                            <th>-->
<!--                                                No-->
<!--                                            </th>-->
<!--                                            <th>-->
<!--                                                Username-->
<!--                                            </th>-->
<!--                                            <th>-->
<!--                                                DateTime-->
<!--                                            </th>-->
<!--                                            <th>-->
<!--                                                amount-->
<!--                                            </th>-->
<!--                                            <th>-->
<!--                                                Status-->
<!--                                            </th>-->
<!--                                        </tr>-->
<!--                                    </thead>-->
<!--                                    <tbody>-->
<!--                                        <tr>-->
<!--                                            <td>-->
<!--                                                1-->
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                shuxer-->
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                2019-05-25 15:20:04-->
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                2000-->
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                <span class="label label-sm label-success">-->
<!--                                                        success </span>-->
<!--                                            </td>-->
<!--                                        </tr>-->
<!--                                        <tr class="odd gradeX">-->
<!--                                            <td>-->
<!--                                                2-->
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                shuxer-->
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                2019-05-25 15:20:04-->
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                1500-->
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                <span class="label label-sm label-warning">-->
<!--                                                    stand by </span>-->
<!--                                            </td>-->
<!--                                        </tr>-->
<!--                                        <tr>-->
<!--                                            <td>-->
<!--                                                3-->
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                shuxer-->
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                2019-05-25 15:20:04-->
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                1000-->
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                <span class="label label-sm label-warning">-->
<!--                                                                standby </span>-->
<!--                                            </td>-->
<!--                                        </tr>-->
<!--                                        <tr class="odd gradeX">-->
<!--                                            <td>-->
<!--                                                4-->
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                shuxer-->
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                2019-05-25 15:20:04-->
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                500-->
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                <span class="label label-sm label-warning">-->
<!--                                                            stand by </span>-->
<!--                                            </td>-->
<!--                                        </tr>-->
<!--                                        <tr>-->
<!--                                            <td>-->
<!--                                                5-->
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                shuxer-->
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                2019-05-25 15:20:04-->
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                2000-->
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                <span class="label label-sm label-success">-->
<!--                                                                    success </span>-->
<!--                                            </td>-->
<!--                                        </tr>-->
<!--                                        <tr class="odd gradeX">-->
<!--                                            <td>-->
<!--                                                6-->
<!--                                            </td>-->
<!---->
<!--                                            <td>-->
<!--                                                shuxer-->
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                2019-05-25 15:20:04-->
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                2000-->
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                <span class="label label-sm label-success">-->
<!--                                                                    success </span>-->
<!--                                            </td>-->
<!--                                        </tr>-->
<!--                                        <tr>-->
<!--                                            <td>-->
<!--                                                7-->
<!--                                            </td>-->
<!---->
<!--                                            <td>-->
<!--                                                shuxer-->
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                2019-05-25 15:20:04-->
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                800-->
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                <span class="label label-sm label-success">-->
<!--                                                                            success </span>-->
<!--                                            </td>-->
<!--                                        </tr>-->
<!--                                        <tr class="odd gradeX">-->
<!--                                            <td>-->
<!--                                                8-->
<!--                                            </td>-->
<!---->
<!--                                            <td>-->
<!--                                                shuxer-->
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                2019-05-25 15:20:04-->
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                600-->
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                <span class="label label-sm label-success">-->
<!--                                                                        success </span>-->
<!--                                            </td>-->
<!--                                        </tr>-->
<!--                                    </tbody>-->
<!--                                </table>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <!-- END EXAMPLE TABLE PORTLET-->-->
<!--                    </div>-->
<!--                    <div class="col-md-6 col-sm-6">-->
<!--                        <!-- BEGIN PORTLET-->-->
<!--                        <div class="portlet light ">-->
<!--                            <div class="portlet-title">-->
<!--                                <div class="caption">-->
<!--                                    <i class="icon-bubble font-red-sunglo"></i>-->
<!--                                    <span class="caption-subject font-red-sunglo bold uppercase">Chats</span>-->
<!--                                </div>-->
<!--                                <div class="actions">-->
<!--                                    <div class="portlet-input input-inline">-->
<!--                                        <div class="input-icon right">-->
<!--                                            <i class="icon-magnifier"></i>-->
<!--                                            <input type="text" class="form-control input-circle" placeholder="search...">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="portlet-body" id="chats">-->
<!--                                <div class="scroller" style="height: 341px;" data-always-visible="1" data-rail-visible1="1">-->
<!--                                    <ul class="chats">-->
<!--                                        <li class="in">-->
<!--                                            <img class="avatar" alt="" src="--><?php //echo base_url(); ?><!--public/assets/admin/layout/img/avatar1.jpg" />-->
<!--                                            <div class="message">-->
<!--                                                <span class="arrow">-->
<!--                                                                    </span>-->
<!--                                                <a href="javascript:;" class="name">-->
<!--                                                                    Bob Nilson </a>-->
<!--                                                <span class="datetime">-->
<!--                                                                    at 20:09 </span>-->
<!--                                                <span class="body">-->
<!--                                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>-->
<!--                                            </div>-->
<!--                                        </li>-->
<!--                                        <li class="out">-->
<!--                                            <img class="avatar" alt="" src="--><?php //echo base_url(); ?><!--public/assets/admin/layout/img/avatar2.jpg" />-->
<!--                                            <div class="message">-->
<!--                                                <span class="arrow">-->
<!--                                                                    </span>-->
<!--                                                <a href="javascript:;" class="name">-->
<!--                                                                    Lisa Wong </a>-->
<!--                                                <span class="datetime">-->
<!--                                                                    at 20:11 </span>-->
<!--                                                <span class="body">-->
<!--                                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>-->
<!--                                            </div>-->
<!--                                        </li>-->
<!--                                        <li class="in">-->
<!--                                            <img class="avatar" alt="" src="--><?php //echo base_url(); ?><!--public/assets/admin/layout/img/avatar1.jpg" />-->
<!--                                            <div class="message">-->
<!--                                                <span class="arrow">-->
<!--                                                                    </span>-->
<!--                                                <a href="javascript:;" class="name">-->
<!--                                                                    Bob Nilson </a>-->
<!--                                                <span class="datetime">-->
<!--                                                                    at 20:30 </span>-->
<!--                                                <span class="body">-->
<!--                                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>-->
<!--                                            </div>-->
<!--                                        </li>-->
<!--                                        <li class="out">-->
<!--                                            <img class="avatar" alt="" src="--><?php //echo base_url(); ?><!--public/assets/admin/layout/img/avatar3.jpg" />-->
<!--                                            <div class="message">-->
<!--                                                <span class="arrow">-->
<!--                                                                    </span>-->
<!--                                                <a href="javascript:;" class="name">-->
<!--                                                                    Richard Doe </a>-->
<!--                                                <span class="datetime">-->
<!--                                                                    at 20:33 </span>-->
<!--                                                <span class="body">-->
<!--                                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>-->
<!--                                            </div>-->
<!--                                        </li>-->
<!--                                        <li class="in">-->
<!--                                            <img class="avatar" alt="" src="--><?php //echo base_url(); ?><!--public/assets/admin/layout/img/avatar3.jpg" />-->
<!--                                            <div class="message">-->
<!--                                                <span class="arrow">-->
<!--                                                                    </span>-->
<!--                                                <a href="javascript:;" class="name">-->
<!--                                                                    Richard Doe </a>-->
<!--                                                <span class="datetime">-->
<!--                                                                    at 20:35 </span>-->
<!--                                                <span class="body">-->
<!--                                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>-->
<!--                                            </div>-->
<!--                                        </li>-->
<!--                                        <li class="out">-->
<!--                                            <img class="avatar" alt="" src="--><?php //echo base_url(); ?><!--public/assets/admin/layout/img/avatar1.jpg" />-->
<!--                                            <div class="message">-->
<!--                                                <span class="arrow">-->
<!--                                                                    </span>-->
<!--                                                <a href="javascript:;" class="name">-->
<!--                                                                    Bob Nilson </a>-->
<!--                                                <span class="datetime">-->
<!--                                                                    at 20:40 </span>-->
<!--                                                <span class="body">-->
<!--                                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>-->
<!--                                            </div>-->
<!--                                        </li>-->
<!--                                        <li class="in">-->
<!--                                            <img class="avatar" alt="" src="--><?php //echo base_url(); ?><!--public/assets/admin/layout/img/avatar3.jpg" />-->
<!--                                            <div class="message">-->
<!--                                                <span class="arrow">-->
<!--                                                                    </span>-->
<!--                                                <a href="javascript:;" class="name">-->
<!--                                                                    Richard Doe </a>-->
<!--                                                <span class="datetime">-->
<!--                                                                    at 20:40 </span>-->
<!--                                                <span class="body">-->
<!--                                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>-->
<!--                                            </div>-->
<!--                                        </li>-->
<!--                                        <li class="out">-->
<!--                                            <img class="avatar" alt="" src="--><?php //echo base_url(); ?><!--public/assets/admin/layout/img/avatar1.jpg" />-->
<!--                                            <div class="message">-->
<!--                                                <span class="arrow">-->
<!--                                                                    </span>-->
<!--                                                <a href="javascript:;" class="name">-->
<!--                                                                    Bob Nilson </a>-->
<!--                                                <span class="datetime">-->
<!--                                                                    at 20:54 </span>-->
<!--                                                <span class="body">-->
<!--                                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. sed diam nonummy nibh euismod tincidunt ut laoreet. </span>-->
<!--                                            </div>-->
<!--                                        </li>-->
<!--                                    </ul>-->
<!--                                </div>-->
<!--                                <div class="chat-form">-->
<!--                                    <div class="input-cont">-->
<!--                                        <input class="form-control" type="text" placeholder="Type a message here..." />-->
<!--                                    </div>-->
<!--                                    <div class="btn-cont">-->
<!--                                        <span class="arrow">-->
<!--                                                            </span>-->
<!--                                        <a href="" class="btn blue icn-only">-->
<!--                                            <i class="fa fa-check icon-white"></i>-->
<!--                                        </a>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <!-- END PORTLET-->-->
<!--                    </div>-->
<!--                </div>-->
                <div class="clearfix">
                </div>
            </div>
        </div>
        <!-- END CONTENT -->

    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <div class="page-footer">
        <div class="page-footer-inner">

        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- END FOOTER -->
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <!--[if lt IE 9]>
<script src="<?php echo base_url(); ?>public/assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url(); ?>public/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/global/plugins/clockface/js/clockface.js"></script>

    <!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/global/plugins/select2/select2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/plugins/jquery-knob/js/jquery.knob.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
	<!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/admin/pages/scripts/ui-extended-modals.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/admin/pages/scripts/table-managed.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/admin/pages/scripts/components-knob-dials.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/admin/pages/scripts/ui-extended-modals.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/admin/pages/scripts/components-pickers.js"></script>
	<!-- END PAGE LEVEL SCRIPTS -->
    <script>
        jQuery(document).ready(function() {
            Metronic.init(); // init metronic core componets
            Layout.init(); // init layout
            QuickSidebar.init(); // init quick sidebar
            Demo.init(); // init demo features
            Index.init();
            Index.initDashboardDaterange();
            Index.initJQVMAP(); // init index page's custom scripts
            Index.initCalendar(); // init index page's custom scripts
            Index.initCharts(); // init index page's custom scripts
            Index.initChat();
            Index.initMiniCharts();
            Tasks.initDashboardWidget();
            TableManaged.init();
            ComponentsKnobDials.init();
            ComponentsPickers.init();
            UIExtendedModals.init();
            $("#draggable").draggable({
                handle: ".modal-header"
            });
        });
    </script>
    <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>