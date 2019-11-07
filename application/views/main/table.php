<div class="row">
    <div class="col-md-2 col-sm-2"></div>
    <div class="col-md-8 col-sm-8">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box red">
            <!-- <div class="portlet-title" style="background-image: linear-gradient(120deg, #a0398f, #0641a5);"> -->
            <div class="portlet-title" style="background-color: #333333;">
                <div class="caption" id="table-caption">
                    <i class="fa fa-user"></i>Transaction History
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_2">
                    <thead style="background-image: linear-gradient(to bottom, #bbdfff , #e7f3ff, #bbdfff);">
                        <tr>
                            <th>
                                No
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                Date Time
                            </th>
                            <th>
                                Amount
                            </th>
                            <th>
                                Status
                            </th>
<!--                            <th>-->
<!--                                Action-->
<!--                            </th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < count($invoices); $i++) { ?>
                            <tr id="<?php echo $invoices[$i]->id; ?>"<?php echo $i % 2 == 1 ? "class='odd gradeX'" : ''; ?>>
                                <td>
                                    <?php echo ($i + 1); ?>
                                </td>
                                <td>
                                    <?php echo $invoices[$i]->phone; ?>
                                </td>
                                <td>
                                    <?php echo $invoices[$i]->status==2?$invoices[$i]->receive_dt:$invoices[$i]->send_dt; ?>
                                </td>
                                <td style="color:<?php echo $invoices[$i]->amount > 0 ? 'blue' : 'red' ?>">
                                    <b><?php echo number_format($invoices[$i]->amount,2); ?></b>
                                </td>
                                <td>
                                    <?php
                                        switch($invoices[$i]->status)
                                        {
                                            case 1:
                                                echo "<span class='label label-warning'>Pending</span>";
                                                break;
                                            case 2:
                                                echo "<span class='label label-success'>Success</span>";
                                                break;
                                            case 3:
                                                echo "<span class='label label-danger'>Expired</span>";
                                                break;
                                            case 4:
                                                echo "<span class='label label-info'>Refunded</span>";
                                                break;
                                            case 5:
                                                echo "<span class='label label-info'>Refunded</span>";
                                                break;
                                            default:
                                                echo "<span class='label label-warning'>Pending</span>";
                                        }
                                    ?>
                                </td>
<!--                                <td>-->
<!--                                    --><?php //if($invoices[$i]->status==1&&$invoices[$i]->amount>0){?>
<!--                                        <button type='button' class='btn btn-success confirm' style='padding-top: 4px !important;padding-bottom: 4px !important;'>Accept</button>-->
<!--                                    --><?php //}?>
<!--                                </td>-->
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>