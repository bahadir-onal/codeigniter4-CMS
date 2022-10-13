<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>" <?= $blog->getTitle(); ?> " İçeriğini Düzenle</h1>
        </div>

        <?= $this->include('admin/layout/partials/errors'); ?>

        <div class="section-body">
            <form action="<?= current_url(); ?>" method="post">
                <?=csrf_field(); ?>
                <div class="row">
                    <?= $this->include('admin/pages/blog/partials/edit/content'); ?>
                    <?= $this->include('admin/pages/blog/partials/edit/general'); ?>
                    <?= $this->include('admin/pages/blog/partials/edit/custom-field'); ?>
                    <?= $this->include('admin/pages/blog/partials/edit/gallery'); ?>
                    <?= $this->include('admin/pages/blog/partials/edit/comment'); ?>
                </div>
            </form>
        </div>
    </section>
</div>
<?php $this->endSection(); ?>

<?php $this->section('script') ?>

<script>
    <?php foreach (bo_language() as $key => $lang) {  ?>
    CKEDITOR.replace( 'content-<?= $lang->getCode(); ?>', {
        height: 300,
        filebrowserUploadUrl: "<?= base_url(route_to('admin_image_upload')); ?>"
    });
    <?php }  ?>
</script>

<script>
    $(".inputtags").tagsinput('items');
</script>
<?php $this->endSection(); ?>
