<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= bo_admin_translate('Blog','new_create_category') ?></h1>
        </div>

        <?= $this->include('admin/layout/partials/errors'); ?>

        <div class="section-body">
            <div class="card">
                <form action="<?= current_url(); ?>" method="post">
                    <?= csrf_field(); ?>

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

                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <?php foreach (bo_language() as $key => $lang) {  ?>
                                <div class="tab-pane fade <?= $key == 0 ? 'show active' : ''; ?>" id="<?= $lang->getCode(); ?>" role="tabpanel" aria-labelledby="<?= $lang->getCode(); ?>-tab">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-8 col-md-2 col-lg-2"><?= $lang->getTitle(); ?> <?= bo_admin_translate('Input','text.title') ?></label>
                                        <div class="col-sm-12 col-md-8">
                                            <input style="border-color: #3875d7" name="title[<?= $lang->getCode(); ?>]" type="text" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-8 col-md-2 col-lg-2"><?= $lang->getTitle(); ?> <?= bo_admin_translate('Input','text.description') ?></label>
                                        <div class="col-sm-12 col-md-8">
                                            <textarea name="description[<?= $lang->getCode(); ?>]" class="form-control" style="height: 150px; border-color: #3875d7;"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-8 col-md-2 col-lg-2"><?= $lang->getTitle(); ?> <?= bo_admin_translate('Input','text.keywords') ?></label>
                                        <div class="col-sm-12 col-md-8">
                                            <input style="border-color: #3875d7" name="keywords[<?= $lang->getCode(); ?>]" value="" type="text" class="form-control inputtags">
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-8 col-md-2 col-lg-2"><?= bo_admin_translate('Input','text.module') ?></label>
                            <div class="col-sm-12 col-md-8">
                                <select name="module" class="form-control select2" required>
                                    <?php foreach (config('system')->modules as $key => $value) { ?>
                                        <?php if ($value){ ?>
                                            <option value="<?= $key ?>"><?=bo_admin_translate('Modules', $key); ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-8 col-md-2 col-lg-2"><?= bo_admin_translate('Input','text.parent_category') ?></label>
                            <div class="col-sm-12 col-md-8">
                                <select name="parent_id" class="form-control select2">
                                    <option value="">Yok</option>
                                    <?php foreach ($categories as $category) { ?>
                                        <option value="<?= $category->id ?>"><?= $category->getTitle(); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2"><?= bo_admin_translate('Input','text.status') ?></label>
                            <div class="col-sm-12 col-md-8">
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input checked type="radio" name="status" value="<?= STATUS_ACTIVE ?>" class="selectgroup-input">
                                        <span class="selectgroup-button"><?= bo_admin_translate('Input','text.active') ?></span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="status" value="<?= STATUS_PASSIVE ?>" class="selectgroup-input">
                                        <span class="selectgroup-button"><?= bo_admin_translate('Input','text.passive') ?></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-8 col-md-2 col-lg-2"><?= bo_admin_translate('Input','text.category_image') ?></label>
                            <div class="col-sm-12 col-md-8">
                                <?= bo_single_image_picker('category-image', 'image', 'category-image-id'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary btn-block btn-lg"><?= bo_admin_translate('Blog','text.save') ?></button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php $this->endSection(); ?>

<?php $this->section('script') ?>
<script>
    $(".inputtags").tagsinput('items');
</script>
<?php $this->endSection(); ?>
