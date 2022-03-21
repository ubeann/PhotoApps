<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-0">
            <i class="fas fa-fire"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PGN Culture</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">



    <!-- Nav Item - Admin Menu -->
    <?php if (session()->get('level') == 1) { ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Home/register'); ?>">
                <i class="fas fa-user-plus"></i>
                <span>Add User</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-clipboard-list-check"></i>
                <span>Approve Assessment</span></a>
        </li>
    <?php } ?>



    <!-- Divider
    <hr class="sidebar-divider"> -->



    <!-- Nav Item - User Menu -->
    <?php if (session()->get('level') == 2) { ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Upload/index'); ?>">
                <i class="fas fa-user-plus"></i>
                <span>Self Assessment</span></a>
        </li>
    <?php } ?>



    <!-- Divider
    <hr class="sidebar-divider d-none d-md-block"> -->

    <!-- Nav Item - Approve Menu -->
    <?php if (session()->get('level') == 3) { ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Home/approver'); ?>">
                <i class="fas fa-user-plus"></i>
                <span>Self Assessment</span></a>
        </li>
    <?php } ?>

    <!-- Divider
    <hr class="sidebar-divider d-none d-md-block"> -->

    <!-- Nav Item - Director Menu -->
    <?php if (session()->get('level') == 4) { ?>
        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-chart-bar"></i>
                <span>Chart</span></a>
        </li>
    <?php } ?>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>