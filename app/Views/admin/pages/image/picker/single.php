<div class="form-group">
    <form action="<?= base_url(route_to('admin_image_upload')); ?>" id="<?= $divId; ?>" class="dropzone">
        <div class="fallback">
            <input name="file" type="file" multiple />
        </div>
    </form>
    <hr>
    <div class="row gutters-sm" id="single-image-list">
        <?php foreach ($images as $image) { ?>
            <div class="col-6 col-sm-2">
                <label class="imagecheck mb-4">
                    <input data-id="<?= $image->id ?>" data-src="<?= $image->getUrl(); ?>" name="imagecheck" type="radio" value="<?= $image->id ?>" class="imagecheck-input"  />
                    <figure class="imagecheck-figure">
                        <img src="<?= $image->getUrl(); ?>" class="imagecheck-image">
                    </figure>
                </label>
            </div>
        <?php } ?>
    </div>
</div>
<div style="display: none" id="single-modal-attribute" data-src="<?= $srcID; ?>" data-input="<?= $inputID; ?>"></div>

<script>
    Dropzone.autoDiscover = false;
    let <?= $variable; ?> = new Dropzone("#<?= $divId; ?>");
    <?= $variable; ?> .on("complete", function(file) {
        let image = JSON.parse(file.xhr.response);
        if (!image.status){
            iziToast.error({message: image.message.file, position: 'topRight'});
        }else {
            $('#single-image-list').prepend('<div class="col-6 col-sm-2">\n' +
                ' <label class="imagecheck mb-4">\n' +
                '  <input data-id="'+image.id+'" data-src="'+image.src+'" name="imagecheck" type="radio" value="6" class="imagecheck-input"  />\n' +
                '  <figure class="imagecheck-figure">\n' +
                '  <img src="'+image.src+'" alt="" class="imagecheck-image">\n' +
                ' </figure>\n' +
                ' </label>\n' +
                ' </div>');
        }
    });
</script>