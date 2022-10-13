<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Menü Düzenle</h1>
                <div class="section-header-breadcrumb">
                    <form action="<?= current_url(); ?>" method="post">
                        <?= csrf_field(); ?>
                        <textarea name="menu" id="menu-list-output" style="display: block"></textarea>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input name="name" type="text" class="form-control" value="<?= $data->getKey(); ?>">
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary" type="submit">Kaydet</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <?= $this->include('admin/layout/partials/errors'); ?>

            <div class="section-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="col-form-label">Tür Seç</label>
                                    <select name="type" class="form-control selectric menu-type">
                                        <option value="type">Tür Seç</option>
                                        <option value="category">Kategori</option>
                                        <option value="content">İçerik</option>
                                        <option value="static">Sabit</option>
                                        <option value="custom">Özel</option>
                                    </select>
                                </div>
                                <div class="module-area area" style="display: none">
                                    <div class="form-group">
                                        <label class="col-form-label">Modül Seç</label>
                                        <select data-url="<?= base_url(route_to('admin_menu_select')); ?>" name="modules" class="form-control selectric menu-module">
                                            <option value="modules">Modül Seç</option>
                                            <?php foreach (config('system')->modules as $key => $module) { ?>
                                                <?php if ($module){ ?>
                                                    <option value="<?= $key; ?>"><?= lang('Modules.text.'.$key); ?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="module-select-item area" id="module-category-area" style="display: none">
                                    <div class="form-group">
                                        <label class="col-form-label">Kategori Seç</label>
                                        <select name="category" class="form-control select2 module-category">
                                            <option value="category">Kategori Seç</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="module-select-item area" id="module-content-area" style="display: none">
                                    <div class="form-group">
                                        <label class="col-form-label">İçerik Seç</label>
                                        <select name="content" class="form-control select2 module-content">
                                            <option value="content">İçerik Seç</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="custom-area area" style="display: none">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <?php foreach (bo_language() as $key => $lang) {  ?>
                                            <li class="nav-item">
                                                <a class="nav-link <?= $key == 0 ? 'active' : ''; ?>" id="<?= $lang->getCode(); ?>-tab"
                                                   data-toggle="tab" href="#<?= $lang->getCode(); ?>"
                                                   role="tab" aria-controls="<?= $lang->getCode(); ?>"
                                                   aria-selected="true"><img src="<?= $lang->getFlag(); ?>" width="20">
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <?php foreach (bo_language() as $key => $lang) {  ?>
                                            <div class="tab-pane fade <?= $key == 0 ? 'show active' : ''; ?>" id="<?= $lang->getCode(); ?>" role="tabpanel" aria-labelledby="<?= $lang->getCode(); ?>-tab">
                                                <div class="form-group">
                                                    <label><?= $lang->getTitle(); ?> Başlık</label>
                                                    <input data-lang="<?= $lang->getCode(); ?>" type="text" class="form-control custom-title">
                                                </div>
                                                <div class="form-group">
                                                    <label><?= $lang->getTitle(); ?> URL</label>
                                                    <input data-lang="<?= $lang->getCode(); ?>" type="text" class="form-control custom-url">
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary btn-block menu-item-add">Ekle</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="dd" id="menu-list">
                                    <ol class="dd-list" id="menu-item">
                                        <?php foreach ($data->getValue() as $menu) { ?>
                                             <?php bo_tree_menu($data,$menu); ?>
                                        <?php } ?>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<li class="dd-item dd3-item item-clone" style="display: none">
    <div class="dd-handle dd3-handle"></div>
    <div class="dd3-content">
        <span class="item-title"></span>
        <button class="btn btn-icon btn-danger btn-sm menu-item-delete" style="float: right">
            <i class="fas fa-times"></i>
        </button>
    </div>
</li>

<?php $this->endSection(); ?>

<?php $this->section('script'); ?>
    <?= script_tag('public/admin/js/jquery.nestable.js'); ?>
    <?= script_tag('public/admin/js/menu.js'); ?>
<?php $this->endSection(); ?>

