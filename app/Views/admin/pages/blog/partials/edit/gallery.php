<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4>Resim Galeri</h4>
            <div class="card-header-action">
                <?= bo_multi_image_picker('Resim Seç', 'gallery', 'blog-gallery-list', 'btn-primary') ?>
            </div>
        </div>
        <div class="card-body">
            <?= bo_multi_image_area('blog-gallery-list','gallery', $blog->withGallery()); ?>
        </div>
    </div>
</div>