 <?php if($user_role) { ?>
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
 <?php } ?>
 
<!-- Send Money Modal Start -->
<div id="send" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" style="margin: 0">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Send</h4>
            </div>
            <div class="modal-body">
                <div class="" style="height:auto !important" data-always-visible="1" data-rail-visible1="1">
                    <div class="row">
                        <div class="col-md-9">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet-body form">
                                <form class="form-horizontal" id="frm_send" method="post" role="form" action="<?php echo base_url(); ?>main/send">
                                    <input type="hidden" name="user_role" value="<?php echo $user_role; ?>">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Phone</label>
                                            <div class="col-md-9">
                                                <div class="input-inline">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-phone"></i>
                                                        </span>
                                                        <input type="text" class="form-control" id="phone" name="phone" autocomplete="off" placeholder="xxx-xxx-xxxx" pattern="^\d{3}-\d{3}-\d{4}$" required />
                                                        <input type="hidden" id="user_phone" value="<?php echo $phone;?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Amount</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-diamond"></i>
                                                    </span>
                                                    <input type="number" id="send_amount" class="form-control" placeholder="0.00" min="0" name="amount">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12" align="center">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-9">
                                                    <button type="submit" class="btn green">Send</button>
                                                    <button type="button" data-dismiss="modal" class="btn red">Close</button>
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
<!-- Send Money Modal End -->