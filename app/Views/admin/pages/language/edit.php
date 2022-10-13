<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>"<?= $language->getTitle(); ?>" Dil Düzenle</h1>
            </div>

            <?= $this->include('admin/layout/partials/errors'); ?>

            <div class="section-body">
                <form action="<?= current_url(); ?>" method="post">
                    <?= csrf_field(); ?>
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
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <?php foreach (bo_language() as $key => $lang) {  ?>
                                    <div class="tab-pane fade <?= $key == 0 ? 'show active' : ''; ?>" id="<?= $lang->getCode(); ?>" role="tabpanel" aria-labelledby="<?= $lang->getCode(); ?>-tab">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2"><?= $lang->getTitle(); ?> Dil Adı</label>
                                            <div class="col-sm-12 col-md-8">
                                                <input style="border-color: #3875d7" name="title[<?= $lang->getCode(); ?>]" value="<?= $language->getTitle($lang->getCode()); ?>" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Ülke</label>
                                <div class="col-sm-12 col-md-8">
                                    <select name="code" class="form-control select2">
                                        <?php foreach (lang('Language.text') as $key => $value) { ?>
                                            <option <?= $language->getCode() == $key ? 'selected' : ''; ?> value="<?= $key ?>"><?= $value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">Kaydet</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
<?php $this->endSection(); ?>