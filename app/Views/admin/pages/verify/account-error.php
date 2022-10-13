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
                                <h2><?= bo_admin_translate('AccountVerify','text.error_title'); ?></h2>
                                <p><?= bo_admin_translate('AccountVerify','text.error_content'); ?></p>
                                <b><?= bo_admin_translate('AccountVerify','text.error_content_2'); ?></b>
                                <b><?= bo_admin_translate('AccountVerify','text.why_title'); ?></b>
                                <ol style="text-align: left">
                                    <li><?= bo_admin_translate('AccountVerify','text.why_1'); ?></li>
                                    <li><?= bo_admin_translate('AccountVerify','text.why_1'); ?></li>
                                    <li><?= bo_admin_translate('AccountVerify','text.why_1'); ?></li>
                                </ol>
                                <a href="#" class="btn btn-primary mt-4"><?= bo_admin_translate('AccountVerify','text.error_button'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section/>
<?php $this->endSection(); ?>