
            <div class="col-lg-12">
                <!-- BEGIN PAGE CONTENT-->
                <div class="portlet box red">
                    <!-- <div class="portlet-title" style="background-image: linear-gradient(120deg, #a0398f, #0641a5);"> -->
                    <div class="portlet-title" style="background-color: #333333;">
                        <div class="caption" id="table-caption">
                            <i class="fa fa-users"></i>Users
                        </div>
                    </div>

                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Current Dollarium</th>
<!--                                <th>Total Sent Amount</th>-->
<!--                                <th>Total Receive Amount</th>-->
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php for ($i = 0; $i < count($users); $i++) { ?>
                                <tr  id="<?php echo $users[$i]->id; ?>" <?php echo $i % 2 == 1 ? "class='odd gradeX'" : ''; ?> >
                                    <td>
                                        <?php echo ($i + 1); ?>
                                    </td>
                                    <td>
                                        <?php echo $users[$i]->user_name; ?>
                                    </td>
                                    <td>
                                        <?php echo $users[$i]->phone; ?>
                                    </td>
                                    <td>
                                        <?php echo $users[$i]->email; ?>
                                    </td>
                                    <td style="color:blue">
                                        <b><?php echo number_format(((float)$balance[$users[$i]->id]['receiveAmount']-(float)$balance[$users[$i]->id]['sendAmount']),2); ?></b>
                                    </td>
<!--                                    <td style="color:red">-->
<!--                                        <b>--><?php //echo number_format((float)$balance[$users[$i]->id]['sendAmount'],2); ?><!--</b>-->
<!--                                    </td>-->
<!--                                    <td style="color:blue">-->
<!--                                        <b>--><?php //echo number_format((float)$balance[$users[$i]->id]['receiveAmount'],2); ?><!--</b>-->
<!--                                    </td>-->
                                    <td align="center" style="color:<?php echo $users[$i]->activated==1?'green':'red'; ?>">
                                        <?php if($users[$i]->activated){?>
                                            <span class="label label-sm label-success">Activated</span>
                                        <?php }else{?>
                                            <span class="label label-sm label-danger">Inactivated</span>
                                        <?php }?>
                                    </td>
                                    <td align="center">
                                        <div class="btn-group">
<!--                                            --><?php //if(!$users[$i]->activated){?>
<!--                                                <button type="button" class="btn btn-success user_activate">Activate</button>-->
<!--                                            --><?php //}else{?>
<!--                                                <button type="button" class="btn btn-danger user_activate">Inactivate</button>-->
<!--                                            --><?php //}?>
                                            <button type="button" class="btn btn-danger user_delete">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        