function AjaxReq() {
    this.data = {
        csrf_test_name: $('meta[name=X-CSRF-TOKEN]').attr('content')
    };
}

AjaxReq.prototype.post = function (url, data, callback, notify = true){
    $.ajax(url, {
        type: 'POST',
        data: {
            ...this.data,
            ...data
        },
        success: function (response) {
            if (notify){
                if(response.status){
                    iziToast.success({message: response.message, position: 'topRight'});
                }else{
                    iziToast.error({message: response.message, position: 'topRight'});
                }
            }
            callback(response)
        },
        error: function (xhr, opt, error){
            iziToast.error({message: error, position: 'topRight'});
            callback({
                status: false,
                message: error
            })
        }
    });
}

AjaxReq.prototype.get = function (url, data, callback, notify = true){
    $.ajax(url, {
        type: 'GET',
        data: {
            ...this.data,
            ...data
        },
        success: function (response) {
            if (notify){
                if(response.status){
                    iziToast.success({message: response.message, position: 'topRight'});
                }else{
                    iziToast.error({message: response.message, position: 'topRight'});
                }
            }
            callback(response)
        },
        error: function (xhr, opt, error){
            iziToast.error({message: error, position: 'topRight'});
            callback({
                status: false,
                message: error
            })
        }
    });
}

let bo_request = new AjaxReq();