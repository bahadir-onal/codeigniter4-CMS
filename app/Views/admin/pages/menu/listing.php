<?php $this->extend('admin/layout/main'); ?>

<?php $segment = service('request')->uri->getSegment(5); ?>

<?php $this->section('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Menüler</h1>
                <div class="section-header-breadcrumb">
                    <?php if (service('request')->uri->getSegment(5) != 'deleted') { ?>
                        <a href="<?= base_url(route_to('admin_menu_listing','/deleted')) ?>" class="btn btn-danger">Silinen Menüler</a>
                    <?php } else { ?>
                        <a href="<?= base_url(route_to('admin_menu_listing','')); ?>" class="btn btn-success">Tüm Menüler</a>
                    <?php } ?>
                </div>
            </div>

            <?= $this->include('admin/layout/partials/errors'); ?>

            <div class="section-body">
                <div class="row">
                    <div class="col-md-4">
                        <form action="<?= base_url(route_to('admin_menu_create')); ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Yeni Menü Ekle</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                            <label class="col-form-label">Menü Ad</label>
                                            <input style="border-color: #3875d7" name="name" type="text" class="form-control" required>
                                        </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg">Kaydet</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4>Menüler</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped custom-table">
                                        <tr>
                                            <th>Menü Adı</th>
                                            <th>Oluşturulma Tarihi</th>
                                        </tr>
                                        <?php foreach ($menus as $key => $menu): ?>
                                            <tr data-id="<?= $menu->id; ?>">
                                                <td><?= $menu->getKey(); ?>
                                                    <?php if ($segment == 'deleted'): ?>
                                                        <div class="table-links">
                                                            <div class="bullet"></div>
                                                            <a data-url="<?= base_url(route_to('admin_menu_undo_delete')); ?>" class="text-success undo-delete" href="javascript:void(0)">Geri Al</a>
                                                            <div class="bullet"></div>
                                                            <a data-url="<?= base_url(route_to('admin_menu_purge_delete')); ?>" class="text-danger purge-delete" href="javascript:void(0)">Kalıcı Olarak Sil</a>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="table-links">
                                                            <div class="bullet"></div>
                                                            <a href="<?= base_url(route_to('admin_menu_edit', $menu->id)); ?>">Düzenle</a>
                                                            <div class="bullet"></div>
                                                            <a data-url="<?= base_url(route_to('admin_menu_delete')); ?>" href="javascript:void(0)" class="text-danger delete">Sil</a>
                                                        </div>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?= $menu->getCreatedAt(); ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <?= $pager->links('default', 'bocms_pager'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $this->endSection(); ?>