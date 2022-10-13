$(document).on('click', '.language-select', function (){
    $('.language-select').removeClass('active');
    $(this).addClass('active');

    let lang = $(this).data('lang');
    let url = $(this).data('url');

    bo_request.post(url, {lang: lang}, function (response){
        if(response.status){
            $('#folder_list').html(response.view);
        }
    }, false);
});