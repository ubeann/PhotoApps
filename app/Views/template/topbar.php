<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>


    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= session()->get('username'); ?></span>
                <img class="img-profile rounded-circle" src="<?= base_url('img/' . session()->get('profile_picture')); ?>">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <img src="<?= base_url('img/' . session()->get('profile_picture')); ?>" class="img-circle" alt="">
                    <br>
                    <br>
                    <i class=" fa-sm fa-fw mr-2 text-gray-400"></i>
                    <p class="text-center">
                        <?= session()->get('username'); ?> <br>
                        <?= session()->get('email'); ?> <br>
                        <?php if (session()->get('level') == 1) {
                            echo 'Admin';
                        } else if (session()->get('level') == 2) {
                            echo 'User';
                        } else if (session()->get('level') == 3) {
                            echo 'PerwiraKsatria';
                        } else {
                            echo 'Director';
                        }

                        ?> <br>
                    </p>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>