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


                                <form class="user" action="<?= base_url('Auth/save_register'); ?>" method="POST">

                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control form-control-user" name="username" id="username" placeholder="enter username..." aria-describedby="helpId">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control form-control-user" name="email" id="email" placeholder="enter email..." aria-describedby="helpId">
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="enter password...">
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Retype password</label>
                                        <input type="password" class="form-control form-control-user" name="repassword" id="repassword" placeholder="retype password...">
                                    </div>

                                    <div class="form-group">
                                        <label for="satker">Satker/Afiliasi</label>
                                        <select class="form-control" name="satker/afiliasi" id="satker/afiliasi">
                                            <option value="corsec">Corporate Secretary</option>
                                            <option value="corstra">Corporate Strategy</option>
                                            <option value="internal">Internal Audit</option>
                                            <option value="lcc">Legal Counsel & Compliance</option>
                                            <option value="busdev">Business Development</option>
                                            <option value="gls">Gas & LNG Supply</option>
                                            <option value="investment">Investment, Risk Management & GCG</option>
                                            <option value="mcs">Marketing & Corporate Sales</option>
                                            <option value="et">Engineering & Technology</option>
                                            <option value="et">Engineering & Technology</option>
                                            <option value="et">Engineering & Technology</option>
                                            <option value="et">Engineering & Technology</option>
                                            <option value="et">Engineering & Technology</option>
                                        </select>
                                        <!-- <input type="satker" class="form-control form-control-user" name="satker" id="satker" placeholder="enter satker/afiliasi..."> -->
                                    </div>

                                    <div class="form-group">
                                        <label for="role_user">Role user</label>
                                        <select class="form-control" name="level" id="level">
                                            <option value="1">Admin</option>
                                            <option value="2">User</option>
                                            <option value="3">PerwiraKsatria</option>
                                            <option value="4">Director</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">Register Account</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>