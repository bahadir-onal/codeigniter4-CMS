<?php foreach ($messages as $message) {?>
    <div class="dropdown-item dropdown-item-unread">
        <div class="dropdown-item-avatar">
            <img alt="image" src="<?= base_url('public/admin/img/avatar/avatar-1.png') ?>" class="rounded-circle">
            <div class="is-online"></div>
        </div>
        <div class="dropdown-item-desc">
            <b><?= $message->getName(); ?></b>
            <p><?= $message->getSubject(); ?></p>
            <div class="time"><?= $message->getCreatedAt(true); ?></div>
        </div>
    </div>
<?php } ?>