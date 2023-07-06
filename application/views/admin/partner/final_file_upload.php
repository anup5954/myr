<?php
$order = $this->mdl->fetch_by_id($this->uri->segment(3), 'orders');
//$service = $this->mdl->fetch_by_id($order->service_id, 'services');
//print_r($service->services_required_documents);
?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Add Documents To Order : #<?= $order->id ?> </h3>
        <div class="card-options">
            <a href="<?= base_url('partner/order_received') ?>" class="btn btn-danger btn-sm"><i class="fa fa-undo" aria-hidden="true"></i> Back</a>
        </div>
    </div>
    <?php
    $upload_by_consultant_id = unserialize($upload_by_consultant->files_upload_by_consultant);
    //print_r($upload_by_consultant_id);
    if (!empty($upload_by_consultant_id)) {

    ?>
        <div class="card-body">
            <div class="col-md-12 col-xl-12">
                <?php echo form_open_multipart('partner/insert_final_doc') ?>
                <div class="form-group row">
                    <?php
                    for ($i = 0; $i < count($upload_by_consultant_id); $i++) {
                        $upload_by_consultant_file = $this->mdl->fetch_by_id($upload_by_consultant_id[$i], 'services_upload_by_consultant_document');
                    ?>
                        <div class="form-group">
                            <label class="form-label"><?= !empty($upload_by_consultant_file->name) ? $upload_by_consultant_file->name : '';  ?></label>

                            <input type="file" name="finalDoc_<?php echo $upload_by_consultant_file->id ?>" id="" class="form-control" accept="application/pdf">
                            <?php if (!empty($final_file) && !empty($final_file[$upload_by_consultant_file->id])) { ?>
                                <a target="_blank" href="<?php echo base_url('assets/uploads/finalDoc/' . $final_file[$upload_by_consultant_file->id]['doc_name']); ?>">View Uploaded File</a>

                                <input type="hidden" name="hidden_finalDoc_<?php echo $upload_by_consultant_file->id ?>" value="<?php echo $final_file[$upload_by_consultant_file->id]['doc_name']; ?>">

                                <input type="hidden" name="hidden_doc_idd_<?php echo $upload_by_consultant_file->id ?>" value="<?php echo $final_file[$upload_by_consultant_file->id]['doc_idd']; ?>">

                            <?php } ?>
                        </div>

                        <input type="hidden" name="upload_by_consultant_id[]" value="<?php echo $upload_by_consultant_file->id; ?>">

                        <hr>

                    <?php } ?>

                </div>
                <input type="hidden" name="order_idd" value="<?php echo $this->uri->segment(3) ?>">
                <button type="submit" class="btn btn-primary">Save</button>
                <?php echo form_close(); ?>

            </div>

        </div>
    <?php } ?>
</div>