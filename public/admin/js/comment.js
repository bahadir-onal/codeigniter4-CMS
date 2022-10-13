$(document).on('click', '.comment-status-change', function (e){
    let id = $(this).closest('li').data('id');
    let url = $(this).data('url');
    let status = $(this).attr('data-status');

    bo_request.post(url, {id: id, status: status}, function (response){
        if(response.status){
            let container = $('.comment-'+id);
            container.find('.comment-status').hide();
            container.find('.comment-status-' + status.toLowerCase()).show();
        }
    });
});

$(document).on('click', '.comment-delete', function (e){
    let id = $(this).closest('li').data('id');
    let url = $(this).data('url');

    bo_request.post(url, {id: id}, function (response){
        if(response.status){
            $('li[data-id='+id+']').remove();
        }
    })
});

$(document).on('click', '.comment-undo-delete', function (e){
    let id = $(this).closest('li').data('id');
    let url = $(this).data('url');

    bo_request.post(url, {id: id}, function (response){
        if (response.status){
            $('li[data-id='+id+']').remove();
        }
    })
});

$(document).on('click', '.comment-purge-delete', function (e){

    swal({
        ...purgeDelete,
        icon: 'warning',
        buttons: true,
        dangerMode: true,

    }).then((willDelete) => {
        if (willDelete) {
            let id = $(this).closest('li').data('id');
            let url = $(this).data('url');

            bo_request.post(url, {id: id}, function (response){
                if (response.status){
                    $('li[data-id='+id+']').remove();
                }
            })
        }
    });
});

$(document).on('click', '.comment-reply-show', function (e){
    let id = $(this).closest('li').data('id');
    let url = $(this).data('url');

    bo_request.get(url, {id: id}, function (response){
        $('.comment-reply-content').html(response);
        $("#comment-reply-modal").modal("show");
    }, false)
});

$(document).on('click', '.comment-reply-send', function (e){
    let container = $('.comment-reply-content');
    let id = container.find('#comment_id').val();
    let reply = container.find('#reply').val();
    let level = $('li[data-id='+id+']').data('level');
    let url = $(this).data('url');

    bo_request.post(url, {id: id, reply: reply, level: level}, function (response){
        if (response.status){
            $('li[data-id='+id+']').after(response.comment);
            $("#comment-reply-modal").modal("hide");
        }
    })
});