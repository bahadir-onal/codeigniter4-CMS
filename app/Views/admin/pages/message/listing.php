<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Mesajlar</h1>
                <div class="section-header-breadcrumb">
                    <?php if (service('request')->uri->getSegment(5) != 'deleted') { ?>
                        <a href="<?= base_url(route_to('admin_message_listing','/deleted')) ?>" class="btn btn-danger">Silinen Mesajlar</a>
                    <?php } else { ?>
                        <a href="<?= base_url(route_to('admin_message_listing','')); ?>" class="btn btn-success">Gelen Mesajlar</a>
                    <?php } ?>
                </div>
            </div>

            <?= $this->include('admin/layout/partials/errors'); ?>

            <div class="section-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="tickets">
                                    <div class="ticket-items" id="ticket-items">
                                        <?php foreach ($messages as $key => $message) { ?>
                                            <div class="message-item-area" style="position: relative">
                                                <div class="ticket-item message-list-item" data-id="<?= $message->id; ?>" data-url="<?= base_url(route_to('admin_message_detail')); ?>">
                                                    <div class="ticket-title">
                                                    <span style="font-weight: <?= $message->getStatus() == STATUS_UNREAD ? 'bold' : '500' ?>">
                                                        <?= $message->getSubject(); ?>
                                                    </span>
                                                    </div>
                                                    <div class="ticket-desc">
                                                        <div><?= $message->getName(); ?></div>
                                                        <div class="bullet"></div>
                                                        <div><?= $message->getCreatedAt(true); ?></div>
                                                    </div>
                                                </div>
                                                <?php if (service('request')->uri->getSegment(5) == 'deleted') { ?>
                                                    <button class="btn btn-icon btn-sm btn-danger message-purge-delete" data-url="<?= base_url(route_to('admin_message_purge_delete')); ?>" data-id="<?= $message->id; ?>">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    <button class="btn btn-icon btn-sm btn-success message-undo-delete" data-url="<?= base_url(route_to('admin_message_undo_delete')); ?>" data-id="<?= $message->id; ?>">
                                                        <i class="fas fa-trash-restore"></i>
                                                    </button>
                                                <?php } else { ?>
                                                    <button class="btn btn-icon btn-sm btn-danger message-delete" data-url="<?= base_url(route_to('admin_message_delete')); ?>" data-id="<?= $message->id; ?>">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <?= $pager->links('default','bocms_pager'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header message-detail">
                                <h4>Mesaj İçeriği</h4>
                            </div>
                            <div class="card-body">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $this->endSection(); ?>