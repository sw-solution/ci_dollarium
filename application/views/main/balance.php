<div class="row">
    <!-- style="margin: 0" -->
    <div class="col-lg-2 col-lg-2">

    </div>

    <div class="col-lg-8 col-lg-8">
        <!-- BEGIN PORTLET-->
        <div class="portlet box red">
            <!-- <div class="portlet-title" style="background-image: linear-gradient(120deg, #a0398f, #0641a5);"> -->
            <div class="portlet-title" style="background-color: #333333;">
                <div class="caption">
                    <i class="fa fa-gift"></i>Balance
                </div>
            </div>
            <div class="portlet-body">
                <div class="row margin-top-20">
                    <div class="col-lg-12" id="balance_container" align="center">
                        <h4 style="color:#333333"><b>Current Dollarium Balance</b></h4>
                        <!-- <input class="knob" data-width="200" id="balance" data-max="10000000000000000000" data-min="0" data-bgcolor="#e1d4f4" data-fgColor="#333333" data-displayprevious=false data-step=".1" step=".01" value="<?php //echo sprintf('%0.2f', $balance); 
                                                                                                                                                                                                                                        ?>"> -->
                        <div class="circleDiv" id="balance">
                            <?php echo number_format($balance,2); ?>
                        </div>
                        <div class="actions" id="table-tool">
                            <a href="#send" class="btn btn-default btn-sm" data-toggle="modal" style="display:<?php echo $flag ? 'block' : 'none' ?> ; border:none">
                                <img src="<?php echo base_url(); ?>public/assets/image/send_button.png" style="width:100px">
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- END PORTLET-->
        <!-- Begin StoreModal-->
        <div id="store" class="modal fade" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" style="margin: 0">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Add Dollarium</h4>
                    </div>
                    <div class="modal-body">
                        <div class="" style="height:auto !important" data-always-visible="1" data-rail-visible1="1">
                            <div class="row">
                                <div class="col-md-9">
                                    <!-- BEGIN SAMPLE FORM PORTLET-->
                                    <div class="portlet-body form">
                                        <form class="form-horizontal" method="post" role="form" action="<?php echo base_url(); ?>main/storeMoney">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Amount</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-diamond"></i>
                                                            </span>
                                                            <input type="number" class="form-control" placeholder="0.00" min="0" name="amount">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12" align="center">
                                                        <div class="col-md-3"></div>
                                                        <div class="col-md-9">
                                                            <button type="submit" class="btn green margin-top-20"> Store </button>
                                                            <button type="button" data-dismiss="modal" class="btn red margin-top-20"> Close </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END SAMPLE FORM PORTLET-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End StoreModal-->
    </div>
</div>