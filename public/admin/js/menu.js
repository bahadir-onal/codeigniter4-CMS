$(document).ready(function()  {
    var updateOutput = function(e) {
        var list   = e.length ? e : $(e.target);
        var output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };

    $('#menu-list').nestable({}).on('change', updateOutput);
    updateOutput($('#menu-list').data('output', $('#menu-list-output')));

    $(document).on('change', '.menu-type', function (){
        let select_type = $(this).val();
        $('.area').hide();
        $('.module-select-item').hide();
        if (select_type == 'category' || select_type == 'content'){
            $('.module-area').show();
        } else if (select_type == 'custom'){
            $('.custom-area').show();
        }
    });

    $(document).on('change', '.menu-module', function (){
        let select_module = $(this).val();
        let select_type = $('.menu-type').val();
        let url = $(this).data('url');

        bo_request.post(url, {
            module: select_module,
            type: select_type
        }, function (response){
            if (response.status){
                $('.module-'+response.type).html(response.data);
                $('#module-'+response.type+'-area').show();
            }

        })
    });

    $(document).on('click', '.menu-item-add', function (){
        let select_type = $('.menu-type').val();
        if (select_type == 'category' || select_type == 'content'){
            addItem(select_type);
        } else if (select_type == 'custom'){
            addCustomItem(select_type);
        }
        updateOutput($('#menu-list').data('output', $('#menu-list-output')));
    })

    $(document).on('click', '.menu-item-delete', function (){
        $(this).closest('li').remove();
        updateOutput($('#menu-list').data('output', $('#menu-list-output')));
    })

    function addItem(type){
        let id = $('.module-'+type+' option:selected').val();
        let title = $('.module-'+type+' option:selected').data('title');
        let item = $('.item-clone').clone();
        $(item).attr('data-id', id)
        $(item).attr('data-module', type)
        $(item).find('.item-title').text(title);
        $(item).removeClass('item-clone');
        $(item).show();
        $('#menu-item').append(item);
    }

    function addCustomItem(select_type){
        let item = $('.item-clone').clone();
        let default_title = "";

        $('.custom-area').find('.custom-title').each(function (i){
            let value = $(this).val();
            let lang = $(this).data('lang');
            if (i == 0)
                default_title = value

            $(item).attr('data-'+lang+'-title', value);
        });

        $('.custom-area').find('.custom-url').each(function (i){
            let value = $(this).val();
            let lang = $(this).data('lang');

            $(item).attr('data-'+lang+'-url', value)
        });
        $(item).find('.item-title').text(default_title);
        $(item).removeClass('item-clone');
        $('#menu-item').append(item);
        $(item).show();
    }

});

