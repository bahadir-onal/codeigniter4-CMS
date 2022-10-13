<div class="list-group">
    <?php foreach ($folder_list as $key => $value) { ?>
            <?php $folder = str_replace('\\', '', $key) ?>
        <a href="<?= base_url(route_to('admin_translation_files', $lang, $folder)); ?>" class="list-group-item list-group-item-action language-select">
            <?= $folder; ?>
        </a>
    <?php } ?>
</div>