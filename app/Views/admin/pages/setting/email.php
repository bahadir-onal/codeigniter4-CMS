<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Blank Page</h1>
            </div>

            <?= $this->include('admin/layout/partials/errors'); ?>

            <div class="section-body">
                <form action="<?= current_url() ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Protokol</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input <?= $setting->getValue('protocol') == 'mail' ? 'checked' : ''; ?> type="radio" name="protocol" value="mail" class="selectgroup-input">
                                            <span class="selectgroup-button">Mail</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input <?= $setting->getValue('protocol') == 'sendmail' ? 'checked' : ''; ?> type="radio" name="protocol" value="sendmail" class="selectgroup-input">
                                            <span class="selectgroup-button">SendMail</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input <?= $setting->getValue('protocol') == 'smtp' ? 'checked' : ''; ?> type="radio" name="protocol" value="smtp" class="selectgroup-input">
                                            <span class="selectgroup-button">SMTP</span>
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gönderici Mail</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="fromEmail" value="<?= $setting->getValue('fromEmail') ?>" type="text" class="form-control" required>
                                </div>
                            </div>


                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gönderici Adı</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="fromName" value="<?= $setting->getValue('fromName') ?>" type="text" class="form-control" required>
                                </div>
                            </div>


                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">SMTP Host</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="SMTPHost" value="<?= $setting->getValue('SMTPHost') ?>" type="text" class="form-control" required>
                                </div>
                            </div>


                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">SMTP Kullanıcı</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="SMTPUser" value="<?= $setting->getValue('SMTPUser') ?>" type="text" class="form-control" required>
                                </div>
                            </div>


                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">SMTP Şifre</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="SMTPPass" value="<?= $setting->getValue('SMTPPass') ?>" type="text" class="form-control" required>
                                </div>
                            </div>


                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">SMTP Port</label>
                                <div class="col-sm-12 col-md-7">
                                    <input style="border-color: #3875d7" name="SMTPPort" value="<?= $setting->getValue('SMTPPort') ?>" type="text" class="form-control" required>
                                </div>
                            </div>


                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">SMTP Şifreleme</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input <?= $setting->getValue('SMTPCrypto') == 'tls' ? 'checked' : ''; ?> type="radio" name="SMTPCrypto" value="tls" class="selectgroup-input">
                                            <span class="selectgroup-button">TLS</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input <?= $setting->getValue('SMTPCrypto') == 'ssl' ? 'checked' : ''; ?> type="radio" name="SMTPCrypto" value="ssl" class="selectgroup-input">
                                            <span class="selectgroup-button">SSL</span>
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">SMTP Şifreleme</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input <?= $setting->getValue('mailType') == 'html' ? 'checked' : ''; ?> type="radio" name="mailType" value="html" class="selectgroup-input">
                                            <span class="selectgroup-button">HTML</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input <?= $setting->getValue('mailType') == 'text' ? 'checked' : ''; ?> type="radio" name="mailType" value="text" class="selectgroup-input">
                                            <span class="selectgroup-button">Text</span>
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