<?php
$data = "";
foreach ($item as $key => $value) {
    if ($key == 'children')
        continue;
    $data = $data . 'data-'.$key.'="'.$value.'"';
}

if ($item->module == 'custom'){
    $title = $menu->getItem($item)->getTitle($item);
}else{
    $title = $menu->getItem($item)->getTitle();
}
?>

<?php if($partial == 'item'): ?>
    <li class="dd-item dd3-item" <?= $data ?> >
        <div class="dd-handle dd3-handle"></div>
        <div class="dd3-content"><?= $title; ?>
            <button class="btn btn-icon btn-danger btn-sm menu-item-delete" style="float: right">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </li>
<?php elseif($partial == 'child-start'): ?>
    <li class="dd-item dd3-item" <?= $data ?>>
    <div class="dd-handle dd3-handle"></div>
    <div class="dd3-content">
        <?= $title; ?>
        <button class="btn btn-icon btn-danger btn-sm menu-item-delete" style="float: right">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <ol class="dd-list">
<?php elseif($partial == 'child-end'): ?>
    </ol>
    </li>
<?php endif; ?>


