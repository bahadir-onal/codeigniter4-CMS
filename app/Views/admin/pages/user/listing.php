<?php $this->extend('admin/layout/main'); ?>

<?php $segment = service('request')->uri->getSegment(5); ?>

<?php $this->section('content'); ?>

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?= bo_admin_translate('Users','title') ?></h1>
                <div class="section-header-breadcrumb">
                    <a href="<?= base_url(route_to('admin_users_create')) ?>" class="btn btn-primary"><?= bo_admin_translate('Users','create') ?></a>
                </div>
            </div>
            <div class="section-body">


                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link <?= empty($segment) ? 'active' : '' ?>" href="<?= base_url(route_to('admin_users_listing','')) ?>"><?= bo_admin_translate('Users','all') ?><span class="badge badge-<?= empty($segment) ? 'white' : 'primary' ?>"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $segment == 'active' ? 'active' : '' ?>" href="<?= base_url(route_to('admin_users_listing','/active')) ?>"><?= bo_admin_translate('Users','active') ?> <span class="badge badge-<?= $segment == 'active' ? 'white' : 'primary' ?>"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $segment == 'pending' ? 'active' : '' ?>" href="<?= base_url(route_to('admin_users_listing','/pending')) ?>"><?= bo_admin_translate('Users','pending') ?> <span class="badge badge-<?= $segment == 'pending' ? 'white' : 'primary' ?>"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $segment == 'passive' ? 'active' : '' ?>" href="<?= base_url(route_to('admin_users_listing','/passive')) ?>"><?= bo_admin_translate('Users','passive') ?> <span class="badge badge-<?= $segment == 'passive' ? 'white' : 'primary' ?>"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $segment == 'delete' ? 'active' : '' ?>" href="<?= base_url(route_to('admin_users_listing','/deleted')) ?>"><?= bo_admin_translate('Users','deleted') ?> <span class="badge badge-<?= $segment == 'delete' ? 'white' : 'primary' ?>"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form action="<?= current_url() ?>">
                            <div class="float-left">
                                <div class="row ml-3">
                                    <div class="dropdown d-inline mr-2">
                                        <button class="btn btn-primary btn-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?= bo_admin_translate('Users','actions') ?>
                                        </button>
                                        <div class="dropdown-menu">
                                            <?php if ($segment != 'deleted') { ?>
                                                <a class="dropdown-item all-delete" data-url="<?= base_url(route_to('admin_users_delete')) ?>" href="javascript:void(0)"><?= bo_admin_translate('Users','delete') ?></a>
                                                <a class="dropdown-item all-status-change" data-status="<?= STATUS_ACTIVE ?>" data-url="<?= base_url(route_to('admin_users_status')) ?>" href="javascript:void(0)"><?= bo_admin_translate('Users','select_active') ?></a>
                                                <a class="dropdown-item all-status-change" data-status="<?= STATUS_PASSIVE ?>" data-url="<?= base_url(route_to('admin_users_status')) ?>" href="javascript:void(0)"><?= bo_admin_translate('Users','select_passive') ?></a>
                                                <a class="dropdown-item all-status-change" data-status="<?= STATUS_PENDING ?>" data-url="<?= base_url(route_to('admin_users_status')) ?>" href="javascript:void(0)"><?= bo_admin_translate('Users','select_pending') ?></a>
                                            <?php } else { ?>
                                                <a class="dropdown-item all-undo-delete" data-url="<?= base_url(route_to('admin_users_undo_delete')) ?>" href="javascript:void(0)"><?= bo_admin_translate('Users','undo_delete') ?></a>
                                                <a class="dropdown-item all-purge-delete" data-url="<?= base_url(route_to('admin_users_purge_delete')) ?>" href="javascript:void(0)"><?= bo_admin_translate('Users','purge_delete') ?></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <select name="perPage" class="form-control">
                                            <option value=""><?= bo_admin_translate('Users','page_number') ?></option>
                                            <?php foreach (config('system')->perPageList as $per) { ?>
                                                <option value="<?= $per ?>"><?= $per ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="group" class="form-control">
                                            <option value=""><?= bo_admin_translate('Input','group_select') ?></option>
                                            <?php foreach ($groups as $group){ ?>
                                                <option value="<?= $group->id ?>"><?= $group->getTitle(); ?></option>
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
                                            <input value="<?= $dateFilter ?>" name="dateFilter" placeholder="<?= bo_admin_translate('Users','date_filter_placeholder') ?>" type="text" class="form-control daterange-cus">
                                            <div class="input-group-append" style="height: 42px;">
                                                <button type="button" class="btn btn-light date_filter_clear"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group col">
                                        <input value="<?= $search ?>" name="search" type="text" class="form-control" placeholder="<?= bo_admin_translate('Users','search_placeholder') ?>">
                                        <div class="input-group-append" style="height: 42px;">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

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
                                <th><?= bo_admin_translate('Input','full_name') ?></th>
                                <th><?= bo_admin_translate('Input','email') ?></th>
                                <th><?= bo_admin_translate('Users','group_name') ?></th>
                                <th><?= bo_admin_translate('Users','created_at') ?></th>
                                <th><?= bo_admin_translate('Users','status') ?></th>
                            </tr>
                            <?php foreach ($users as $key => $user) { ?>
                                <tr data-id="<?= $user->id; ?>">
                                    <td>
                                        <div class="custom-checkbox custom-control">
                                            <input data-id="<?= $user->id ?>" type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?= $user->id ?>">
                                            <label for="checkbox-<?= $user->id ?>" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td><?= $user->getFullName(); ?>
                                        <?php if ($segment == 'deleted'){ ?>
                                            <div class="table-links">
                                                <div class="bullet"></div>
                                                <a data-url="<?= base_url(route_to('admin_users_undo_delete')) ?>" class="text-success undo-delete" href="javascript:void(0)"><?= bo_admin_translate('Users','undo_delete') ?></a>
                                                <div class="bullet"></div>
                                                <a class="text-danger purge-delete" data-url="<?= base_url(route_to('admin_users_purge_delete')) ?>" href="javascript:void(0)"><?= bo_admin_translate('Users','purge_delete') ?></a>
                                            </div>
                                        <?php } else { ?>
                                            <div class="table-links">
                                                <div class="bullet"></div>
                                                <a href="<?= base_url(route_to('admin_users_edit', $user->id)) ?>"><?= bo_admin_translate('Users','edit') ?></a>
                                                <div class="bullet"></div>


                                                <div class="dropdown d-inline mr-2">
                                                    <a style="color: #3875d7" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <?= bo_admin_translate('Users','status_change') ?>
                                                    </a>
                                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                        <a style="color: green"  class="dropdown-item status-change" data-status="<?= STATUS_ACTIVE ?>" data-url="<?= base_url(route_to('admin_users_status')) ?>" href="javascript:void(0)"><?= bo_admin_translate('Users','select_active') ?></a>
                                                        <a style="color: red"  class="dropdown-item status-change" data-status="<?= STATUS_PASSIVE ?>" data-url="<?= base_url(route_to('admin_users_status')) ?>" href="javascript:void(0)"><?= bo_admin_translate('Users','select_passive') ?></a>
                                                        <a style="color: #f3b31a"  class="dropdown-item status-change" data-status="<?= STATUS_PENDING ?>" data-url="<?= base_url(route_to('admin_users_status')) ?>" href="javascript:void(0)"><?= bo_admin_translate('Users','select_pending') ?></a>
                                                    </div>
                                                </div>
                                                <div class="bullet"></div>
                                                <a href="javascript:void(0)" data-url="<?= base_url(route_to('admin_users_delete')) ?>" class="text-danger delete"><?= bo_admin_translate('Users','delete') ?></a>
                                            </div>
                                        <?php } ?>
                                    </td>

                                    <td style="font-size: 15px;">
                                        <?= $user->getEmail(); ?>
                                    </td>

                                    <td style="font-size: 15px;">
                                        <?= $user->getGroupTitle(); ?>
                                    </td>

                                    <td style="font-size: 13px;"><?= $user->getCreatedAt(); ?></td>

                                    <td>
                                        <div style="<?= $user->getStatus() != STATUS_ACTIVE  ? 'display: none' : '' ?>" class="badge badge-status badge-status-active badge-success"><?= bo_admin_translate('Users','active') ?></div>
                                        <div style="<?= $user->getStatus() != STATUS_PASSIVE ? 'display: none' : '' ?>" class="badge badge-status badge-status-passive badge-danger"><?= bo_admin_translate('Users','passive') ?></div>
                                        <div style="<?= $user->getStatus() != STATUS_PENDING ? 'display: none' : '' ?>" class="badge badge-status badge-status-pending badge-warning"><?= bo_admin_translate('Users','pending') ?></div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <div class="card-footer text-center">
                        <?= $pager->links('default','bocms_pager'); ?>
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

