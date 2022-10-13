<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Çeviri Sayfası</h1>
        </div>

        <?= $this->include('admin/layout/partials/errors'); ?>

        <div class="section-body">
            <form action="<?= current_url(); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label><?= bo_admin_translate('Input', 'title') ?></label>
                            <textarea style="border-color: #394eea; height: 60px;" name="translate[title]" class="form-control"><?= $strings['title']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label><?= bo_admin_translate('Input', 'description') ?></label>
                            <textarea style="border-color: #394eea; height: 60px;" name="translate[description]" class="form-control"><?= $strings['description']; ?></textarea>
                        </div>
                        <?php foreach ($strings['text'] as $key => $value) { ?>
                            <div class="form-group">
                                <label><?= $key; ?></label>
                                <textarea style="border-color: #394eea; height: 60px;" name="translate[text][<?= $key; ?>]" class="form-control"><?= $value; ?></textarea>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary btn-block btn-lg"><?= bo_admin_translate('Blog','text.save') ?></button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
<?php $this->endSection(); ?>
