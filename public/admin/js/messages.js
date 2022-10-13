$(document).on('click', '.message-list-item', function (){
    $('.message-list-item').removeClass('active');
    $(this).addClass('active');
    $(this).find('span').css('font-weight', 'normal');
    let url = $(this).data('url');
    let id = $(this).data('id');

    getDetail(url, id);

});

$(document).on('click', '.message-mark-all-read', function () {
    let url = $(this).data('url')

    bo_request.post(url, {}, function (response){
        if (response.status){
            $('.navbar-message-list').html("");
        }
    })
})

$(document).on('click', '.message-send', function (){
    let url = $(this).data('url');
    let refresh = $(this).data('refresh');
    let id = $(this).data('id');

    bo_request.post(url, {
        id: id,
        reply: CKEDITOR.instances.replyTextarea.getData()
    }, function (response){

        if (response.status){
            getDetail(refresh, id);
        }
    })
});

$('.message-item-area').hover(function (){
        $('.message-delete').show();
        $('.message-purge-delete').show();
        $('.message-undo-delete').show();
}, function (){
        $('.message-delete').hide();
        $('.message-purge-delete').hide();
        $('.message-undo-delete').hide();
    })

$(document).on('click', '.message-delete', function (){
    let id = $(this).data('id');
    let url = $(this).data('url')

    bo_request.post(url, {id: id}, function (response){
        if (response.status){
            $('.message-list-item[data-id='+id+']').remove();
        }
    })
});

$(document).on('click', '.message-undo-delete', function (){
    let id = $(this).data('id');
    let url = $(this).data('url')

    bo_request.post(url, {id: id}, function (response){
        if (response.status){
            $('.message-list-item[data-id='+id+']').remove();
        }
    })
});

$('.message-purge-delete').click(function (){
    swal({
        ...purgeDelete,
        icon: 'warning',
        buttons: true,
        dangerMode: true,

    }).then((willDelete) => {
        if (willDelete) {
            let id = $(this).data('id');
            let url = $(this).data('url')

            bo_request.post(url, {id: id}, function (response){
                if (response.status){
                    $('.message-list-item[data-id='+id+']').remove();
                }
            })
        }
    });
});


function getDetail(url, id){
    bo_request.post(url, {
        id: id
    }, function (response){
        if (response.status){
            $('.message-detail').html(response.data);
        }
    })
}

setInterval(function (){
    bo_request.get(admin_message_listing, {}, function (response){
        if (response.status){
            if (response.length){
                $('.message-toggle').addClass('beep');
            } else {
                $('.message-toggle').removeClass('beep');
            }
            $('.navbar-message-list').html(response.data)
        }
    }, false)
}, 3000)