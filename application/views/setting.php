
            <div class="col-lg-12">
                <!-- BEGIN PAGE CONTENT-->
                <div class="row setting" style="margin: 0">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-7">
                        <div class="portlet box red">
                            <div class="portlet-title" style="background-color: #333333;">
                                <div class="caption">
                                    <i class="fa fa-gears"></i>Setting
                                </div>
                            </div>
                            <div class="portlet-body">
                                <form role="form" id="settingForm" method="post" enctype="multipart/form-data">
                                    <div class="row" style="margin: 0;padding-top: 10px" >
                                        <div class="col-lg-3"></div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for='limit_time'>Minimum Share : </label>
                                                <div class="input-group mb-3">
                                                    <div class="input-icon">
                                                        <i class="fa fa-diamond"></i>
                                                        <input class="form-control placeholder-no-fix" type="number" name="minimum_share" required value="<?php echo($setting['minimum_share']); ?>" />
                                                    </div>
                                                    <div class='input-group-addon'>
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for='limit_time'>Penalty : </label>
                                                <div class="input-group mb-3">
                                                    <div class="input-icon">
                                                        <i class="fa fa-diamond"></i>
                                                        <input class="form-control placeholder-no-fix" type="number" name="penalty" required value="<?php echo($setting['penalty']); ?>"/>
                                                    </div>
                                                    <div class='input-group-addon'>
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for='limit_time'>Limit Time : </label>
                                                <div class="input-group">
                                                    <div class="input-icon">
                                                        <i class="fa fa-history"></i>
                                                        <input class="form-control placeholder-no-fix" type="number" name="limit_time" required value="<?php echo($setting['limit_time']); ?>"/>
                                                    </div>
                                                    <div class='input-group-addon'>
                                                        <span class="input-group-text">hr</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style=" margin-top: 30px;margin-bottom: 30px" align="center">
                                                <button type="submit" name="saveSetting" id="saveSetting" class="btn btn-primary btn-grey mb-2">
                                                    Save Changes
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
            </div>
        </div>
        