<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4>Yorumlar</h4>
        </div>
        <div class="card-body">
            <ul class="list-unstyled list-unstyled-border list-unstyled-noborder comment-list">
                <?php foreach ($blog->withComment() as $comment) { ?>
                    <li class="media comment-<?= $comment->id?>" data-id="<?= $comment->id?>">
                        <img alt="image" class="mr-3 rounded-circle" width="70" src="<?= base_url('public/admin/img/avatar/avatar-1.png') ?>">
                        <div class="media-body">
                            <div class="media-right">
                                <div style="<?= $comment->getStatus() == STATUS_ACTIVE ? '' : 'display: none' ?>" class="text-primary comment-status-active comment-status">Onaylanmış</div>
                                <div style="<?= $comment->getStatus() == STATUS_PENDING ? '' : 'display: none' ?>" class="text-warning comment-status-pending comment-status">Beklemede</div>
                            </div>
                            <div class="media-title mb-1"><?= $comment->getName(); ?></div>
                            <div class="text-job text-muted mb-1"><?= $comment->getEmail(); ?></div>
                            <div class="text-time"><?= $comment->getCreatedAt(); ?></div>
                            <div class="media-description text-muted"><?= $comment->getComment(); ?></div>
                            <div class="media-links">
                                <td>
                                    <a href="javascript:;"
                                       style="color: red"
                                       data-toggle="popover"
                                       title="İçerik Detay"
                                       data-content="<?= $comment->withContent()->getTitle(); ?>"
                                       data-trigger="focus">
                                        İçerik Görüntüle
                                    </a>
                                </td>
                                |

                                <a href="javascript:void(0)"
                                   class="comment-status-active comment-status comment-reply-show"
                                   data-url="<?= base_url(route_to('admin_comment_reply_modal')); ?>"
                                   style="<?= $comment->getStatus() == STATUS_ACTIVE ? '' : 'display: none' ?>"
                                >
                                    Cevapla
                                </a>

                                <a class="comment-status-change comment-status-pending comment-status"
                                    data-status="<?= STATUS_ACTIVE ?>"
                                    data-url="<?= base_url(route_to('admin_comment_status')); ?>"
                                    href="javascript:void(0)"
                                    style="<?= $comment->getStatus() == STATUS_PENDING ? '' : 'display: none' ?>">Onayla
                                </a>

                                <div style="<?= $comment->getStatus() == STATUS_ACTIVE ? '' : 'display: none' ?>" class="bullet comment-status-active comment-status"></div>

                                <a  class="comment-status-change comment-status-active comment-status"
                                    data-status="<?= STATUS_PENDING ?>"
                                    data-url="<?= base_url(route_to('admin_comment_status')); ?>"
                                    href="javascript:void(0)"
                                    style="<?= $comment->getStatus() == STATUS_ACTIVE ? '' : 'display: none' ?>">Beklemeye Al
                                </a>

                                <div class="bullet"></div>

                                <a href="javascript:void(0)" class="text-danger comment-delete"
                                   data-url="<?= base_url(route_to('admin_comment_delete')); ?>">Sil
                                </a>

                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>