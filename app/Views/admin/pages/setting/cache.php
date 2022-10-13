<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Önbellek Ayarları</h1>
            </div>

            <?= $this->include('admin/layout/partials/errors'); ?>

            <div class="section-body">
                <form action="<?= current_url(); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><?= bo_admin_translate('Input','html'); ?></label>
                                <div class="col-sm-12 col-md-8">
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input <?= $setting->getValue('html') ? 'checked' : ''; ?> type="radio" name="html" value="1" class="selectgroup-input">
                                            <span class="selectgroup-button"><?= bo_admin_translate('Input','active'); ?></span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input <?= !$setting->getValue('html') ? 'checked' : ''; ?> type="radio" name="html" value="0" class="selectgroup-input">
                                            <span class="selectgroup-button"><?= bo_admin_translate('Input','passive'); ?></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><?= bo_admin_translate('Input','raw'); ?></label>
                                <div class="col-sm-12 col-md-8">
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input <?= $setting->getValue('raw') ? 'checked' : ''; ?> type="radio" name="raw" value="1" class="selectgroup-input">
                                            <span class="selectgroup-button"><?= bo_admin_translate('Input','active'); ?></span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input <?= !$setting->getValue('raw') ? 'checked' : ''; ?> type="radio" name="raw" value="0" class="selectgroup-input">
                                            <span class="selectgroup-button"><?= bo_admin_translate('Input','passive'); ?></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><?= bo_admin_translate('Input','cache_times'); ?></label>
                                <div class="col-sm-12 col-md-4">
                                    <label class="col-form-label" style="color: #6777ef"><?= bo_admin_translate('Input','html'); ?> <?= bo_admin_translate('Input','cache_time'); ?></label>
                                    <input style="border-color: #3875d7" name="html_time" value="<?= $setting->getValue('html_time'); ?>" type="text" class="form-control" required>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <label class="col-form-label" style="color: #6777ef"><?= bo_admin_translate('Input','raw'); ?> <?= bo_admin_translate('Input','cache_time'); ?></label>
                                    <input style="border-color: #3875d7" name="raw_time" value="<?= $setting->getValue('raw_time'); ?>" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><?= bo_admin_translate('Settings','system'); ?></label>
                                <div class="col-sm-12 col-md-8">
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input <?= $setting->getValue('handler') == 'file' ? 'checked' : ''; ?> type="radio" name="handler" value="file" class="selectgroup-input">
                                            <span class="selectgroup-button"><?= bo_admin_translate('Input','file'); ?></span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input <?= $setting->getValue('handler') == 'memcached' ? 'checked' : ''; ?> type="radio" name="handler" value="memcached" class="selectgroup-input">
                                            <span class="selectgroup-button"><?= bo_admin_translate('Settings','memcache'); ?></span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input <?= $setting->getValue('handler') == 'predis' ? 'checked' : ''; ?> type="radio" name="handler" value="predis" class="selectgroup-input">
                                            <span class="selectgroup-button"><?= bo_admin_translate('Settings','predis'); ?></span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input <?= $setting->getValue('handler') == 'redis' ? 'checked' : ''; ?> type="radio" name="handler" value="redis" class="selectgroup-input">
                                            <span class="selectgroup-button"><?= bo_admin_translate('Settings','redis'); ?></span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input <?= $setting->getValue('handler') == 'wincache' ? 'checked' : ''; ?> type="radio" name="handler" value="wincache" class="selectgroup-input">
                                            <span class="selectgroup-button"><?= bo_admin_translate('Settings','wincache'); ?></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><?= bo_admin_translate('Input','prefix'); ?></label>
                                <div class="col-sm-12 col-md-8">
                                    <input style="border-color: #3875d7" name="prefix" value="<?= $setting->getValue('prefix'); ?>" type="text" class="form-control" required>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                            <div class="card-header">
                                <h4>Redis Ayarları</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><?= bo_admin_translate('Input','host'); ?></label>
                                    <div class="col-sm-12 col-md-8">
                                        <input style="border-color: #3875d7" value="<?= $setting->getValue('redis')->host; ?>" name="redis[host]" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><?= bo_admin_translate('Input','port'); ?></label>
                                    <div class="col-sm-12 col-md-8">
                                        <input style="border-color: #3875d7" value="<?= $setting->getValue('redis')->port; ?>" name="redis[port]" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><?= bo_admin_translate('Input','password'); ?></label>
                                    <div class="col-sm-12 col-md-8">
                                        <input style="border-color: #3875d7" value="<?= $setting->getValue('redis')->password; ?>" name="redis[password]" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><?= bo_admin_translate('Input','time_out'); ?></label>
                                    <div class="col-sm-12 col-md-8">
                                        <input style="border-color: #3875d7" value="<?= $setting->getValue('redis')->timeout; ?>" name="redis[timeout]" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><?= bo_admin_translate('Input','database'); ?></label>
                                    <div class="col-sm-12 col-md-8">
                                        <input style="border-color: #3875d7" value="<?= $setting->getValue('redis')->database; ?>" name="redis[database]" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="card">
                            <div class="card-header">
                                <h4>MemCache Ayarları</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><?= bo_admin_translate('Input','host'); ?></label>
                                    <div class="col-sm-12 col-md-8">
                                        <input style="border-color: #3875d7" name="memcached[host]" value="<?= $setting->getValue('memcached')->host; ?>" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><?= bo_admin_translate('Input','port'); ?></label>
                                    <div class="col-sm-12 col-md-8">
                                        <input style="border-color: #3875d7" name="memcached[port]" value="<?= $setting->getValue('memcached')->port; ?>" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><?= bo_admin_translate('Input','weight'); ?></label>
                                    <div class="col-sm-12 col-md-8">
                                        <input style="border-color: #3875d7" name="memcached[weight]" value="<?= $setting->getValue('memcached')->weight; ?>" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><?= bo_admin_translate('Input','raw'); ?></label>
                                    <div class="col-sm-12 col-md-8">
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input type="radio" <?= $setting->getValue('memcached')->raw ? 'checked' : ''; ?> name="memcached[raw]" value="1" class="selectgroup-input">
                                                <span class="selectgroup-button"><?= bo_admin_translate('Input','active'); ?></span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" <?= !$setting->getValue('memcached')->raw ? 'checked' : ''; ?> name="memcached[raw]" value="0" class="selectgroup-input">
                                                <span class="selectgroup-button"><?= bo_admin_translate('Input','passive'); ?></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary btn-block btn-lg"><?= bo_admin_translate('Settings','save'); ?></button>
                            </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
<?php $this->endSection(); ?>