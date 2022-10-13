<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?= bo_admin_translate('Settings','text.title'); ?></h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-cog"></i>
                            </div>
                            <div class="card-body">
                                <h4><?= bo_admin_translate('Settings','text.site_setting'); ?></h4>
                                <p><?= bo_admin_translate('Settings','text.site_content'); ?></p>
                                <a href="<?= base_url(route_to('admin_setting_site')) ?>" class="card-cta"><?= bo_admin_translate('Settings','text.change_btn'); ?> <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-power-off"></i>
                            </div>
                            <div class="card-body">
                                <h4><?= bo_admin_translate('Settings','text.system_setting'); ?></h4>
                                <p><?= bo_admin_translate('Settings','text.system_content'); ?></p>
                                <a href="<?= base_url(route_to('admin_setting_system')) ?>" class="card-cta"><?= bo_admin_translate('Settings','text.change_btn'); ?> <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-address-book"></i>
                            </div>
                            <div class="card-body">
                                <h4><?= bo_admin_translate('Settings','text.contact_setting'); ?></h4>
                                <p><?= bo_admin_translate('Settings','text.contact_content'); ?></p>
                                <a href="<?= base_url(route_to('admin_setting_contact')) ?>" class="card-cta"><?= bo_admin_translate('Settings','text.change_btn'); ?> <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="card-body">
                                <h4><?= bo_admin_translate('Settings','text.email_setting'); ?></h4>
                                <p><?= bo_admin_translate('Settings','text.email_content'); ?></p>
                                <a href="<?= base_url(route_to('admin_setting_email')) ?>" class="card-cta"><?= bo_admin_translate('Settings','text.change_btn'); ?> <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-rocket"></i>
                            </div>
                            <div class="card-body">
                                <h4><?= bo_admin_translate('Settings','text.cache_setting'); ?></h4>
                                <p><?= bo_admin_translate('Settings','text.cache_content'); ?></p>
                                <a href="<?= base_url(route_to('admin_setting_cache')) ?>" class="card-cta"><?= bo_admin_translate('Settings','text.change_btn'); ?> <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-images"></i>
                            </div>
                            <div class="card-body">
                                <h4><?= bo_admin_translate('Settings','text.image_setting'); ?></h4>
                                <p><?= bo_admin_translate('Settings','text.image_content'); ?></p>
                                <a href="<?= base_url(route_to('admin_setting_image')) ?>" class="card-cta"><?= bo_admin_translate('Settings','text.change_btn'); ?> <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-sitemap"></i>
                            </div>
                            <div class="card-body">
                                <h4><?= bo_admin_translate('Settings','text.sitemap_setting'); ?></h4>
                                <p><?= bo_admin_translate('Settings','text.sitemap_content'); ?></p>
                                <a href="features-setting-detail.html" class="card-cta"><?= bo_admin_translate('Settings','text.change_btn'); ?> <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-code"></i>
                            </div>
                            <div class="card-body">
                                <h4><?= bo_admin_translate('Settings','text.webmaster_setting'); ?></h4>
                                <p><?= bo_admin_translate('Settings','text.webmaster_content'); ?></p>
                                <a href="<?= base_url(route_to('admin_setting_webmaster')) ?>" class="card-cta text-primary"><?= bo_admin_translate('Settings','text.change_btn'); ?> <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-bell"></i>
                            </div>
                            <div class="card-body">
                                <h4><?= bo_admin_translate('Settings','text.firebase_setting'); ?></h4>
                                <p><?= bo_admin_translate('Settings','text.firebase_content'); ?></p>
                                <a href="<?= base_url(route_to('admin_setting_firebase')) ?>" class="card-cta text-primary"><?= bo_admin_translate('Settings','text.change_btn'); ?> <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-share-square"></i>
                            </div>
                            <div class="card-body">
                                <h4><?= bo_admin_translate('Settings','text.autoshare_setting'); ?></h4>
                                <p><?= bo_admin_translate('Settings','text.autoshare_content'); ?></p>
                                <a href="<?= base_url(route_to('admin_setting_autoshare')) ?>" class="card-cta text-primary"><?= bo_admin_translate('Settings','text.change_btn'); ?> <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-paint-roller"></i>

                            </div>
                            <div class="card-body">
                                <h4><?= bo_admin_translate('Settings','text.theme_setting'); ?></h4>
                                <p><?= bo_admin_translate('Settings','text.theme_setting_content'); ?></p>
                                <a href="<?= base_url(route_to('admin_theme_setting')) ?>" class="card-cta text-primary"><?= bo_admin_translate('Settings','text.change_btn'); ?> <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $this->endSection(); ?>