<?php foreach ($data as $key => $value) { ?>
    <option value="<?= $value->id; ?>" data-title="<?= $value->getTitle(); ?>">
        <?= $value->getTitle(); ?>
    </option>
<?php } ?>