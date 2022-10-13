<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Sistem Ayarları</h1>
        </div>

        <?= $this->include('admin/layout/partials/errors'); ?>

        <div class="section-body">
            <form action="<?= current_url() ?>" method="POST">
                <?= csrf_field() ?>
                <div class="card">
                    <div class="card-body">


                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bakım Modu</label>
                            <div class="col-sm-12 col-md-7">
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input <?= $setting->getValue('maintenance') ? 'checked' : ''; ?> type="radio" name="maintenance" value="1" class="selectgroup-input">
                                        <span class="selectgroup-button">Aktif</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input <?= !$setting->getValue('maintenance') ? 'checked' : ''; ?> type="radio" name="maintenance" value="0" class="selectgroup-input">
                                        <span class="selectgroup-button">Pasif</span>
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kayıt Sistemi</label>
                            <div class="col-sm-12 col-md-7">
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input <?= $setting->getValue('register') ? 'checked' : ''; ?> type="radio" name="register" value="1" class="selectgroup-input">
                                        <span class="selectgroup-button">Aktif</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input <?= !$setting->getValue('register') ? 'checked' : ''; ?> type="radio" name="register" value="0" class="selectgroup-input">
                                        <span class="selectgroup-button">Pasif</span>
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Login Sistemi</label>
                            <div class="col-sm-12 col-md-7">
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input <?= $setting->getValue('login') ? 'checked' : ''; ?>  type="radio" name="login" value="1" class="selectgroup-input">
                                        <span class="selectgroup-button">Aktif</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input <?= !$setting->getValue('login') ? 'checked' : ''; ?>  type="radio" name="login" value="0" class="selectgroup-input">
                                        <span class="selectgroup-button">Pasif</span>
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">E-Mail Doğrulama</label>
                            <div class="col-sm-12 col-md-7">
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input <?= $setting->getValue('emailVerify') ? 'checked' : ''; ?> type="radio" name="emailVerify" value="1" class="selectgroup-input">
                                        <span class="selectgroup-button">Aktif</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input <?= !$setting->getValue('emailVerify') ? 'checked' : ''; ?> type="radio" name="emailVerify" value="0" class="selectgroup-input">
                                        <span class="selectgroup-button">Pasif</span>
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Varsayılan Grup</label>
                            <div class="col-sm-12 col-md-7">
                                <select name="defaultGroup" class="form-control select2">
                                    <?php foreach ($groups as $group){ ?>
                                         <?php if ($setting->getValue('defaultGroup') == $group->id){ ?>
                                            <option selected value="<?= $group->id ?>"><?= $group->getTitle(); ?></option>
                                         <?php } else { ?>
                                            <option value="<?= $group->id; ?>"><?= $group->getTitle(); ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sayfa Başına İçerik Listesi</label>
                            <div class="col-sm-12 col-md-7">
                                <input name="perPageList" value="<?= $setting->getValue('perPageList') ?>" type="text" class="form-control inputtags">
                            </div>
                        </div>


                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Modül</h4>
                    </div>
                    <div class="card-body">
                        <?php foreach (config('system')->modules as $key => $module) { ?>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><?= bo_admin_translate('Modules', $key) ?></label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input <?= isset($setting->getValue('modules')->$key) ? 'checked' : ''; ?> type="radio" name="modules[<?=$key?>]" value="1" class="selectgroup-input">
                                            <span class="selectgroup-button">Aktif</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input <?= !isset($setting->getValue('modules')->$key) ? 'checked' : ''; ?> type="radio" name="modules[<?=$key?>]" value="0" class="selectgroup-input">
                                            <span class="selectgroup-button">Pasif</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
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
