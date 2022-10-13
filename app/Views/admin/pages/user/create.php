<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('content'); ?>

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?= bo_admin_translate('Users','create') ?></h1>
            </div>
            <?= $this->include('admin/layout/partials/errors') ?>
            <div class="section-body">
                <form action="<?= current_url() ?>" method="POST">
                    <?= csrf_field(); ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label><?= bo_admin_translate('Input','first_name') ?></label>
                                <input name="first_name" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label><?= bo_admin_translate('Input','last_name') ?></label>
                                <input name="sur_name" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label><?= bo_admin_translate('Input','email') ?></label>
                                <input name="email" type="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label><?= bo_admin_translate('Input','password') ?></label>
                                <input name="password" type="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label><?= bo_admin_translate('Users','status_select') ?></label>
                                <select name="status" class="form-control select2" required>
                                    <option value="<?= STATUS_ACTIVE ?>"><?= bo_admin_translate('Users','active') ?></option>
                                    <option value="<?= STATUS_PENDING ?>"><?= bo_admin_translate('Users','pending') ?></option>
                                    <option value="<?= STATUS_PASSIVE ?>"><?= bo_admin_translate('Users','passive') ?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label><?= bo_admin_translate('Input','group_select') ?></label>
                                <select name="group_id" class="form-control select2" required>
                                    <?php foreach ($groups as $group){ ?>
                                        <option value="<?= $group->id; ?>"><?= $group->getTitle(); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label><?= bo_admin_translate('Input','bio') ?></label>
                                <textarea name="bio" class="form-control" style="height: 150px;"></textarea>
                            </div>
                        </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary btn-block btn-lg"><?= bo_admin_translate('Users','save_btn') ?></button>
                            </div>
                        </div>
                </form>
            </div>
        </section>
    </div>


<?php $this->endSection(); ?>