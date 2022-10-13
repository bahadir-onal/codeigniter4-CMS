<?php $this->extend('admin/layout/main'); ?>

<?php $segment = service('request')->uri->getSegment(5); ?>

<?php $this->section('content'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Blog Yazıları</h1>
            <div class="section-header-breadcrumb">
                <a href="<?= base_url(route_to('admin_blog_create')) ?>" class="btn btn-primary">Yeni Yazı Ekle</a>
            </div>
        </div>
        <?= $this->include('admin/layout/partials/errors'); ?>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link <?= empty($segment) ? 'active' : '' ?>" href="<?= base_url(route_to('admin_blog_listing','')) ?>">Hepsi <span class="badge badge-<?= empty($segment) ? 'white' : 'primary' ?>"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $segment == 'active' ? 'active' : '' ?>" href="<?= base_url(route_to('admin_blog_listing','/active')) ?>">Aktif <span class="badge badge-<?= $segment == 'active' ? 'white' : 'primary' ?>"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $segment == 'passive' ? 'active' : '' ?>" href="<?= base_url(route_to('admin_blog_listing','/passive')) ?>">Pasif <span class="badge badge-<?= $segment == 'passive' ? 'white' : 'primary' ?>"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $segment == 'pending' ? 'active' : '' ?>" href="<?= base_url(route_to('admin_blog_listing','/pending')) ?>">Beklemede <span class="badge badge-<?= $segment == 'pending' ? 'white' : 'primary' ?>"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $segment == 'delete' ? 'active' : '' ?>" href="<?= base_url(route_to('admin_blog_listing','/deleted')) ?>">Silinmiş <span class="badge badge-<?= $segment == 'delete' ? 'white' : 'primary' ?>"></span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card">
                <form action="<?= current_url(); ?>" method="get">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="user" class="form-control select2">
                                    <option value="">Kullanıcı Seç</option>
                                    <?php foreach ($users as $value){ ?>
                                        <option <?= $user == $value->id ? 'selected' : ''; ?> value="<?= $value->id ?>"><?= $value->getFullName(); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="category" class="form-control select2">
                                    <option value="">Kategori Seç</option>
                                    <?php foreach ($categories as $value){ ?>
                                        <option <?= $category == $value->id ? 'selected' : ''; ?> value="<?= $value->id ?>"><?= $value->getTitle(); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
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
                        <div class="col-md-3">
                            <div class="input-group">
                                <input value="" name="search" type="text" class="form-control" placeholder="Ara...">
                                <div class="input-group-append" style="height: 42px;">
                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                        <div class="float-left">
                            <div class="row">
                                <div class="dropdown d-inline mr-2">
                                    <button class="btn btn-primary btn-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        İşlem
                                    </button>
                                    <div class="dropdown-menu">
                                        <?php if ($segment != 'deleted') { ?>
                                            <a class="dropdown-item all-delete" data-url="<?= base_url(route_to('admin_blog_delete')); ?>" href="javascript:void(0)">Sil</a>
                                            <a class="dropdown-item all-status-change" data-status="<?= STATUS_ACTIVE ?>" data-url="<?= base_url(route_to('admin_blog_status')); ?>" href="javascript:void(0)">Aktife Al</a>
                                            <a class="dropdown-item all-status-change" data-status="<?= STATUS_PASSIVE ?>" data-url="<?= base_url(route_to('admin_blog_status')); ?>" href="javascript:void(0)">Pasife Al</a>
                                            <a class="dropdown-item all-status-change" data-status="<?= STATUS_PENDING ?>" data-url="<?= base_url(route_to('admin_blog_status')); ?>" href="javascript:void(0)">Beklemeye Al</a>
                                        <?php } else { ?>
                                            <a class="dropdown-item all-undo-delete" data-url="<?= base_url(route_to('admin_blog_undo_delete')); ?>" href="javascript:void(0)">Geri Al</a>
                                            <a class="dropdown-item all-purge-delete" data-url="<?= base_url(route_to('admin_blog_purge_delete')); ?>" href="javascript:void(0)">Kalıcı Olarak Sil</a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select name="perPage" class="form-control">
                                        <option value="">İçerik Sayısı</option>
                                        <?php foreach (config('system')->perPageList as $per) { ?>
                                            <option value="<?= $per ?>"><?= $per ?></option>
                                        <?php } ?>
                                    </select>
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
                                <th>Yazar</th>
                                <th>Kategori</th>
                                <th>Okunma</th>
                                <th>Oluşturma Tarihi</th>
                                <th>Durum</th>
                            </tr>
                            <?php foreach ($blogs as $blog) { ?>
                                <tr data-id="<?= $blog->id; ?>">
                                    <td>
                                        <div class="custom-checkbox custom-control">
                                            <input data-id="<?= $blog->id; ?>" type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $blog->id; ?>">
                                            <label for="checkbox-<?= $blog->id; ?>" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td>
                                        <?= $blog->getTitle(); ?>
                                        <?php if ($segment == 'deleted'){ ?>
                                            <div class="table-links">
                                                <div class="bullet"></div>
                                                <a data-url="<?= base_url(route_to('admin_blog_undo_delete')); ?>" class="text-success undo-delete" href="javascript:void(0)">Geri Al</a>
                                                <div class="bullet"></div>
                                                <a class="text-danger purge-delete" data-url="<?= base_url(route_to('admin_blog_purge_delete')); ?>" href="javascript:void(0)">Kalıcı Olarak Sil</a>
                                            </div>
                                        <?php } else { ?>
                                            <div class="table-links">
                                                <div class="bullet"></div>
                                                <a href="<?=base_url(route_to('admin_blog_edit', $blog->id)); ?>">Düzenle</a>
                                                <div class="bullet"></div>


                                                <div class="dropdown d-inline mr-2">
                                                    <a style="color: #3875d7" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <?= lang('Users.text.status_change') ?>
                                                    </a>
                                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                        <a style="color: green"  class="dropdown-item status-change" data-status="<?= STATUS_ACTIVE ?>" data-url="<?= base_url(route_to('admin_blog_status')); ?>" href="javascript:void(0)">Aktife Al</a>
                                                        <a style="color: red"  class="dropdown-item status-change" data-status="<?= STATUS_PASSIVE ?>" data-url="<?= base_url(route_to('admin_blog_status')); ?>" href="javascript:void(0)">Pasife Al</a>
                                                        <a style="color: #ff9b00" class="dropdown-item status-change" data-status="<?= STATUS_PENDING ?>" data-url="<?= base_url(route_to('admin_blog_status')); ?>" href="javascript:void(0)">Beklemeye Al</a>
                                                    </div>
                                                </div>
                                                <div class="bullet"></div>
                                                <a href="javascript:void(0)" data-url="<?= base_url(route_to('admin_blog_delete')); ?>" class="text-danger delete">Sil</a>
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td><?= $blog->withUser()->getFullName(); ?></td>
                                    <td>
                                        <div class="card-body">
                                            <span class="d-inline-block" data-toggle="popover" title="Yazı Kategorileri"
                                                  data-content="<?php foreach ($blog->withCategories() as $blog_category){ ?>
                                                                <?= $blog_category->getTitle(); ?> |
                                                                <?php } ?>">
                                              <button class="btn btn-primary pe-none btn-sm" type="button" disabled>Görüntüle</button>
                                            </span>
                                        </div>
                                    </td>
                                    <td><?= $blog->getViews(); ?></td>
                                    <td><?= $blog->getCreatedAt(); ?></td>
                                    <td>
                                        <div style="<?= $blog->getStatus() != STATUS_ACTIVE  ? 'display: none' : '' ?>" class="badge badge-status badge-status-active badge-success">Aktif</div>
                                        <div style="<?= $blog->getStatus() != STATUS_PASSIVE ? 'display: none' : '' ?>" class="badge badge-status badge-status-passive badge-danger">Pasif</div>
                                        <div style="<?= $blog->getStatus() != STATUS_PENDING ? 'display: none' : '' ?>" class="badge badge-status badge-status-pending badge-warning">Beklemede</div>
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
