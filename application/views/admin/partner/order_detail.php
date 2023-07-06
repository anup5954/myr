<div class="card">

  <div class="card-header">

    <h3 class="card-title">Order Details : #<?= $this->uri->segment(3) ?> </h3>

    <div class="card-options">



      <a href="<?= base_url('partner/new_orders') ?>" class="btn btn-danger btn-sm"><i class="fa fa-undo" aria-hidden="true"></i> Back</a>



    </div>

  </div>

  <div class="card-body">

    <div class="row">



      <div class="col-md-8 col-xl-8">

        <h4>Update Details</h4>

        <?= form_open('customer/upload_documents_and_details/' . $this->uri->segment(3)); ?>

        <div class="form-group">

          <label>Business Name</label>

          <input type="text" class="form-control" name="business_name" value="<?= $order->business_name ?>">

        </div>

        <div class="form-group">

          <label>Business Email</label>

          <input type="email" class="form-control" name="business_email" value="<?= $order->business_email ?>">

        </div>

        <div class="form-group">

          <label>Business Mobile No</label>

          <input type="number" class="form-control" name="business_mobile_no" value="<?= $order->business_mobile_no ?>">

        </div>

        <div class="form-group">

          <label>Business Address</label>

          <input type="text" class="form-control" name="business_address" value="<?= $order->business_address ?>">

          <small class="form-text text-muted">Flat / Door / Block / Street*</small>

        </div>

        <div class="form-group">

          <label>Area / Locality</label>

          <input type="text" class="form-control" name="area_locality" value="<?= $order->area_locality ?>">

        </div>

        <div class="form-group">

          <label>State</label>

          <input type="text" class="form-control" name="state" value="<?= $order->state ?>">

        </div>

        <div class="form-group">

          <label>City</label>

          <input type="text" class="form-control" name="city" value="<?= $order->city ?>">

        </div>

        <div class="form-group">

          <label>Zipcode</label>

          <input type="text" class="form-control" name="zipcode" value="<?= $order->zipcode ?>">

        </div>

        <div class="form-group">

          <label>Type of Business</label>

          <select class="form-control" name="type_of_business">

            <option value="Proprietor" <?php if ($order->type_of_business == 'Proprietor') {
                                          echo "selected";
                                        } ?>>Proprietor</option>

            <option value="Partnership" <?php if ($order->type_of_business == 'Partnership') {
                                          echo "selected";
                                        } ?>>Partnership</option>

            <option value="Company" <?php if ($order->type_of_business == 'Company') {
                                      echo "selected";
                                    } ?>>Company</option>

          </select>

        </div>

        <div class="form-group">

          <label>Business Activity</label>

          <input type="text" class="form-control" name="business_activity" value="<?= $order->business_activity ?>">

        </div>



        <?= form_close(); ?>



      </div>



      <div class="col-md-4 col-xl-4">

        <div class="form-group row">

          <h4>Upload Documents</h4>

          <?php

          foreach ($docs as $key => $doc) {

            //print_r($doc);

          ?>



            <div class="form-group">

              <label class="form-label"><?= $doc->doc_name;  ?></label>



              <a target="_blank" href="<?php echo base_url('customer/doc_view/' . $doc->id) ?>" download>Download File</a>

              <!--<a style="float:right;color:red" href="<?php echo base_url('customer/doc_delete/' . $doc->id . '/' . $this->uri->segment(3)) ?>">Delete File</a>-->



            </div>

            <hr>

          <?php }  ?>

        </div>

      </div>



    </div>

  </div>

</div>