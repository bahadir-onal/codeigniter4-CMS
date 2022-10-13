<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>WebMaster Ayarları</h1>
            </div>

            <?= $this->include('admin/layout/partials/errors'); ?>

            <div class="section-body">
                <form action="<?= current_url(); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Google Ayarları</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Doğrulama Anahtarı</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="googleVerify" value="<?= $setting->getValue('googleVerify'); ?>" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Analytics İzleme Kodu</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="googleAnalytics" value="<?= $setting->getValue('googleAnalytics'); ?>" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Yandex Ayarları</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Doğrulama Kodu</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="yandexVerify" value="<?= $setting->getValue('yandexVerify'); ?>" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Metrika İzleme Kodu</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="yandexMetrika" value="<?= $setting->getValue('yandexMetrika'); ?>" type="text" class="form-control">
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