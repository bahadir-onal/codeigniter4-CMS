<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Resim Ayarları</h1>
            </div>

            <?= $this->include('admin/layout/partials/errors'); ?>

            <div class="section-body">
                <form action="<?= current_url() ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kütüphane</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input <?= $setting->getValue('defaultHandler') == 'gd' ? 'checked' : ''; ?> type="radio" name="defaultHandler" value="gd" class="selectgroup-input">
                                            <span class="selectgroup-button">GD</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input <?= $setting->getValue('defaultHandler') == 'imagick' ? 'checked' : ''; ?> type="radio" name="defaultHandler" value="imagick" class="selectgroup-input">
                                            <span class="selectgroup-button">Imagick</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Silme Seçenekleri</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input <?= $setting->getValue('imageDelete') == 'all' ? 'checked' : ''; ?> type="radio" name="imageDelete" value="all" class="selectgroup-input">
                                            <span class="selectgroup-button">Hepsi</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input <?= $setting->getValue('imageDelete') == 'original' ? 'checked' : ''; ?> type="radio" name="imageDelete" value="original" class="selectgroup-input">
                                            <span class="selectgroup-button">Orijinal</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input <?= $setting->getValue('imageDelete') == 'db' ? 'checked' : ''; ?> type="radio" name="imageDelete" value="db" class="selectgroup-input">
                                            <span class="selectgroup-button">Veritabanı</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sıkıştırma Oranı</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="imageCompressor" value="<?= $setting->getValue('imageCompressor') ?>" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Küçük Resimler</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="thumbnail" value="<?= $setting->getValue('thumbnail') ?>" type="text" class="form-control inputtags">
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Watermark Ayarları</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Durum</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input <?= $setting->getValue('watermark')->status ? 'checked' : ''; ?> type="radio" name="watermark[status]" value="1" class="selectgroup-input">
                                            <span class="selectgroup-button">Aktif</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input <?= !$setting->getValue('watermark')->status ? 'checked' : ''; ?> type="radio" name="watermark[status]" value="0" class="selectgroup-input">
                                            <span class="selectgroup-button">Pasif</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Yazı</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="watermark[text]" value="<?= $setting->getValue('watermark')->text; ?>" type="text" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Yazı Rengi</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" style="border-color: #3875d7" name="watermark[color]" value="<?= $setting->getValue('watermark')->color; ?>" class="form-control colorpickerinput" required>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Yazı Büyüklüğü</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="watermark[fontSize]" value="<?= $setting->getValue('watermark')->fontSize; ?>" type="text" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Şeffaflık</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="watermark[opacity]" value="<?= $setting->getValue('watermark')->opacity; ?>" type="text" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gölgelendirme</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="watermark[withShadow]" value="<?= $setting->getValue('watermark')->withShadow; ?>" type="text" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Düşey Pozisyon</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input <?= $setting->getValue('watermark')->vAlign == 'top' ? 'checked' : ''; ?> type="radio" name="watermark[vAlign]" value="top" class="selectgroup-input">
                                            <span class="selectgroup-button">Yukarıda</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input <?= $setting->getValue('watermark')->vAlign == 'middle' ? 'checked' : ''; ?> type="radio" name="watermark[vAlign]" value="middle" class="selectgroup-input">
                                            <span class="selectgroup-button">Ortada</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input <?= $setting->getValue('watermark')->vAlign == 'bottom' ? 'checked' : ''; ?> type="radio" name="watermark[vAlign]" value="bottom" class="selectgroup-input">
                                            <span class="selectgroup-button">Altta</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Yatay Pozisyon</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input <?= $setting->getValue('watermark')->hAlign == 'left' ? 'checked' : ''; ?> type="radio" name="watermark[hAlign]" value="left" class="selectgroup-input">
                                            <span class="selectgroup-button">Solda</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input <?= $setting->getValue('watermark')->hAlign == 'center' ? 'checked' : ''; ?> type="radio" name="watermark[hAlign]" value="center" class="selectgroup-input">
                                            <span class="selectgroup-button">Merkezde</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input <?= $setting->getValue('watermark')->hAlign == 'right' ? 'checked' : ''; ?>  type="radio" name="watermark[hAlign]" value="right" class="selectgroup-input">
                                            <span class="selectgroup-button">Sağda</span>
                                        </label>
                                    </div>
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

<?php $this->section('script') ?>
    <script>
        $(".inputtags").tagsinput('items');
    </script>

    <script>
        $(".colorpickerinput").colorpicker({
            format: 'hex',
            component: '.input-group-append',
        });
    </script>
<?php $this->endSection(); ?>