<div class="card">

    <div class="card-header">

        <h3 class="card-title"><?php if ($this->uri->segment(2) == 'create') {
                                    echo "New";
                                } else {
                                    echo "Edit";
                                } ?> Service</h3>

        <div class="card-options">

            <a href="<?= base_url('services') ?>" class="btn btn-danger btn-sm"><i class="fa fa-undo" aria-hidden="true"></i> Back</a>

        </div>

    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-lg-12">

                <?php
                if ($this->uri->segment(2) == 'edit') {
                    echo form_open_multipart('services/update/' . $this->uri->segment(3));
                } else {
                    echo form_open_multipart('services/insert');
                }
                ?>

                <div class="form-row">

                    <?php if ($service->image != '') { ?>
                        <div class="form-group col-lg-12">
                            <a class="text-danger clearfix" href="<?= base_url('services/img_delete/' . $this->uri->segment(3)) ?>">Remove image</a>
                            <?php echo (img(['src' => 'assets/uploads/' . $service->image, 'width' => '200px', 'class' => 'pull-left'])) ?>
                        </div>
                    <?php } ?>

                    <div class="form-group col-lg-12">
                        <label style="display:block">Upload Photo</label>
                        <input type="file" name="image">

                        <div class="checkbox">
                            <br>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="show_in_home" value="1" <?php if ($service->show_in_home == 1) {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>
                                <span class="custom-control-label">Service Show in home page</span>
                            </label>
                        </div>

                        <div class="checkbox">
                            <br>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="show_in_footer" value="1" <?php if ($service->show_in_footer == 1) {
                                                                                                                        echo "checked";
                                                                                                                    } ?>>
                                <span class="custom-control-label">Service Show in Footer</span>
                            </label>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-5 col-sm-5">
                        <label class="form-label">Popular Services</label>
                        <div class="input-group">

                            <select name="is_popular" class="form-control" id="is_popular">
                                <option value="yes" <?php if ($service->is_popular == 'yes') {
                                                        echo "selected";
                                                    } ?>>yes</option>
                                <option value="no" <?php if ($service->is_popular == 'no') {
                                                        echo "selected";
                                                    } ?>>no</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-lg-8 col-md-8 col-sm-8">
                        <label class="form-label">Your youtube URL</label>
                        <div class="input-group">
                            <span class="input-group-prepend" id="basic-addon3">
                                <span class="input-group-text">https://www.youtube.com/watch?v=</span>
                            </span>
                            <input type="text" class="form-control" name="video" value="<?php echo $service->video ?>">
                        </div>
                    </div>

                    <div class="form-group col-lg-4 col-md-4 col-sm-4">
                        <div class="form-group">
                            <div class="form-label">Video And Image Show Direction</div>
                            <div class="custom-controls-stacked">
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" name="video_show_direction" value="left" <?php if ($service->video_show_direction == 'left') {
                                                                                                                                    echo "checked";
                                                                                                                                } ?>>
                                    <span class="custom-control-label"> Video Show Left</span>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" name="video_show_direction" value="right" <?php if ($service->video_show_direction == 'right') {
                                                                                                                                    echo "checked";
                                                                                                                                } ?>>
                                    <span class="custom-control-label">Image Show Left</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-lg-4 col-md-4 col-sm-4">
                        <label>Name:</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $service->name ?>" required>
                    </div>

                    <div class="form-group col-lg-1 col-md-1 col-sm-1">
                        <label>Price:(Rs.)</label>
                        <input type="text" class="form-control" name="price" value="<?php echo $service->price ?>" required>
                    </div>

                    <div class="form-group col-lg-1 col-md-1 col-sm-1">
                        <label>CGST</label>
                        <input type="number" class="form-control" name="CGST" value="<?php echo $service->CGST ?>" required>
                    </div>

                    <div class="form-group col-lg-1 col-md-1 col-sm-1">
                        <label>SGST</label>
                        <input type="number" class="form-control" name="SGST" value="<?php echo $service->SGST ?>" required>
                    </div>

                    <div class="form-group col-lg-1 col-md-1 col-sm-1">
                        <label>IGST</label>
                        <input type="number" class="form-control" name="IGST" value="<?php echo $service->IGST ?>" required>
                    </div>

                    <div class="form-group col-md-2">
                        <label>Group:</label>
                        <select name="group_id" class="form-control" id="select_group" required="">
                            <option value="">Select</option>
                            <?php foreach ($this->mdl->fetch_all_active() as $gp) { ?>
                                <option value="<?= $gp->id ?>" <?= ($gp->id == $service->group_id) ? 'selected' : '' ?>><?= $gp->name ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group col-md-2">
                        <label>Group Type:</label>
                        <select name="group_type_id" class="form-control" id="select_group_type">
                            <option value="">Select</option>
                        </select>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label>Service Short Description:</label>
                        <textarea name="service_short_desc" id="service_short_desc"> <?php echo $service->service_short_desc ?> </textarea>
                        <script>
                            CKEDITOR.replace('service_short_desc');
                        </script>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label>Bellow Banner Heading:</label>
                        <input type="text" class="form-control" name="bellow_banner_heading" value="<?php echo $service->bellow_banner_heading ?>">
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label>Bellow Banner Content:</label>
                        <textarea name="bellow_banner_content" id="bellow_banner_content"> <?php echo $service->bellow_banner_content ?> </textarea>
                        <script>
                            CKEDITOR.replace('bellow_banner_content');
                        </script>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label>Service Content:</label>
                        <textarea name="service_content" id="service_content"> <?php echo $service->service_content ?> </textarea>
                        <script>
                            CKEDITOR.replace('service_content');
                        </script>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h4 style="margin-top: 20px;padding: 0px;text-align: center;"> Service Compare Terms </h4>
                        <hr style="margin-top: 20px;margin-bottom: 25px;border: 1px solid rgba(0, 40, 100, 0.12);">
                        <?php
                        $i = 0;
                        foreach ($service_compare_points as $service_compare_point) {
                        ?>
                            <label> <?= $service_compare_point->name ?>:</label>
                            <input type="text" class="form-control" name="services_compare_points[]" value="<?php
                                                                                                            if (isset((unserialize($service->services_compare_points)[$i]))) {
                                                                                                                echo (unserialize($service->services_compare_points)[$i]);
                                                                                                            } else {
                                                                                                                echo "";
                                                                                                            }
                                                                                                            ?>">
                        <?php $i++;
                        } ?>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h4 style="margin-top: 20px;padding: 0px;text-align: center;"> Compare With Services </h4>
                        <hr style="margin-top: 20px;margin-bottom: 25px;border: 1px solid rgba(0, 40, 100, 0.12);">
                        <?php //echo $service->compare_with_services; 
                        ?>
                        <select class="js-example-basic-multiple form-control" name="compare_with_services[]" multiple="multiple">
                            <?php
                            $compair_services = $this->mdl->compair_services($this->uri->segment(3));

                            foreach ($compair_services as $cs) {
                            ?>
                                <option value="<?= $cs->id ?>" <?php
                                                                if ($this->uri->segment(2) != 'create') {
                                                                    if ($service->compare_with_services != 'N;') {
                                                                        if (count(unserialize($service->compare_with_services)) != '') {
                                                                            if (in_array($cs->id, unserialize($service->compare_with_services))) {
                                                                                echo "selected";
                                                                            } else {
                                                                                echo "";
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                                ?>>

                                    <?= $cs->name ?>

                                </option>
                            <?php } ?>
                        </select>
                        <script>
                            $(document).ready(function() {
                                $('.js-example-basic-multiple').select2();
                            });
                        </script>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h4 style="margin-top: 20px;padding: 0px;text-align: center;"> Services Required Document </h4>
                        <hr style="margin-top: 20px;margin-bottom: 25px;border: 1px solid rgba(0, 40, 100, 0.12);">

                        <select class="js-example-basic-multiple form-control" name="services_required_documents[]" multiple="multiple">
                            <?php
                            $required_docs = $this->mdl->fetch_all('services_required_document_list');

                            foreach ($required_docs as $rd) {
                            ?>
                                <option value="<?= $rd->id ?>" <?php
                                                                if ($this->uri->segment(2) != 'create') {
                                                                    if ($service->services_required_documents != 'N;') {
                                                                        if (count(unserialize($service->services_required_documents)) != '') {
                                                                            if (in_array($rd->id, unserialize($service->services_required_documents))) {
                                                                                echo "selected";
                                                                            } else {
                                                                                echo "";
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                                ?>>

                                    <?= $rd->name ?>

                                </option>
                            <?php } ?>
                        </select>
                        <script>
                            $(document).ready(function() {
                                $('.js-example-basic-multiple').select2();
                            });
                        </script>
                    </div>


                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h4 style="margin-top: 20px;padding: 0px;text-align: center;"> Files Uploaded By Consultant </h4>
                        <hr style="margin-top: 20px;margin-bottom: 25px;border: 1px solid rgba(0, 40, 100, 0.12);">

                        <select class="js-example-basic-multiple form-control" name="files_upload_by_consultant[]" multiple="multiple">
                            <?php
                            $required_docs = $this->mdl->fetch_all('services_upload_by_consultant_document');

                            foreach ($required_docs as $rd) {
                            ?>
                                <option value="<?= $rd->id ?>" <?php if (!empty($service->files_upload_by_consultant)) {
                                                                    if ($this->uri->segment(2) != 'create') {
                                                                        if ($service->files_upload_by_consultant != 'N;') {
                                                                            if (count(unserialize($service->files_upload_by_consultant)) != '') {
                                                                                if (in_array($rd->id, unserialize($service->files_upload_by_consultant))) {
                                                                                    echo "selected";
                                                                                } else {
                                                                                    echo "";
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                                ?>>

                                    <?= $rd->name ?>

                                </option>
                            <?php } ?>
                        </select>
                        <script>
                            $(document).ready(function() {
                                $('.js-example-basic-multiple').select2();
                            });
                        </script>
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-sm-6">
                        <br>
                        <button type="submit" class="btn btn-primary">
                            <?php if ($this->uri->segment(2) == 'create') {
                                echo "Submit";
                            } else {
                                echo "Save";
                            } ?>
                        </button>
                    </div>

                </div>

                <?= form_close(); ?>

            </div>

        </div>

    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        $.ajax({
            url: "<?= base_url() ?>services/fetch_select_group/<?= $this->uri->segment(3) ?>",
            data: {
                id: $('#select_group').val()
            },
            type: 'POST',
            success: function(data1) {
                $('#select_group_type').html(data1);
            }
        });
    });

    /*  */
    $(document).ready(function() {
        $("#select_group").on('change', function() {

            $.ajax({
                url: "<?= base_url() ?>services/fetch_select_group/<?= $this->uri->segment(3) ?>",
                data: {
                    id: $('#select_group').val()
                },
                type: 'POST',
                success: function(data2) {
                    $('#select_group_type').html(data2);
                }
            });
        });
    });
</script>


<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>