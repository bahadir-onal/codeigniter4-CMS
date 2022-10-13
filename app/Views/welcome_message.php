<?php $this->extend('admin/layout/main'); ?>

<?php $this->section('content'); ?>

    <section class="section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-md-12 col-sm-12">
                <form action="http://localhost/?file=Errors" method="post">
                    <div class="card">
                        <div class="card-header">
                            <h4><?= lang($file.'.title') ?></h4>
                        </div>
                        <div class="card-body">
                            <?php foreach (lang($file.'.text') as $key => $value){ ?>
                                <div class="form-group">
                                    <label><?= $key; ?></label>
                                    <input value="<?= $value ?>" type="text" class="form-control" name="translate[<?= $key; ?>]">
                                </div>
                            <?php } ?>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <section/>
<?php $this->endSection(); ?>