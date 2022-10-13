<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Firebase Ayarları</h1>
            </div>

            <?= $this->include('admin/layout/partials/errors'); ?>

            <div class="section-body">
                <form action="<?= current_url(); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Durum</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input <?= $setting->getValue('status') ? 'checked' : ''; ?> type="radio" name="status" value="1" class="selectgroup-input">
                                            <span class="selectgroup-button">Aktif</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input <?= !$setting->getValue('status') ? 'checked' : ''; ?> type="radio" name="status" value="0" class="selectgroup-input">
                                            <span class="selectgroup-button">Pasif</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Server Key</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="serverKey" value="<?= $setting->getValue('serverKey'); ?>" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">API Anahtarı</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="apiKey" value="<?= $setting->getValue('apiKey'); ?>" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Auth Domain</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="authDomain" value="<?= $setting->getValue('authDomain'); ?>" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Database URL</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="databaseURL" value="<?= $setting->getValue('databaseURL'); ?>" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Project ID</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="projectId" value="<?= $setting->getValue('projectId'); ?>" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Storage Bucket</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="storageBucket" value="<?= $setting->getValue('storageBucket'); ?>" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Messaging Sender ID</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="messagingSenderId" value="<?= $setting->getValue('messagingSenderId'); ?>" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">App ID</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="appId" value="<?= $setting->getValue('appId'); ?>" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Measurement ID</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="measurementId" value="<?= $setting->getValue('measurementId'); ?>" type="text" class="form-control" required>
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