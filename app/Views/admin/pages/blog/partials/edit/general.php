<div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label class="col-form-label">Yayın Durumu</label>
                <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                        <input <?= $blog->getStatus() == STATUS_ACTIVE ? 'checked' : ''; ?> type="radio" name="status" value="<?= STATUS_ACTIVE ?>" class="selectgroup-input" required>
                        <span class="selectgroup-button">Aktif</span>
                    </label>
                    <label class="selectgroup-item">
                        <input <?= $blog->getStatus() == STATUS_PASSIVE ? 'checked' : ''; ?> type="radio" name="status" value="<?= STATUS_PASSIVE ?>" class="selectgroup-input" required>
                        <span class="selectgroup-button">Pasif</span>
                    </label>
                    <label class="selectgroup-item">
                        <input <?= $blog->getStatus() == STATUS_PENDING ? 'checked' : ''; ?> type="radio" name="status" value="<?= STATUS_PENDING ?>" class="selectgroup-input" required>
                        <span class="selectgroup-button">Beklemede</span>
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label">Kategoriler</label>
                <select name="categories[]" class="form-control select2" multiple="" required>
                    <?php foreach ($categories as $category) { ?>
                        <option <?= in_array($category->id, $blog->getCategories()) ? 'selected' : ''; ?> value="<?= $category->id; ?>"><?= $category->getTitle(); ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label class="col-form-label">Görsel</label>
                <br>
                <?=bo_single_image_picker('blog-image', 'thumbnail', 'blog-image-id', [
                    'image' => $blog->withThumbnail() ? $blog->withThumbnail()->getUrl() :  null,
                    'value' => $blog->getThumbnail()
                ]); ?>
            </div>

            <div class="form-group">
                <label class="col-form-label">Benzer İçerikler</label>
                <select name="similar[]" class="form-control select2" multiple="" >
                    <?php foreach ($blogs as $s_blog) { ?>
                        <option <?= in_array($s_blog->id, $blog->getSimilar()) ? 'selected' : ''; ?> value="<?= $s_blog->id; ?>"><?= $s_blog->getTitle(); ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label class="col-form-label">Yorum Durumu</label>
                <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                        <input <?= $blog->getComment() == STATUS_ACTIVE ? 'checked' : ''; ?>  type="radio" name="comment" value="<?= STATUS_ACTIVE ?>" class="selectgroup-input" required>
                        <span class="selectgroup-button">Aktif</span>
                    </label>
                    <label class="selectgroup-item">
                        <input <?= $blog->getComment() == STATUS_PASSIVE ? 'checked' : ''; ?>  type="radio" name="comment" value="<?= STATUS_PASSIVE ?>" class="selectgroup-input" required>
                        <span class="selectgroup-button">Pasif</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary btn-block btn-lg">Kaydet</button>
        </div>
    </div>
</div>