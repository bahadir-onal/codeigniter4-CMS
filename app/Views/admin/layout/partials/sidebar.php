<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?= base_url(route_to('admin_dashboard')) ?>">BÖCMS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= base_url(route_to('admin_dashboard')) ?>">BHD</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header"><?= bo_admin_translate('Sidebar', 'menus') ?></li>
            <li>
                <a class="nav-link" href="<?= base_url(route_to('admin_dashboard')) ?>">
                    <i class="fas fa-home"></i><span><?= bo_admin_translate('Sidebar', 'homepage') ?></span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-layer-group"></i><span><?= bo_admin_translate('Sidebar', 'group') ?></span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= base_url(route_to('admin_group_listing','')) ?>"><?= bo_admin_translate('Sidebar', 'group_listing') ?></a></li>
                    <li><a class="nav-link" href="<?= base_url(route_to('admin_group_create')) ?>"><?= bo_admin_translate('Sidebar', 'group_create') ?></a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span><?= bo_admin_translate('Sidebar', 'user') ?></span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= base_url(route_to('admin_users_listing','')) ?>"><?= bo_admin_translate('Sidebar', 'user_listing') ?></a></li>
                    <li><a class="nav-link" href="<?= base_url(route_to('admin_users_create')) ?>"><?= bo_admin_translate('Sidebar', 'user_create') ?></a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-blog"></i><span><?= bo_admin_translate('Sidebar', 'blog') ?></span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= base_url(route_to('admin_blog_listing', '')); ?>"><?= bo_admin_translate('Sidebar', 'blog_listing') ?></a></li>
                    <li><a class="nav-link" href="<?= base_url(route_to('admin_blog_create')); ?>"><?= bo_admin_translate('Sidebar', 'blog_create') ?></a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-pager"></i><span><?= bo_admin_translate('Sidebar', 'page') ?></span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= base_url(route_to('admin_page_listing', '')); ?>"><?= bo_admin_translate('Sidebar', 'page_listing') ?></a></li>
                    <li><a class="nav-link" href="<?= base_url(route_to('admin_page_create')); ?>"><?= bo_admin_translate('Sidebar', 'page_create') ?></a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-list"></i><span><?= bo_admin_translate('Sidebar', 'category') ?></span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= base_url(route_to('admin_category_listing', '')); ?>"><?= bo_admin_translate('Sidebar', 'category_listing') ?></a></li>
                    <li><a class="nav-link" href="<?= base_url(route_to('admin_category_create')); ?>"><?= bo_admin_translate('Sidebar', 'category_create') ?></a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-file"></i><span><?= bo_admin_translate('Sidebar', 'media') ?></span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= base_url(route_to('admin_image_listing')) ?>"><?= bo_admin_translate('Sidebar', 'pictures') ?></a></li>
                    <li><a class="nav-link" href="#">Videolar</a></li>
                    <li><a class="nav-link" href="#">Dosyalar</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-language"></i><span><?= bo_admin_translate('Sidebar', 'language') ?></span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= base_url(route_to('admin_language_listing', '')); ?>"><?= bo_admin_translate('Sidebar', 'language_listing') ?></a></li>
                    <li><a class="nav-link" href="<?= base_url(route_to('admin_language_create')); ?>"><?= bo_admin_translate('Sidebar', 'language_create') ?></a></li>
                    <li><a class="nav-link" href="<?= base_url(route_to('admin_translation_listing')); ?>"><?= bo_admin_translate('Sidebar', 'translate') ?></a></li>
                </ul>
            </li>

            <li>
                <a class="nav-link" href="<?= base_url(route_to('admin_comment_listing', '')) ?>">
                    <i class="fas fa-comments"></i><span><?= bo_admin_translate('Sidebar', 'comments') ?></span>
                </a>
            </li>

            <li>
                <a class="nav-link" href="<?= base_url(route_to('admin_menu_listing', '')) ?>">
                    <i class="fas fa-bars"></i><span><?= bo_admin_translate('Sidebar', 'menus') ?></span>
                </a>
            </li>

            <li>
                <a class="nav-link" href="<?= base_url(route_to('admin_theme_listing')) ?>">
                    <i class="fas fa-palette"></i><span><?= bo_admin_translate('Sidebar', 'themes') ?></span>
                </a>
            </li>

            <li>
                <a class="nav-link" href="<?= base_url(route_to('admin_setting_home')) ?>">
                    <i class="fas fa-tools"></i><span><?= bo_admin_translate('Sidebar', 'setting') ?></span>
                </a>
            </li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> <?= bo_admin_translate('Sidebar', 'doc') ?>
            </a>
        </div>
    </aside>
</div>