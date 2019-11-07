    <div class="col-lg-7">
                        <!-- BEGIN PORTLET-->
                        <div class="portlet light " style="border: 1px solid #6026b8;">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-bar-chart font-green-sharp hide"></i>
                                    <span class="caption-subject font-green-sharp bold uppercase">Balance</span>
                                    <!-- <span class="caption-helper">weekly stats...</span> -->
                                </div>
                                <div class="actions">
                                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                                        <label class="btn btn-transparent red-pink btn-circle btn-sm active">
                                            <input type="radio" name="duration" class="toggle" value="week" >Week
                                        </label>
                                        <label class="btn btn-transparent red-pink btn-circle btn-sm">
                                            <input type="radio" name="duration" class="toggle" value="month">Month
                                        </label>
                                        <label class="btn btn-transparent red-pink btn-circle btn-sm ">
                                            <input type="radio" name="duration" class="toggle" value="year">Year
                                        </label>
                                    </div>
                                    <div class="row margin-top-20" id="year-range">
                                        <div class="input-group input-medium col-lg-8">
                                            <!--                                                <input type="text" class="form-control" name="from">-->
                                            <select class="form-control" name="from">
                                                <?php for($i=date("Y")-4;$i<=date("Y");$i++) {?>
                                                    <option value="<?php echo $i; ?>" <?php if($i==(date("Y"))) echo "Selected";?>><?php echo $i; ?></option>
                                                <?php }?>
                                            </select>
                                            <span class="input-group-addon">
                                                to </span>
                                            <select class="form-control" name="to">
                                                <?php for($i=date("Y")-4;$i<=date("Y");$i++){ ?>
                                                <option value="<?php echo $i; ?>" <?php if($i==date("Y")) echo "Selected";?>><?php echo $i; ?></option>
                                                <?php }?>
                                            </select>
                                </div>
                            </div>
                                </div>
                            </div>
                            <div class="portlet-body table-responsive" >
                                <div id="site_statistics_loading">
                                    <img src="<?php echo base_url(); ?>public/assets/admin/layout/img/loading.gif" alt="loading" />
                                </div>
                                <div id="site_statistics_content" class="display-none">
                                    <div id="site_statistics" class="chart wrap"></div>
                                </div>
                            </div>
                            <!-- <div id="sales_statistics" class="portlet-body-morris-fit morris-chart" style="height: 260px">
							</div> -->
                        </div>
                        <!-- END PORTLET-->
                    </div>
                </div>