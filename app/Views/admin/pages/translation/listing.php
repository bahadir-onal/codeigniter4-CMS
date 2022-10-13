<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?= bo_admin_translate('Translation', 'page_title'); ?></h1>
            </div>

            <?= $this->include('admin/layout/partials/errors'); ?>

            <div class="section-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4><?= bo_admin_translate('Translation', 'language_select'); ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="list-group">
                                    <?php foreach (bo_language() as $key => $lang) { ?>
                                        <a href="javascript:void(0)"
                                           data-url="<?= base_url(route_to('admin_translation_folder_listing')); ?>"
                                           data-lang="<?= $lang->getCode(); ?>"
                                           class="list-group-item list-group-item-action language-select">
                                            <img style="width: 30px; margin-right: 10px;" src="<?= $lang->getFlag(); ?>" alt="">
                                            <?= $lang->getTitle() ?>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4><?= bo_admin_translate('Translation', 'folder_select'); ?></h4>
                            </div>
                            <div class="card-body" id="folder_list"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $this->endSection(); ?>

<?php $this->section('script'); ?>
    <?= script_tag('public/admin/js/translation.js'); ?>
<?php $this->endSection(); ?>


