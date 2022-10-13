<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('content'); ?>

    <section class="section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="empty-state">
                            <div class="empty-state-icon bg-danger">
                                <i class="fas fa-times"></i>
                            </div>
                            <h2><?= bo_admin_translate('ForgotVerify','text.error_title'); ?></h2>
                            <p>
                                <?= bo_admin_translate('ForgotVerify','text.error_content'); ?>
                                <br>
                                <?= bo_admin_translate('ForgotVerify','text.error_content_2'); ?>
                            </p>
                            <b><?= bo_admin_translate('ForgotVerify','text.why_title'); ?></b>
                            <ol style="text-align: left">
                                <li><?= bo_admin_translate('ForgotVerify','text.why_1'); ?></li>
                            </ol>
                            <a href="<?= base_url(route_to('admin_forgot_password')); ?>" class="btn btn-primary mt-4">
                                <?= bo_admin_translate('ForgotVerify','forgot.error_button'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section/>
<?php $this->endSection(); ?>