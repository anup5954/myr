<div class="card">

    <div class="card-header">

        <h3 class="card-title">Files Uploaded By Consultant </h3>

        <div class="card-options">

            <a href="<?= base_url('services_upload_by_consultant_document/create/' . $this->uri->segment(3)) ?>" class="btn btn-primary btn-sm">New</a>

        </div>

    </div>

    <div class="card-body">

        <div class="row1">

            <div class="col-lg-12">

                <table id="table_id" class="table">
                    <thead>
                        <tr>
                            <th>Files Uploaded By Consultant</th>
                            <th style="width: 15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($services_upload_by_consultant_document as $scp) {
                        ?>
                            <tr>
                                <td><?= $scp->name; ?></td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="<?= base_url('services_upload_by_consultant_document/edit/' . $scp->id) ?>">Edit</a>

                                    <a class="btn btn-danger btn-sm" href="<?= base_url('services_upload_by_consultant_document/delete/' . $scp->id) ?>">Delete</a>

                                </td>

                            </tr>

                        <?php $i++;
                        } ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<!-- Start Listing Post -->

<script>
    $(document).ready(function() {

        $('#table_id').DataTable();

    });
</script>