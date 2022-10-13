$(document).on('click', '.field-remove', function (){
    $(this).closest('.custom-field').remove();
})

$('.new-field').click(function (){
    let type = $(this).data('type')
    let url = $(this).data('url')

    bo_request.get(url, {type: type}, function (response){
        $('#custom-field').append(response.view)
    });
})