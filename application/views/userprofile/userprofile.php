
            <div class="col-md-12 col-sm-12">
                <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Modal title</h4>
                            </div>
                            <div class="modal-body">
                                Widget settings form goes here
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn blue">Save changes</button>
                                <button type="button" class="btn default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                <!-- BEGIN STYLE CUSTOMIZER -->
                
                <!-- END STYLE CUSTOMIZER -->

                <!-- BEGIN PAGE CONTENT-->
                <div class="row profile" style="margin: 0">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-7">
                        <form role="form" method="post" action="<?php echo base_url(); ?>userprofile/save/" align="center" enctype="multipart/form-data" id="frm_profile">
                            <div class="form-group" align="center">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <!-- <div class="fileinput-new thumbnail" style="width: 200px; height: 150px; background: "> -->
                                    <img  class="img-circle user-img" src="
                                        <?php
                                    if(isset($profile['img_url'])){
                                        $path = base_url();
                                        $path.=$profile['img_url'];
                                        echo $path;
                                    }else{
                                        echo "https://www.placehold.it/200x150/EFEFEF/readonlyA&amp;text=no+image" ;
                                    }
                                    ?>
                                        " style="width: 180px;height: 180px;border: 2px solid #ffffff;min-width: 20px;min-height: 20px;max-width: 200px;max-width: 100%;margin-bottom:20px;" alt="" />
                                    <!-- </div> -->
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                    <div>
                                        <span class="btn default btn-file" style="background-color: #333333;color: #fff;">
                                            <span class="fileinput-new">Select image </span>
                                            <span class="fileinput-exists">Change </span>
                                            <input type="file" name="file" id="file-reader" accept=".jpg, .jpeg, .png">
                                        </span>
                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput">Remove </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin: 0;padding-top: 10px" >
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="input-icon">
                                            <i class="fa fa-font"></i>
                                            <input class="form-control placeholder-no-fix" type="text" placeholder="User Name" name="user_name" readonly value="<?php echo $profile['user_name']?>" />
                                        </div>
                                    </div>
                                    <div class="form-group" align="center">
                                        <div class="input-icon">
                                            <i class="fa fa-font"></i>
                                            <input class="form-control placeholder-no-fix" type="text" placeholder="Full Name" name="full_name" readonly value="<?php echo $profile['full_name']?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-icon">
                                            <i class="fa fa-envelope"></i>
                                            <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email" readonly value="<?php echo $profile['email']?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-icon">
                                            <i class="fa fa-lock"></i>
                                            <input class="form-control placeholder-no-fix" type="password" placeholder="Password" name="pwd" readonly value="<?php echo $profile['pwd']?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-icon">
                                            <i class="fa fa-phone"></i>
                                            <input class="form-control placeholder-no-fix" type="text" placeholder=" xxx-xxx-xxxx" name="phone" readonly value="<?php echo $profile['phone']?>" id="phone_profile" pattern="^\d{3}-\d{3}-\d{4}$" required/>
                                        </div>
                                    </div>
                                    <?php if($profile['activated']){?>
                                        <div class="form-group has-success has-feedback">
                                            <div class="input-icon">
                                                <i class="fa fa-smile-o"></i>
                                                <input class="form-control placeholder-no-fix" type="text" readonly value="Activated"/>
                                                <span class="glyphicon glyphicon-ok form-control-feedback" style="margin-top: 10px"></span>
                                            </div>
                                        </div>
                                    <?php }else{?>
                                        <div class="form-group has-warning has-feedback">
                                            <div class="input-icon">
                                                <i class="fa fa-frown-o"></i>
                                                <input class="form-control placeholder-no-fix" type="text" readonly value="Inactivated"/>
                                                <span class="glyphicon glyphicon-warning-sign form-control-feedback" style="margin-top: 10px"></span>
                                            </div>
                                        </div>
                                    <?php }?>
                                    <div style="margin-top: 30px;margin-bottom: 30px;" align="center">
                                        <button type="submit" name="submit" class="btn btn-primary btn-grey" style="margin-bottom: 20px" >Save Changes </button>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
            </div>
        </div>
        