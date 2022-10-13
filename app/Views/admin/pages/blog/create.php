<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Yeni Blog Yazısı Ekle</h1>
            </div>

            <?= $this->include('admin/layout/partials/errors'); ?>

            <div class="section-body">
                <form action="<?= current_url(); ?>" method="post">
                    <?=csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-8">
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
                                                <div class="form-group">
                                                    <label class="col-form-label"><?= $lang->getTitle(); ?> Başlık</label>
                                                    <input style="border-color: #3875d7" name="title[<?= $lang->getCode(); ?>]" type="text" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label"><?= $lang->getTitle(); ?> İçerik</label>
                                                    <textarea name="content[<?= $lang->getCode(); ?>]" class="form-control ckeditor" id="content-<?= $lang->getCode(); ?>" style="height: 150px; border-color: #3875d7;"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label"><?= $lang->getTitle(); ?> Özet</label>
                                                    <textarea name="description[<?= $lang->getCode(); ?>]" class="form-control" style="height: 100px; border-color: #3875d7;"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label"><?= $lang->getTitle(); ?> Etiketler</label>
                                                    <input style="border-color: #3875d7" name="keywords[<?= $lang->getCode(); ?>]" value="" type="text" class="form-control inputtags">
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="col-form-label">Yayın Durumu</label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input checked type="radio" name="status" value="<?= STATUS_ACTIVE ?>" class="selectgroup-input" required>
                                                <span class="selectgroup-button">Aktif</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="status" value="<?= STATUS_PASSIVE ?>" class="selectgroup-input" required>
                                                <span class="selectgroup-button">Pasif</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="status" value="<?= STATUS_PENDING ?>" class="selectgroup-input" required>
                                                <span class="selectgroup-button">Beklemede</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Kategoriler</label>
                                        <select name="categories[]" class="form-control select2" multiple="" required>
                                            <?php foreach ($categories as $category) { ?>
                                                <option value="<?= $category->id; ?>"><?= $category->getTitle(); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Görsel</label>
                                        <br>
                                        <?=bo_single_image_picker('blog-image', 'thumbnail', 'blog-image-id'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label">Benzer İçerikler</label>
                                        <select name="similar[]" class="form-control select2" multiple="" >
                                            <?php foreach ($blogs as $blog) { ?>
                                                <option value="<?= $blog->id; ?>"><?= $blog->getTitle(); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Yorum Durumu</label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input checked type="radio" name="comment" value="<?= STATUS_ACTIVE ?>" class="selectgroup-input" required>
                                                <span class="selectgroup-button">Aktif</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="comment" value="<?= STATUS_PASSIVE ?>" class="selectgroup-input" required>
                                                <span class="selectgroup-button">Pasif</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg">Kaydet</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Özel Alanlar</h4>
                                    <div class="card-header-action">
                                        <div class="btn-group dropleft">
                                            <button style="border-radius: 5px !important;" class="btn btn-primary dropdown-toggle"
                                                    type="button" id="dropdownMenuButton"
                                                    data-toggle="dropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="false">
                                                Yeni Alan Ekle
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item new-field" data-url="<?= base_url(route_to("admin_field_add")); ?>" data-type="standard">Sabit Alan</a>
                                                <a class="dropdown-item new-field" data-url="<?= base_url(route_to("admin_field_add")); ?>" data-type="translation">Dil Seçenekli</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" id="custom-field">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Resim Galeri</h4>
                                    <div class="card-header-action">
                                        <?= bo_multi_image_picker('Resim Seç', 'gallery', 'blog-gallery-list', 'btn-primary') ?>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <?= bo_multi_image_area('blog-gallery-list'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
<?php $this->endSection(); ?>

<?php $this->section('script') ?>

<script>
    <?php foreach (bo_language() as $key => $lang) {  ?>
    CKEDITOR.replace( 'content-<?= $lang->getCode(); ?>', {
        height: 300,
        filebrowserUploadUrl: "<?= base_url(route_to('admin_image_upload')); ?>"
    });
    <?php }  ?>
</script>

<script>
    $(".inputtags").tagsinput('items');
</script>
<?php $this->endSection(); ?>
