<?= $this->extend('auth/template/index'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                </div>

                                <?php
                                // pesan validasi error
                                $errors = session()->getFlashdata('errors');
                                if (!empty($errors)) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <ul>
                                            <?php foreach ($errors as $error) : ?>
                                                <li><?= esc($error) ?></li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                <?php } ?>
                                <?php
                                if (session()->getFlashdata('pesan')) {
                                    echo '<div class="alert alert-success" role="alert">';
                                    echo session()->getFlashdata('pesan');
                                    echo '</div>';
                                }
                                ?>


                                <?php echo form_open_multipart('Upload/submit_submission');?>
                                    <div class="form-group">
                                        <label for="score">Score</label>
                                        <input type="text" class="form-control form-control-upload" name="score" id="score" placeholder="input score..." aria-describedby="helpId">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="periode">Periode</label>
                                        <select class="form-control" name="periode" id="periode">
                                            <option value="2203">Mar 2022</option>
                                            <option value="2204">Apr 2022</option>
                                            <option value="2205">May 2022</option>
                                            <option value="2206">Jun 2022</option>
                                            <option value="2301">Jan 2023</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select class="form-control" name="category" id="category">
                                            <option value="5r">5R</option>
                                            <option value="cbr">Cmon Bro</option>
                                            <option value="elr">Elearning</option>
                                        </select>
                                        <!-- <input type="satker" class="form-control form-control-user" name="satker" id="satker" placeholder="enter satker/afiliasi..."> -->
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="submission" width="100%" cellspacing="0">
                                            <input type="file" name="submission" size="20" />
                                        </table>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>