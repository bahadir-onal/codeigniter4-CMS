<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Oto Paylaşım Ayarları</h1>
            </div>

            <?= $this->include('admin/layout/partials/errors'); ?>

            <div class="section-body">
                <form action="<?= current_url(); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Twitter Ayarları</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Durum</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input <?= $setting->getValue('twitter')->status ? 'checked' : ''; ?> type="radio" name="twitter[status]" value="1" class="selectgroup-input">
                                            <span class="selectgroup-button">Aktif</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input <?= !$setting->getValue('twitter')->status ? 'checked' : ''; ?> type="radio" name="twitter[status]" value="0" class="selectgroup-input">
                                            <span class="selectgroup-button">Pasif</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">API Key</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="twitter[apiKey]" value="<?= $setting->getValue('twitter')->apiKey; ?>" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">API Secret Key</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="twitter[apiKeySecret]" value="<?= $setting->getValue('twitter')->apiKeySecret; ?>" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Access Token</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="twitter[accessToken]" value="<?= $setting->getValue('twitter')->accessToken; ?>" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Access Token Secret</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="twitter[accessTokenSecret]" value="<?= $setting->getValue('twitter')->accessTokenSecret; ?>" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Facebook Ayarları</h4>
                            <div class="card-header-action">
                                <a href="#" class="btn btn-primary">Bağlan</a>
                                <a href="#" class="btn btn-danger">Test Et</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Durum</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input <?= $setting->getValue('facebook')->status ? 'checked' : ''; ?> type="radio" name="facebook[status]" value="1" class="selectgroup-input">
                                            <span class="selectgroup-button">Aktif</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input <?= !$setting->getValue('facebook')->status ? 'checked' : ''; ?> type="radio" name="facebook[status]" value="0" class="selectgroup-input">
                                            <span class="selectgroup-button">Pasif</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">App ID</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="facebook[appId]" value="<?= $setting->getValue('facebook')->appId; ?>" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">App Secret</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="facebook[appSecret]" value="<?= $setting->getValue('facebook')->appSecret; ?>" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Page ID</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="facebook[pageId]" value="<?= $setting->getValue('facebook')->pageId; ?>" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">İzinler</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="facebook[permissions]" value="<?= $setting->getValue('facebook')->permissions; ?>" type="text" class="form-control inputtags">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Access Token</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="facebook[accessToken]" value="" type="text" class="form-control inputtags">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Call Bacl URL</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="facebook[callbackUrl]" value="<?= base_url(route_to('admin_setting_autoshare')) ?>" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>LinkedIn Ayarları</h4>
                            <div class="card-header-action">
                                <a href="#" class="btn btn-success">Bahadır Önal</a>
                                <a href="#" class="btn btn-danger">Test Et</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Durum</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input <?= $setting->getValue('linkedin')->status ? 'checked' : ''; ?> type="radio" name="linkedin[status]" value="1" class="selectgroup-input">
                                            <span class="selectgroup-button">Aktif</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input <?= !$setting->getValue('linkedin')->status ? 'checked' : ''; ?> type="radio" name="linkedin[status]" value="0" class="selectgroup-input">
                                            <span class="selectgroup-button">Pasif</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">App ID</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="linkedin[appId]" value="<?= $setting->getValue('linkedin')->appId; ?>" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">App Secret</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="linkedin[appSecret]" value="<?= $setting->getValue('linkedin')->appSecret; ?>" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Account ID</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="linkedin[accountId]" value="<?= $setting->getValue('linkedin')->accountId; ?>" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">İzinler</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="linkedin[scopes]" value="<?= $setting->getValue('linkedin')->scopes; ?>" type="text" class="form-control inputtags">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Access Token</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="linkedin[accessToken]" value="" type="text" class="form-control inputtags">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Call Bacl URL</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="linkedin[callbackUrl]" value="<?= base_url(route_to('admin_setting_autoshare')) ?>" type="text" class="form-control">
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
<?php $this->endSection(); ?>
