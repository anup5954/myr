<div class="card">

    <div class="card-header">

        <h3 class="card-title">My Services</h3>

    </div>

    <div class="card-body">

        <div class="col-lg-12">

            <table id="table_id" class="table table-responsive-sec">

                <thead>

                    <tr>

                        <th>#Order No</th>

                        <th>Services Name</th>

                        <th>Pay Amount</th>

                        <th>Payment Status</th>

                        <th>Services Status</th>

                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>

                    <?php foreach ($my_services as $order) {

                        $service = $this->mdl->fetch_row_where('services', ['id' => $order->service_id]);

                    ?>



                        <tr>

                            <td data-label="Order No"><?php echo $order->id ?></td>

                            <td data-label="Service Name"><?php echo $service->name ?></td>

                            <td data-label="Pay Amount"><?php echo $order->service_price_with_tax ?> Rs</td>

                            <td data-label="Payment status"><?php echo $order->customer_payment_status ?></td>

                            <td data-label="Service Status"><?php echo $order->service_status ?></td>

                            <td>

                                <a class="btn btn-warning btn-sm" href="<?= base_url('customer/upload_documents_and_details/' . $order->id) ?>">Upload Documents & Details</a>

                                <?php

                                if ($order->customer_payment_status == 'pending') { ?>

                                    <!--<a class="btn btn-success btn-sm" target="_blank" href="#">Pay Now</a> -->

                                <?php } else { ?>

                                    <a class="btn btn-info btn-sm" target="_blank" href="<?= base_url('customer/invoice/' . $order->id) ?>">View Invoice</a>

                                <?php } ?>

                                <?php

                                if ($order->service_status == 'completed') { ?>

                                    <!-- <a class="btn btn-success btn-sm" target="_blank" href="#">Download Certificate</a> -->

                                    <a class="btn btn-primary btn-sm" href="<?= base_url('customer/view_final_file/' . $order->id . '/' . $order->service_id) ?>">View Completed Document</a>

                                <?php } ?>



                                <!--

if payment failed then show make payment or paid then show paid invoice

if service status completed then show download certificates other vice show work pending

-->

                            </td>

                        </tr>

                    <?php  } ?>

                </tbody>

            </table>



        </div>

    </div>



</div>

<!-- Start Listing Post -->

<script>
    $(document).ready(function() {
        $('#table_id').dataTable({
            "order": [
                [0, 'desc']
            ]
        });
    });
</script>