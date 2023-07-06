<div class="card">

    <div class="card-header">

        <h3 class="card-title">New Orders</h3>

    </div>

    <div class="card-body">

        <div class="col-lg-12">

            <table id="table_id" class="table">

                <thead>

                    <tr>
                        <th>#Order Id</th>
                        <th>Service Name</th>
                        <th>Customer Name</th>
                        <th>Offer Price</th>
                        <!-- <th>Payment Status</th> -->
                        <th>Order Date</th>
                        <th>Order Status</th>
                        <th>Action</th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                    $orders = $this->mdl->fetch_all_where('orders', ['partner_id' => $this->session->userdata('user_id'), 'service_status!=' => 'completed']);
                    foreach ($orders as $order) { //print_r($order);
                    ?>
                        <tr>
                            <td><?= $order->id ?></td>
                            <td><?= $this->mdl->fetch_by_id($order->service_id, 'services')->name ?></td>
                            <td><?= $order->customer_firstname . ' ' . $order->customer_lastname ?></td>
                            <td><?= $order->partner_offer_price ?> Rs</td>
                            <!-- <td><?= $order->customer_payment_status ?></td> -->
                            <td><?= date('d-M-Y',strtotime($order->order_date)); ?></td>
                            <td><?= $order->service_status ?></td>
                            <td>
                                <?php
                                if ($order->is_partner_accepted == 0) {
                                ?>
                                    <a class="btn btn-success btn-sm" href="<?= base_url('partner/order_received/' . $order->id) ?>">Accept Service</a>
                                    <a class="btn btn-danger btn-sm" href="<?= base_url('partner/order_reject/' . $order->id) ?>">Reject</a>
                                <?php } else if ($order->is_partner_accepted == 2) { ?>
                                    <a class="btn btn-success btn-sm" href="<?= base_url('partner/order_received/' . $order->id) ?>">Accept Service</a>
                                <?php } else if ($order->is_partner_accepted == 1) { ?>
                                    <a class="btn btn-info btn-sm" href="<?= base_url('partner/order_detail/' . $order->id) ?>">Detail</a>
                                    <a class="btn btn-primary btn-sm" href="<?= base_url('partner/upload_final_file/' . $order->id . '/' . $order->service_id) ?>">Final Files Upload</a>
                                    <?php if ($order->service_status == 'pending') { ?>
                                        <a class="btn btn-success btn-sm" onclick="return confirm('Are you sure want to complete?')" href="<?= base_url('partner/make_completed/' . $order->id) ?>">Make Completed</a>
                                    <?php } else { ?>
                                        <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to pending?')" href="<?= base_url('partner/make_pending/' . $order->id) ?>">Make Pending</a>
                                    <?php } ?>
                                    <!--
<a class="btn btn-info btn-sm" href="<?= base_url('partner/payment_receipt/' . $order->id) ?>">Payment Receipt</a>
-->
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>

        </div>

    </div>

</div>
<!-- Start Listing Post -->
<script>
    $(document).ready(function() {
        $('#table_id').DataTable({
            order: [
                [0, 'desc']
            ],
        });
    });
</script>