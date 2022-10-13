<div class="card">
    <div class="card-header">
        <h4>Yeni Ofis Bilgileri</h4>
        <div class="card-header-action">
            <a data-collapse="#<?= $random; ?>" class="btn btn-icon btn-primary" href="#"><i class="fas fa-minus"></i></a>
        </div>
    </div>
    <div class="collapse show" id="<?= $random; ?>">
        <div class="card-body">
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Ofis Adı</label>
                <div class="col-sm-12 col-md-8">
                    <input style="border-color: #3875d7" value="" name="contact[<?= $random ?>][name]" placeholder="Ofis Adı" type="text" class="form-control" required>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Ofis Adresi</label>
                <div class="col-sm-12 col-md-8">
                    <input style="border-color: #3875d7" value="" name="contact[<?= $random ?>][address]" placeholder="Ofis Adresi" type="text" class="form-control" required>
                </div>
            </div>

            <div id="contact-phone-area">
                <div class="form-group row mb-4 phone-field">
                    <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Telefon Numarası</label>
                    <div class="col-sm-6 col-md-4">
                        <input style="border-color: #3875d7" value="" name="contact[<?= $random ?>][phones][phone][name]" placeholder="İsimlendir" type="text" class="form-control" required>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <input style="border-color: #3875d7" value="" name="contact[<?= $random ?>][phones][phone][number]" placeholder="Telefon Numarası" type="text" class="form-control" required>
                    </div>
                    <div class="col-sm-6 col-md-2">
                        <a href="javascript:void(0);" data-name="<?= $random; ?>" class="btn btn-icon btn-primary contact-phone-add"><i class="fas fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <div id="contact-email-area">
                <div class="form-group row mb-4 email-field">
                    <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">E-Mail Adresi</label>
                    <div class="col-sm-12 col-md-4">
                        <input style="border-color: #3875d7" value="" name="contact[<?= $random ?>][emails][email][name]" placeholder="İsimlendir" type="text" class="form-control" required>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <input style="border-color: #3875d7" value="" name="contact[<?= $random ?>][emails][email][email]" placeholder="E-Mail Adresi" type="text" class="form-control" required>
                    </div>
                    <div class="col-sm-6 col-md-2">
                        <a href="javascript:void(0);" data-name="<?= $random; ?>" class="btn btn-icon btn-primary contact-email-add"><i class="fas fa-plus"></i></a>
                    </div>
                </div>
            </div>

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Faks Numarası</label>
                <div class="col-sm-12 col-md-8">
                    <input style="border-color: #3875d7" value="" name="contact[<?= $random ?>][fax]" placeholder="Faks Numarası" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Google Harita</label>
                <div class="col-sm-12 col-md-8">
                    <textarea style="border-color: #3875d7; height: 200px;" name="contact[<?= $random ?>][map]" class="form-control"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
