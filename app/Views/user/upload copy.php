<?= $this->extend('template/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">ini halaman buat upload</h1>
</div>

<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Upload File</h6>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url('upload/save')); ?>
        <div class="mb-3">
            <label>Keterangan</label>
            <input type="keterangan" class="form-control" id="keterangan" name="keterangan">
        </div>
        <div class="mb-3">
            <label>Upload</label>
            <input type="file" class="form-control" id="upload" name="upload" required>
        </div>
        <button type="Submit" class="btn btn-primary">Submit</button>
        <?= form_close()  ?>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>File</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                </tfoot>
                <tbody>

                    <?php $no = 1;
                    foreach ($data as $key => $value) { ?>

                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['keterangan'] ?></td>
                            <td></td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>



</div>

<?= $this->endSection(); ?>