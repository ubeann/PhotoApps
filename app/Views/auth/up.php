<?= $this->extend('auth/template/index'); ?>
<?= $this->section('content'); ?>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">
                                        <div class="sidebar-brand-icon rotate-n-0">
                                            <a href="<?= base_url('Web/index'); ?>">
                                                <i class="fas fa-fire"> Welcome Back</i>
                                            </a>
                                        </div>
                                    </h1>
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

                                <form class="user" action="<?= base_url('auth/check_login'); ?>" method="POST">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control form-control-user" name="email" id="email" placeholder="enter email...">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="enter password...">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
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