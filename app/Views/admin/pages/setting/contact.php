<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>İletişim Bilgileri</h1>
                <div class="section-header-breadcrumb">
                    <a href="javascript:void(0)" class="btn btn-primary new-field" data-url="<?= base_url(route_to("admin_field_add")); ?>" data-type="office" style="margin-right: 7px;">Yeni Ofis Ekle</a>
                </div>
            </div>

            <?= $this->include('admin/layout/partials/errors'); ?>

            <div class="section-body">
                <form action="<?= current_url(); ?>" method="post">
                    <?= csrf_field() ?>
                    <div id="custom-field">
                        <?php foreach ($setting->getValue() as $key => $value) { ?>
                        <div class="card">
                            <div class="card-header">
                                <h4><?= $value->name ?> - Ofis Bilgileri</h4>
                                <div class="card-header-action">
                                    <a data-collapse="#<?= $key ?>" class="btn btn-icon btn-primary" href="#">
                                        <i class="fas fa-minus"></i>
                                    </a>
                                </div>
                                <div class="card-header-action">
                                    <a class="btn btn-icon btn-danger office-remove" href="javascript:void(0)">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse show" id="<?= $key ?>">
                                <div class="card-body">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Ofis Adı</label>
                                        <div class="col-sm-12 col-md-8">
                                            <input style="border-color: #3875d7" value="<?= $value->name ?>" name="contact[<?= $key ?>][name]" placeholder="Ofis Adı" type="text" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Ofis Adresi</label>
                                        <div class="col-sm-12 col-md-8">
                                            <input style="border-color: #3875d7" value="<?= $value->address ?>" name="contact[<?= $key ?>][address]" placeholder="Ofis Adresi" type="text" class="form-control" required>
                                        </div>
                                    </div>

                                    <div id="contact-phone-area">
                                        <?php $p = 0; ?>
                                        <?php foreach ($value->phones as $kphone => $phone) { ?>
                                            <div class="form-group row mb-4 phone-field">
                                                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Telefon Numarası</label>
                                                <div class="col-sm-6 col-md-4">
                                                    <input style="border-color: #3875d7" value="<?= $phone->name ?>" name="contact[<?= $key ?>][phones][<?= $kphone ?>][name]" placeholder="İsimlendir" type="text" class="form-control" required>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <input style="border-color: #3875d7" value="<?= $phone->number ?>" name="contact[<?= $key ?>][phones][<?= $kphone ?>][number]" placeholder="Telefon Numarası" type="text" class="form-control" required>
                                                </div>
                                                <?php if ($p == 0){ ?>
                                                    <div class="col-sm-6 col-md-2">
                                                        <a href="javascript:void(0);" data-name="<?= $key ?>" class="btn btn-icon btn-primary contact-phone-add"><i class="fas fa-plus"></i></a>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="col-sm-6 col-md-2">
                                                        <a href="javascript:void(0);" class="btn btn-icon btn-danger contact-phone-remove"><i class="fas fa-minus"></i></a>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php $p++; ?>
                                        <?php } ?>
                                    </div>

                                        <div id="contact-email-area">
                                            <?php $e = 0; ?>
                                            <?php foreach ($value->emails as $kemail => $email) { ?>
                                                <div class="form-group row mb-4 email-field">
                                                    <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">E-Mail Adresi</label>
                                                    <div class="col-sm-12 col-md-4">
                                                        <input style="border-color: #3875d7" value="<?= $email->name ?>" name="contact[<?= $key ?>][emails][<?= $kemail ?>][name]" placeholder="İsimlendir" type="text" class="form-control" required>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4">
                                                        <input style="border-color: #3875d7" value="<?= $email->email ?>" name="contact[<?= $key ?>][emails][<?= $kemail ?>][email]" placeholder="E-Mail Adresi" type="text" class="form-control" required>
                                                    </div>
                                                    <?php if ($e == 0){ ?>
                                                        <div class="col-sm-6 col-md-2">
                                                            <a href="javascript:void(0);" data-name="<?= $key ?>" class="btn btn-icon btn-primary contact-email-add"><i class="fas fa-plus"></i></a>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="col-sm-6 col-md-2">
                                                            <a href="javascript:void(0);" class="btn btn-icon btn-danger contact-email-remove"><i class="fas fa-minus"></i></a>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            <?php $e++; ?>
                                            <?php } ?>
                                        </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Faks Numarası</label>
                                        <div class="col-sm-12 col-md-8">
                                            <input style="border-color: #3875d7" value="<?= $value->fax ?>" name="contact[<?= $key ?>][fax]" placeholder="Faks Numarası" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Google Harita</label>
                                        <div class="col-sm-12 col-md-8">
                                            <textarea style="border-color: #3875d7; height: 200px;" name="contact[<?= $key ?>][map]" class="form-control"><?= $value->map ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Kaydet</button>
                    </div>
                </form>
            </div>
        </section>
    </div>

        <div class="form-group row mb-4 phone-field" id="contact-phone-field" style="display: none">
            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Telefon Numarası</label>
            <div class="col-sm-6 col-md-4">
                <input style="border-color: #3875d7" name="contact[office][phones][phone][name]" id="phone-name" placeholder="İsimlendir" type="text" class="form-control" required>
            </div>
            <div class="col-sm-6 col-md-4">
                <input style="border-color: #3875d7" name="contact[office][phones][phone][number]" id="phone-number" placeholder="Telefon Numarası" type="text" class="form-control" required>
            </div>
            <div class="col-sm-6 col-md-2">
                <a href="javascript:void(0);" class="btn btn-icon btn-danger contact-phone-remove"><i class="fas fa-minus"></i></a>
            </div>
        </div>
        <div class="form-group row mb-4 email-field" id="contact-email-field" style="display: none">
            <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">E-Mail Adresi</label>
            <div class="col-sm-12 col-md-4">
                <input style="border-color: #3875d7" name="contact[office][emails][email][name]" id="email-name" placeholder="İsimlendir" type="text" class="form-control" required>
            </div>
            <div class="col-sm-12 col-md-4">
                <input style="border-color: #3875d7" name="contact[office][emails][email][email]" id="email-email" placeholder="E-Mail Adresi" type="text" class="form-control" required>
            </div>
            <div class="col-sm-6 col-md-2">
                <a href="javascript:void(0);" class="btn btn-icon btn-danger contact-email-remove"><i class="fas fa-minus"></i></a>
            </div>
        </div>
<?php $this->endSection(); ?>