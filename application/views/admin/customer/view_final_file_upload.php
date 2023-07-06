<?php
$order = $this->mdl->fetch_by_id($this->uri->segment(3), 'orders');
//$service = $this->mdl->fetch_by_id($order->service_id, 'services');
//print_r($service->services_required_documents);
?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">View Documents For Order : #<?= $order->id ?> </h3>
        <div class="card-options">
            <a href="<?= base_url('customer/my_services') ?>" class="btn btn-danger btn-sm"><i class="fa fa-undo" aria-hidden="true"></i> Back</a>
        </div>
    </div>
    <?php
    $upload_by_consultant_id = unserialize($upload_by_consultant->files_upload_by_consultant);
    if (!empty($upload_by_consultant_id)) {

    ?>
        <div class="card-body">
            <div class="col-md-12 col-xl-12">

                <div class="form-group row">
                    <?php
                    for ($i = 0; $i < count($upload_by_consultant_id); $i++) {
                        $upload_by_consultant_file = $this->mdl->fetch_by_id($upload_by_consultant_id[$i], 'services_upload_by_consultant_document');
                    ?>
                        <div class="form-group">
                            <label class="form-label"><?= !empty($upload_by_consultant_file->name) ? $upload_by_consultant_file->name : '';  ?></label>


                            <?php if (!empty($final_file) && !empty($final_file[$upload_by_consultant_file->id])) { ?>
                                <a target="_blank" href="<?php echo base_url('assets/uploads/finalDoc/' . $final_file[$upload_by_consultant_file->id]['doc_name']); ?>">View Uploaded File</a>



                            <?php } ?>
                        </div>



                        <hr>

                    <?php } ?>

                </div>




            </div>

        </div>
    <?php } ?>
</div>