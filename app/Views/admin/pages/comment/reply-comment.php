<li class="media comment-<?= $comment->id?>" data-level="<?= $comment->level; ?>" data-id="<?= $comment->id?>" style="margin-left: <?= $level*50; ?>px">
    <img alt="image" class="mr-3 rounded-circle" width="70" src="<?= base_url('public/admin/img/avatar/avatar-1.png') ?>">
    <div class="media-body">
        <div class="media-right text-right">
            <div class="text-time"><?= $comment->getCreatedAt(); ?></div>
            <div style="<?= $comment->getStatus() == STATUS_ACTIVE ? '' : 'display: none' ?>" class="text-primary comment-status-active comment-status">Onaylanmış</div>
            <div style="<?= $comment->getStatus() == STATUS_PENDING ? '' : 'display: none' ?>" class="text-warning comment-status-pending comment-status">Beklemede</div>
        </div>
        <div class="media-title mb-1"><?= $comment->getName(); ?></div>
        <div class="text-job text-muted mb-1"><?= $comment->getEmail(); ?></div>
        <div class="text-time"><?= $comment->withContent()->getTitle(); ?></div>
        <div class="media-description text-muted"><?= $comment->getComment(); ?></div>
        <div class="media-links">
            <a href="javascript:void(0)"
               class="comment-status-active comment-status comment-reply-show"
               data-url="<?= base_url(route_to('admin_comment_reply_modal')); ?>"
               style="<?= $comment->getStatus() == STATUS_ACTIVE ? '' : 'display: none' ?>"
            >
                Cevapla
            </a>
            <a  class="comment-status-change comment-status-pending comment-status"
                data-status="<?= STATUS_ACTIVE ?>"
                data-url="<?= base_url(route_to('admin_comment_status')); ?>"
                href="javascript:void(0)"
                style="<?= $comment->getStatus() == STATUS_PENDING ? '' : 'display: none' ?>"
            >
                Onayla
            </a>
            <div style="<?= $comment->getStatus() == STATUS_ACTIVE ? '' : 'display: none' ?>" class="bullet comment-status-active comment-status"></div>
            <a  class="comment-status-change comment-status-active comment-status"
                data-status="<?= STATUS_PENDING ?>"
                data-url="<?= base_url(route_to('admin_comment_status')); ?>"
                href="javascript:void(0)"
                style="<?= $comment->getStatus() == STATUS_ACTIVE ? '' : 'display: none' ?>"
            >
                Beklemeye Al
            </a>
            <div class="bullet"></div>
            <a href="javascript:void(0)"
               class="text-danger comment-delete"
               data-url="<?= base_url(route_to('admin_comment_delete')); ?>"
            >Sil</a>
        </div>
    </div>
</li>