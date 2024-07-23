<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Project UAS</div>
    </a>

    <!-- Looping Menus -->
    <?php if (isset($menus) && !empty($menus)): ?>
        <?php foreach ($menus as $m) : ?>
            <?php
                $menuId = $m['id'];
                $querySubMenu = "SELECT *
                                   FROM user_sub_menu JOIN user_menu
                                     ON user_sub_menu.menu_id = user_menu.id
                                  WHERE user_sub_menu.menu_id = $menuId
                                    AND user_sub_menu.is_active = 1";
                $subMenu = $this->db->query($querySubMenu)->result_array();
            ?>
            <?php foreach ($subMenu as $sm) : ?>
                <li class="nav-item <?= isset($title) && $title == $sm['title'] ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                        <i class="<?= $sm['icon']; ?>"></i>
                        <span><?= $sm['title']; ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Dashboard -->
    <li class="nav-item <?= (isset($title) && $title == 'Dashboard') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- My Profile -->
    <li class="nav-item <?= (isset($title) && $title == 'My Profile') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('user'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>My Profile</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Items -->
    <li class="nav-item <?= (isset($title) && $title == 'Item List') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('items'); ?>">
            <i class="fas fa-file-alt"></i>
            <span>Form</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Logout -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
