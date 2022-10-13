<div class="col-md-8">
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <?php foreach (bo_language() as $key => $lang) {  ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $key == 0 ? 'active' : ''; ?>" id="<?= $lang->getCode(); ?>-tab"
                           data-toggle="tab" href="#<?= $lang->getCode(); ?>"
                           role="tab" aria-controls="<?= $lang->getCode(); ?>"
                           aria-selected="true"><img src="<?= $lang->getFlag(); ?>" width="20">
                            <?= $lang->getTitle(); ?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="myTabContent">
                <?php foreach (bo_language() as $key => $lang) {  ?>
                    <div class="tab-pane fade <?= $key == 0 ? 'show active' : ''; ?>" id="<?= $lang->getCode(); ?>" role="tabpanel" aria-labelledby="<?= $lang->getCode(); ?>-tab">
                        <div class="form-group">
                            <label class="col-form-label"><?= $lang->getTitle(); ?> Başlık</label>
                            <input style="border-color: #3875d7" name="title[<?= $lang->getCode(); ?>]" value="<?= $blog->getTitle($lang->getCode()); ?>" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label"><?= $lang->getTitle(); ?> İçerik</label>
                            <textarea name="content[<?= $lang->getCode(); ?>]" class="form-control ckeditor" id="content-<?= $lang->getCode(); ?>" style="height: 150px; border-color: #3875d7;"><?= $blog->getContent($lang->getCode()); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label"><?= $lang->getTitle(); ?> Özet</label>
                            <textarea name="description[<?= $lang->getCode(); ?>]" class="form-control" style="height: 100px; border-color: #3875d7;"><?= $blog->getDescription($lang->getCode()); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label"><?= $lang->getTitle(); ?> Etiketler</label>
                            <input style="border-color: #3875d7" name="keywords[<?= $lang->getCode(); ?>]" value="<?= $blog->getKeywords($lang->getCode()); ?>" type="text" class="form-control inputtags">
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>