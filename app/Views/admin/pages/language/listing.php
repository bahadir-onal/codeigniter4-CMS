<?php $this->extend('admin/layout/main'); ?>

<?php $segment = service('request')->uri->getSegment(5); ?>

<?php $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dil Yönetimi</h1>
            <div class="section-header-breadcrumb">
                <a href="<?= base_url(route_to('admin_language_create')); ?>" class="btn btn-primary">Yeni Dil ekle</a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link <?= empty($segment) ? 'active' : '' ?>" href="<?= base_url(route_to('admin_language_listing','')) ?>">Hepsi<span class="badge badge-<?= empty($segment) ? 'white' : 'primary' ?>"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $segment == 'active' ? 'active' : '' ?>" href="<?= base_url(route_to('admin_language_listing','/active')) ?>">Aktif <span class="badge badge-<?= $segment == 'active' ? 'white' : 'primary' ?>"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $segment == 'passive' ? 'active' : '' ?>" href="<?= base_url(route_to('admin_language_listing','/passive')) ?>">Pasif <span class="badge badge-<?= $segment == 'passive' ? 'white' : 'primary' ?>"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $segment == 'delete' ? 'active' : '' ?>" href="<?= base_url(route_to('admin_language_listing','/deleted')) ?>">Silinmiş <span class="badge badge-<?= $segment == 'delete' ? 'white' : 'primary' ?>"></span></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="<?= current_url(); ?>">
                        <div class="float-left">
                            <div class="row ml-2">
                                <div class="dropdown d-inline mr-2">
                                    <button class="btn btn-primary btn-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        İşlem
                                    </button>
                                    <div class="dropdown-menu">
                                        <?php if ($segment != 'deleted'): ?>
                                            <a class="dropdown-item all-delete" href="javascript:void(0)" data-url="<?= base_url(route_to('admin_language_delete')); ?>">Sil</a>
                                            <a class="dropdown-item all-status-change" data-status="<?= STATUS_ACTIVE ?>" data-url="<?= base_url(route_to('admin_language_status')); ?>" href="javascript:void(0)">Aktife Al</a>
                                            <a class="dropdown-item all-status-change" data-status="<?= STATUS_PASSIVE ?>" data-url="<?= base_url(route_to('admin_language_status')); ?>" href="javascript:void(0)">Pasife Al</a>
                                        <?php else: ?>
                                            <a class="dropdown-item all-undo-delete" data-url="<?= base_url(route_to('admin_language_undo_delete')); ?>" href="javascript:void(0)">Geri Al</a>
                                            <a class="dropdown-item all-purge-delete" data-url="<?=base_url(route_to('admin_language_purge_delete')); ?>" href="javascript:void(0)">Kalıcı Olarak Sil</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="float-right mr-2">
                            <div class="row">
                                <button type="button" class="btn btn-primary btn-lg mr-2" data-toggle="modal" data-target="#filter">Filtrele</button>
                                <a href="<?= current_url(); ?>" class="btn btn-primary btn-lg">Temizle</a>
                            </div>
                        </div>
                    </form>
                    <div class="clearfix mb-3"></div>

                    <div class="table-responsive">
                        <table class="table table-striped custom-table">
                            <tr>
                                <th class="pt-2">
                                    <div class="custom-checkbox custom-checkbox-table custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Adı</th>
                                <th>Bayrak</th>
                                <th>Kodu</th>
                                <th><?= bo_admin_translate('Users','created_at') ?></th>
                                <th><?= bo_admin_translate('Users','status') ?></th>
                            </tr>
                            <?php foreach ($languages as $key => $lang): ?>
                                <tr data-id="<?= $lang->id; ?>">
                                    <td>
                                        <div class="custom-checkbox custom-control">
                                            <input data-id="<?= $lang->id ?>" type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $lang->id ?>">
                                            <label for="checkbox-<?= $lang->id ?>" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td><?= $lang->getTitle(); ?>
                                        <?php if ($segment == 'deleted'): ?>
                                            <div class="table-links">
                                                <div class="bullet"></div>
                                                <a data-url="<?= base_url(route_to('admin_language_undo_delete')); ?>" class="text-success undo-delete" href="javascript:void(0)">Geri Al</a>
                                                <div class="bullet"></div>
                                                <a class="text-danger purge-delete" data-url="<?=base_url(route_to('admin_language_purge_delete')); ?>" href="javascript:void(0)">Kalıcı Olarak Sil</a>
                                            </div>
                                        <?php else: ?>
                                            <div class="table-links">
                                                <div class="bullet"></div>
                                                <a href="<?= base_url(route_to('admin_language_edit', $lang->id)); ?>">Düzenle</a>
                                                <div class="bullet"></div>
                                                <div class="dropdown d-inline mr-2">
                                                    <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Durumu Değiştir
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item default-change" data-url="<?= base_url(route_to('admin_language_default')); ?>" href="javascript:void(0)">Varsayılan Yap</a>
                                                        <a class="dropdown-item status-change" data-status="<?= STATUS_ACTIVE ?>" data-url="<?= base_url(route_to('admin_language_status')); ?>" href="javascript:void(0)">Aktife Al</a>
                                                        <a class="dropdown-item status-change" data-status="<?= STATUS_PASSIVE ?>" data-url="<?= base_url(route_to('admin_language_status')); ?>" href="javascript:void(0)">Pasife Al</a>
                                                    </div>
                                                </div>
                                                <div class="bullet"></div>
                                                <a data-url="<?= base_url(route_to('admin_language_delete')); ?>" href="javascript:void(0)" class="text-danger delete">Sil</a>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <img src="<?= $lang->getFlag(); ?>" style="width: 50px">
                                    </td>
                                    <td>
                                        <?= $lang->getCode(); ?>
                                    </td>
                                    <td>
                                        <?= $lang->getCreatedAt(); ?>
                                    </td>
                                    <td>
                                        <div style="<?= $lang->getStatus() != STATUS_ACTIVE ? 'display: none' : '' ?>" class="badge badge-status badge-status-active badge-success">Aktif</div>
                                        <div style="<?= $lang->getStatus() != STATUS_PASSIVE ? 'display: none' : '' ?>" class="badge badge-status badge-status-passive badge-danger">Pasif</div>
                                        <div style="<?= $lang->getCode() != $default ? 'display: none' : '' ?>" class="badge badge-default badge-default-<?= $lang->getCode(); ?> badge-info">Varsayılan</div>
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

<?php $this->endSection(); ?>

<?php $this->section('script');?>
<script>
    $("input[name=dateFilter]").val('<?= $dateFilter ?>');
    $("select[name=perPage]").val('<?= $perPage ?>')
</script>
<?php $this->endSection();?>

