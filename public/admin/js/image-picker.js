$('.single-image-picker').fireModal({
    size: 'modal-lg single-image-picker-modal',
    body: '',
    title: imagePickerModal.title.single,
    bodyClass: 'single-image-picker-modal-body',
    created: function(modal) {
        $.ajax($(this).data('url'), {
            method: 'GET',
            data: {
                src: $(this).data('src'),
                input: $(this).data('input')
            },
            success: function (response){
                modal.find('.modal-body').html(response);
            }
        });
        modal.find('.modal-footer').prepend('<div class="mr-auto">' +
            '<div class="form-group">\n' +
            '<div class="input-group">\n' +
            '<input type="text" class="form-control single-image-url" style="width: 400px;" id="single-image-url" placeholder="" aria-label="">\n' +
            '<div class="input-group-append">\n' +
            '<button class="btn btn-primary single-image-url-copy" type="button">Kopyala</button>\n' +
            '</div>\n' +
            '</div>\n' +
            '</div>'+
            '</div>');
    },
    buttons: [
        {
            text: imagePickerModal.buttonText.single,
            submit: true,
            class: 'btn btn-primary btn-shadow',
            handler: function(modal) {
                let selectImage = modal.find('input:radio:checked');
                let imageID = selectImage.data('id');
                let imageSRC = selectImage.data('src');
                modal.modal('hide');

                let src = modal.find('#single-modal-attribute').data('src');
                let input = modal.find('#single-modal-attribute').data('input');

                $('#'+input).val(imageID);
                $('#'+src).attr('src', imageSRC);
            }
        }
    ]
});



$('.multi-image-picker').fireModal({
    size: 'modal-lg multi-image-picker-modal',
    body: '',
    title: imagePickerModal.title.multi,
    bodyClass: 'multi-image-picker-modal-body',
    created: function(modal) {
        $.ajax($(this).data('url'), {
            method: 'GET',
            data: {
                input: $(this).data('input'),
                area: $(this).data('area')
            },
            success: function (response){
                modal.find('.modal-body').html(response);
            }
        })
    },
    buttons: [
        {
            text: imagePickerModal.buttonText.multi,
            submit: true,
            class: 'btn btn-primary btn-shadow',
            handler: function(modal) {
                let idList = modal.find('input:checked:checked').map(function (){
                    return $(this).data('id');
                }).get();
                let srcList = modal.find('input:checked:checked').map(function (){
                    return $(this).data('src');
                }).get();
                modal.modal('hide');

                let area = modal.find('#multi-modal-attribute').data('area');
                let inputName = modal.find('#multi-modal-attribute').data('input');
                let input = '';
                $.each(idList, function (index, item){
                    input = input + '<div class="col-6 col-sm-3">\n' +
                        '<label class="mb-4">\n' +
                        '<input type="hidden" name="'+inputName+'[]" value="'+item+'">'+
                        '<img src="'+srcList[index]+'" class="imagecheck-image">\n' +
                        '</label>\n' +
                        '</div>';
                });

                $('#'+area).prepend(input);
            }
        }
    ]
})
$(document).on('change', 'input[name=imagecheck]', function (){
    let url = $(this).data('src');
    $('.single-image-url').val(url);
});

$(document).on('click', '.single-image-url-copy', function (){
    let copyText = document.getElementById("single-image-url");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    document.execCommand("copy");
});