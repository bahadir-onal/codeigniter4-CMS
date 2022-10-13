<?php $this->extend('admin/layout/main'); ?>

<?php $segment = service('request')->uri->getSegment(5); ?>

<?php $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Yorumlar</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link <?= empty($segment) ? 'active' : '' ?>" href="<?= base_url(route_to('admin_comment_listing','')) ?>">Hepsi<span class="badge badge-<?= empty($segment) ? 'white' : 'primary' ?>"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $segment == 'active' ? 'active' : '' ?>" href="<?= base_url(route_to('admin_comment_listing','/active')) ?>">Onaylanmış <span class="badge badge-<?= $segment == 'active' ? 'white' : 'primary' ?>"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $segment == 'pending' ? 'active' : '' ?>" href="<?= base_url(route_to('admin_comment_listing','/pending')) ?>">Beklemede <span class="badge badge-<?= $segment == 'active' ? 'white' : 'primary' ?>"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $segment == 'delete' ? 'active' : '' ?>" href="<?= base_url(route_to('admin_comment_listing','/deleted')) ?>">Silinmiş <span class="badge badge-<?= $segment == 'delete' ? 'white' : 'primary' ?>"></span></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="<?= current_url(); ?>">
                        <div class="float-right mr-2">
                            <div class="row">
                                <button type="button" class="btn btn-primary btn-lg mr-2" data-toggle="modal" data-target="#filter">Filtrele</button>
                                <a href="<?= current_url(); ?>" class="btn btn-primary btn-lg">Temizle</a>
                            </div>
                        </div>
                    </form>
                    <div class="clearfix mb-5"></div>

                    <ul class="list-unstyled list-unstyled-border list-unstyled-noborder comment-list">
                        <?php foreach ($comments as $comment): ?>
                            <li class="media comment-<?= $comment->id?>" data-level="<?= $comment->level; ?>" data-id="<?= $comment->id?>" style="margin-left: <?= $comment->level*50; ?>px">
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
                                    <?php if ($segment != 'deleted'): ?>
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
                                    <?php else: ?>
                                        <div class="media-links">
                                            <div class="bullet"></div>
                                            <a class="text-success comment-undo-delete"
                                               data-url="<?= base_url(route_to('admin_comment_undo_delete')) ?>"
                                               href="javascript:void(0)">
                                                Geri Al
                                            </a>
                                            <div class="bullet"></div>
                                            <a href="javascript:void(0)"
                                               class="text-danger comment-purge-delete"
                                               data-url="<?= base_url(route_to('admin_comment_purge_delete')) ?>"
                                            >Kalıcı Olarak Sil</a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>

<div id="filter" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Filtrele</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="<?= current_url(); ?>" method="get">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <select name="content" class="form-control select2">
                                    <option value="">İçerik Seçin</option>
                                    <?php foreach ($contents as $value){ ?>
                                        <option <?= $content == $value->id ? 'selected' : ''; ?> value="<?= $value->id ?>"><?= $value->getTitle(); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-calendar"></i>
                                        </div>
                                    </div>
                                    <input value="" name="dateFilter" placeholder="Tarihe Göre Filtrele" type="text" class="form-control daterange-cus">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-light date_filter_clear"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <input value="<?= $search; ?>" name="search" type="text" class="form-control" placeholder="Ara...">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <select name="perPage" class="form-control select2">
                                    <option value="">İçerik Sayısı</option>
                                    <?php foreach (config('system')->perPageList as $per): ?>
                                        <option value="<?= $per ?>"><?= $per ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary btn-lg" type="submit">Filtrele</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->section('script');?>
<script>
    $("input[name=dateFilter]").val('<?= $dateFilter ?>');
    $("select[name=perPage]").val('<?= $perPage ?>')
</script>
<?php $this->endSection();?>

<?php $this->endSection(); ?>


