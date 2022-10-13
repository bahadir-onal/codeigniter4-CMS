<div class="main-wrapper">
    <div class="navbar-bg"></div>
    <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
                <li>
                    <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
                </li>
                <li>
                    <a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a>
                </li>
            </ul>
        </form>
        <ul class="navbar-nav navbar-right">
            <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle"><i class="far fa-envelope"></i></a>
                <div class="dropdown-menu dropdown-list dropdown-menu-right">
                    <div class="dropdown-header"><?= bo_admin_translate('Navbar', 'messages'); ?>
                        <div class="float-right">
                            <a class="message-mark-all-read" href="javascript:void(0)" data-url="<?= base_url(route_to('admin_message_all_read')) ?>"><?= bo_admin_translate('Navbar', 'mark_all_read'); ?></a>
                        </div>
                    </div>
                    <div class="dropdown-list-content dropdown-list-message navbar-message-list">

                    </div>
                    <div class="dropdown-footer text-center">
                        <a href="<?= base_url(route_to('admin_message_listing', '')); ?>">
                            <?= bo_admin_translate('Navbar', 'view_all'); ?><i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </li>
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <img alt="image" src="<?=base_url('public/admin/img/avatar/avatar-1.png'); ?>" class="rounded-circle mr-1">
                    <div class="d-sm-none d-lg-inline-block"><?= session('userData.name'); ?></div></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="features-profile.html" class="dropdown-item has-icon">
                        <i class="far fa-user"></i> <?= bo_admin_translate('Navbar', 'profile'); ?>
                    </a>
                    <a href="features-settings.html" class="dropdown-item has-icon">
                        <i class="fas fa-cog"></i> <?= bo_admin_translate('Navbar', 'setting'); ?>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="<?= base_url(route_to('admin_logout')); ?>" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> <?= bo_admin_translate('Navbar', 'logout'); ?>
                    </a>
                </div>
            </li>
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <img alt="image" src="<?= bo_language(true)->getFlag(); ?>" class="rounded-circle mr-1">
                    <div class="d-sm-none d-lg-inline-block"><?= bo_language(true)->getTitle(); ?></div></a>

                <div class="dropdown-menu dropdown-menu-right">
                    <?php foreach (bo_language() as $lang) { ?>
                        <a href="<?= base_url(route_to('admin_language_change', $lang->getCode())); ?>" class="dropdown-item has-icon">
                            <img width="25" src="<?= $lang->getFlag(); ?>" alt=""> <?= $lang->getTitle(); ?>
                        </a>
                    <?php } ?>
                </div>
            </li>
        </ul>
    </nav>