<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Temalar</h1>
            </div>

            <?= $this->include('admin/layout/partials/errors'); ?>

            <div class="section-body">
                <div class="row">
                    <?php foreach ($themes as $key => $value) { ?>
                        <?php $key = str_replace('\\', '', $key); ?>
                    <?php $theme = include APPPATH . 'Views/themes/' . $key . '/info.php'; ?>
                        <div class="col-12 col-md-4 col-lg-4">
                            <article class="article article-style-c">
                                <div class="article-header">
                                    <div class="article-image" data-background="<?= base_url('public/' . $key . '/screenshot.png') ?>"></div>
                                    <?php if ($key == $active->getFolder()){ ?>
                                    <div class="article-badge">
                                        <div class="article-badge-item bg-success">Aktif</div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="article-details">
                                    <div class="article-title">
                                        <h2><a href="#"><?= $theme['name']; ?></a></h2>
                                    </div>
                                    <p><?= isset($theme['description']) ? $theme['description'] : ''; ?></p>
                                    <div class="article-user">
                                        <img alt="image" src="<?= base_url('public/admin/img/avatar/avatar-1.png') ?>">
                                        <div class="article-user-details">
                                            <div class="user-detail-name">
                                                <a target="_blank" href="<?= isset($theme['web']) ? $theme['web'] : ''; ?>">
                                                    <?= isset($theme['author']) ? $theme['author'] : ''; ?>
                                                </a>
                                            </div>
                                            <div class="text-job"><?= isset($theme['email']) ? $theme['email'] : ''; ?></div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <a href="<?= base_url(route_to('admin_theme_active', $key)) ?>" class="btn btn-primary btn-block">Aktifleştir</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="<?= base_url(route_to('admin_theme_delete', $key)) ?>" class="btn btn-danger btn-block">Sil</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    </div>
<?php $this->endSection(); ?>