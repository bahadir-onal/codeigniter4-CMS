<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('content'); ?>

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?= bo_admin_translate('Groups','group_create_btn'); ?></h1>
            </div>
            <?= $this->include('admin/layout/partials/errors'); ?>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <?php foreach (bo_language() as $key => $lang) {  ?>
                                        <li class="nav-item">
                                            <a class="nav-link <?= $key == 0 ? 'active' : ''; ?>" id="<?= $lang->getCode(); ?>-tab"
                                               data-toggle="tab" href="#<?= $lang->getCode(); ?>"
                                               role="tab" aria-controls="<?= $lang->getCode(); ?>"
                                               aria-selected="true"><img src="<?= $lang->getFlag(); ?>" width="20">
                                                <?= $lang->getTitle(); ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <form action="<?= current_url() ?>" method="POST">
                            <div class="card-body">
                                <?= csrf_field() ?>
                                <div class="tab-content" id="myTabContent">
                                    <?php foreach (bo_language() as $key => $lang) {  ?>
                                        <div class="tab-pane fade <?= $key == 0 ? 'show active' : ''; ?>" id="<?= $lang->getCode(); ?>" role="tabpanel" aria-labelledby="<?= $lang->getCode(); ?>-tab">
                                            <div class="form-group">
                                                <label><?= $lang->getTitle(); ?> <?= bo_admin_translate('Groups','group_name'); ?></label>
                                                <input name="title[<?= $lang->getCode(); ?>]" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="section-title mt-8"><?= bo_admin_translate('Groups','group_permit'); ?></div>
                                        <ul class="list-group">
                                            <?php foreach (config('permissions')->list as $pkey => $pvalue) { ?>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    <?= lang($pvalue) ?>
                                                    <span class="badge badge-pill">
                                                    <label class="custom-switch mt-2">
                                                        <input type="checkbox" name="permission[<?= $pkey ?>]" class="custom-switch-input">
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>
                                                </span>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg"><?= bo_admin_translate('Groups','save_btn'); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php $this->endSection(); ?>