<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('content'); ?>

    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="empty-state" data-height="400">
                                <div class="empty-state-icon bg-success">
                                    <i class="fas fa-check"></i>
                                </div>
                                <h2><?= bo_admin_translate('AccountVerify','success_title'); ?></h2>
                                <p>
                                    <?= bo_admin_translate('AccountVerify','success_content'); ?>
                                    <br>
                                    <?= bo_admin_translate('AccountVerify','success_content_2'); ?>
                                </p>
                                <a href="#" class="btn btn-primary mt-4"><?= bo_admin_translate('AccountVerify','success_go_to_login'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<section/>
<?php $this->endSection(); ?>