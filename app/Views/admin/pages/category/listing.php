<?php $this->extend('admin/layout/main'); ?>

<?php $segment = service('request')->uri->getSegment(5); ?>

<?php $this->section('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kategoriler</h1>
                <div class="section-header-breadcrumb">
                    <a href="<?= base_url(route_to('admin_category_create')) ?>" class="btn btn-primary">Yeni Kategori Ekle</a>
                </div>
            </div>
            <div class="section-body">

                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link <?= empty($segment) ? 'active' : '' ?>" href="<?= base_url(route_to('admin_category_listing','')) ?>">Hepsi <span class="badge badge-<?= empty($segment) ? 'white' : 'primary' ?>"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $segment == 'active' ? 'active' : '' ?>" href="<?= base_url(route_to('admin_category_listing','/active')) ?>">Aktif <span class="badge badge-<?= $segment == 'active' ? 'white' : 'primary' ?>"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $segment == 'passive' ? 'active' : '' ?>" href="<?= base_url(route_to('admin_category_listing','/passive')) ?>">Pasif <span class="badge badge-<?= $segment == 'passive' ? 'white' : 'primary' ?>"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $segment == 'delete' ? 'active' : '' ?>" href="<?= base_url(route_to('admin_category_listing','/deleted')) ?>">Silinmiş <span class="badge badge-<?= $segment == 'delete' ? 'white' : 'primary' ?>"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form action="<?= current_url(); ?>" method="get">
                            <div class="float-left">
                                <div class="row ml-3">
                                    <div class="dropdown d-inline mr-2">
                                        <button class="btn btn-primary btn-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            İşlem
                                        </button>
                                        <div class="dropdown-menu">
                                            <?php if ($segment != 'deleted') { ?>
                                                <a class="dropdown-item all-delete" data-url="<?= base_url(route_to('admin_category_delete')); ?>" href="javascript:void(0)">Sil</a>
                                                <a class="dropdown-item all-status-change" data-status="<?= STATUS_ACTIVE ?>" data-url="<?= base_url(route_to('admin_category_status')); ?>" href="javascript:void(0)">Aktife Al</a>
                                                <a class="dropdown-item all-status-change" data-status="<?= STATUS_PASSIVE ?>" data-url="<?= base_url(route_to('admin_category_status')); ?>" href="javascript:void(0)">Pasife Al</a>
                                            <?php } else { ?>
                                                <a class="dropdown-item all-undo-delete" data-url="<?= base_url(route_to('admin_category_undo_delete')); ?>" href="javascript:void(0)">Geri Al</a>
                                                <a class="dropdown-item all-purge-delete" data-url="<?= base_url(route_to('admin_category_purge_delete')) ?>" href="javascript:void(0)">Kalıcı Olarak Sil</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group mr-2">
                                        <select name="perPage" class="form-control">
                                            <option value="">İçerik Sayısı</option>
                                            <?php foreach (config('system')->perPageList as $per) { ?>
                                                <option value="<?= $per ?>"><?= $per ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group mr-2">
                                        <select name="module" class="form-control">
                                            <option value="">Modül Seç</option>
                                            <?php foreach (config('system')->modules as $key => $value) { ?>
                                                <?php if ($value){ ?>
                                                    <option <?= $module == $key ? 'selected' : ''; ?> value="<?= $key ?>"><?=lang('Modules.text.'. $key); ?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="float-right">
                                <div class="row">
                                    <div class="form-group col">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-calendar"></i>
                                                </div>
                                            </div>
                                            <input value="" name="dateFilter" placeholder="Tarihe Göre Filtrele..." type="text" class="form-control daterange-cus">
                                            <div class="input-group-append" style="height: 42px;">
                                                <button type="button" class="btn btn-light date_filter_clear"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group col">
                                        <input value="" name="search" type="text" class="form-control" placeholder="Ara...">
                                        <div class="input-group-append" style="height: 42px;">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
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
                                    <th>Başlık</th>
                                    <th>Modül</th>
                                    <th>Üst Kategori</th>
                                    <th>Oluşturan</th>
                                    <th>Oluşturma Tarihi</th>
                                    <th>Durum</th>
                                </tr>
                                <?php foreach ($categories as $category) { ?>
                                    <tr data-id="<?= $category->id; ?>">
                                        <td>
                                            <div class="custom-checkbox custom-control">
                                                <input data-id="<?= $category->id; ?>" type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $category->id; ?>">
                                                <label for="checkbox-<?= $category->id; ?>" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <?= $category->getTitle(); ?>
                                            <?php if ($segment == 'deleted'){ ?>
                                                <div class="table-links">
                                                    <div class="bullet"></div>
                                                    <a data-url="<?= base_url(route_to('admin_category_undo_delete')); ?>" class="text-success undo-delete" href="javascript:void(0)">Geri Al</a>
                                                    <div class="bullet"></div>
                                                    <a class="text-danger purge-delete" data-url="<?= base_url(route_to('admin_category_purge_delete')) ?>" href="javascript:void(0)">Kalıcı Olarak Sil</a>
                                                </div>
                                            <?php } else { ?>
                                                <div class="table-links">
                                                    <div class="bullet"></div>
                                                    <a href="<?=base_url(route_to('admin_category_edit', $category->id)); ?>">Düzenle</a>
                                                    <div class="bullet"></div>


                                                    <div class="dropdown d-inline mr-2">
                                                        <a style="color: #3875d7" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <?= lang('Users.text.status_change') ?>
                                                        </a>
                                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                            <a style="color: green"  class="dropdown-item status-change" data-status="<?= STATUS_ACTIVE ?>" data-url="<?= base_url(route_to('admin_category_status')); ?>" href="javascript:void(0)">Aktife Al</a>
                                                            <a style="color: red"  class="dropdown-item status-change" data-status="<?= STATUS_PASSIVE ?>" data-url="<?= base_url(route_to('admin_category_status')); ?>" href="javascript:void(0)">Pasife Al</a>
                                                        </div>
                                                    </div>
                                                    <div class="bullet"></div>
                                                    <a href="javascript:void(0)" data-url="<?= base_url(route_to('admin_category_delete')); ?>" class="text-danger delete">Sil</a>
                                                </div>
                                            <?php } ?>
                                        </td>
                                        <td><?= lang('Blog'); ?></td>
                                        <td><?= $category->getParentId() ? $category->withParent()->getTitle() : 'Yok'; ?></td>
                                        <td><?= $category->withUser()->getFullName(); ?></td>
                                        <td><?= $category->getCreatedAt(); ?></td>
                                        <td>
                                            <div style="<?= $category->getStatus() != STATUS_ACTIVE  ? 'display: none' : '' ?>" class="badge badge-status badge-status-active badge-success">Aktif</div>
                                            <div style="<?= $category->getStatus() != STATUS_PASSIVE ? 'display: none' : '' ?>" class="badge badge-status badge-status-passive badge-danger">Pasif</div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $this->endSection(); ?>

<?php $this->section('script');?>
<script>
    $("input[name=dateFilter]").val('<?= $dateFilter ?>');
    $("select[name=perPage]").val('<?= $perPage ?>')
</script>
<?php $this->endSection();?>
