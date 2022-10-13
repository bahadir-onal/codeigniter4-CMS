<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Çeviri Dosyaları</h1>
        </div>

        <?= $this->include('admin/layout/partials/errors'); ?>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="list-group">
                        <?php foreach ($files as $key => $value) { ?>
                            <?php $file = include $path . $value ?>
                            <?php $name = str_replace('.php', '', $value)?>

                            <a href="<?= base_url(route_to('admin_translation_translate', $lang, $folder, $name)); ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1" style="font-weight: 600; font-size: 19px;"><?= lang($folder . '\\' . $name . '.title'); ?></h5>
                                    </div>
                                    <p class="mb-1"><?= lang($folder . '\\' . $name . '.title'); ?></p>
                                </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->endSection(); ?>
