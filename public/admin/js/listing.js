$('.status-change').click(function (){
   let id = $(this).closest('tr').data('id');
   let url = $(this).data('url');
   let status = $(this).attr('data-status');

   bo_request.post(url, {id: id, status: status}, function (response){
      if(response.status){
         let container = $('.custom-table').find('[data-id="'+id+'"]');
         container.find('.badge-status').hide();
         container.find('.badge-status-' + status.toLowerCase()).show();
      }
   });
});

$('.all-status-change').click(function (){
   let url = $(this).data('url');
   let status = $(this).data('status');
   let list = $('.custom-table input:checkbox:checked').map(function (){
      return $(this).data('id');
   }).get();

   bo_request.post(url, {id: list, status: status}, function (response){
      if(response.status){
         $.each(list, function (index, item){
            let container = $('.custom-table').find('[data-id="'+item+'"]');
            container.find('.badge-status').hide();
            container.find('.badge-status-' + status.toLowerCase()).show();
         })
      }
   });
});

$('.delete').click(function (){
   let id = $(this).closest('tr').data('id');
   let url = $(this).data('url');

   bo_request.post(url, {id: id}, function (response){
      if (response.status){
         $('tr[data-id='+id+']').remove();
      }
   })
});

$('.all-delete').click(function () {

   let url = $(this).data('url');
   let userList = $('.custom-table input:checkbox:checked').map(function (){
      return $(this).data('id');
   }).get();

   bo_request.post(url, {id: userList}, function (response){
      if(response.status){
         location.reload();
      }
   });
})

$('.undo-delete').click(function (){
   let id = $(this).closest('tr').data('id');
   let url = $(this).data('url');

   bo_request.post(url, {id: id}, function (response){
      if (response.status){
         $('tr[data-id='+id+']').remove();
      }
   })
});

$('.all-undo-delete').click(function () {

   let url = $(this).data('url');
   let userList = $('.custom-table input:checkbox:checked').map(function (){
      return $(this).data('id');
   }).get();

   bo_request.post(url, {id: userList}, function (response){
      if(response.status){
         location.reload();
      }
   });
})

$('.purge-delete').click(function (){
      swal({
      ...purgeDelete,
      icon: 'warning',
      buttons: true,
      dangerMode: true,

   }).then((willDelete) => {
          if (willDelete) {
             let id = $(this).closest('tr').data('id');
             let url = $(this).data('url');

             bo_request.post(url, {id: id}, function (response){
                if (response.status){
                  $('tr[data-id='+id+']').remove();
                }
             })
          }
      });
   });

$('.all-purge-delete').click(function () {
   swal({
      ...purgeDelete,
      icon: 'warning',
      buttons: true,
      dangerMode: true,
   })
       .then((willDelete) => {
          if (willDelete) {
             let url = $(this).data('url');
             let userList = $('.custom-table input:checkbox:checked').map(function (){
                return $(this).data('id');
             }).get();

             bo_request.post(url, {id: userList}, function (response){
                if(response.status){
                   location.reload();
                }
             });
          }
       });
   });

$('.default-change').click(function (){
   let id = $(this).closest('tr').data('id');
   let url = $(this).data('url');

   bo_request.post(url, {id: id}, function (response){
      if (response.status){
         $('.badge-default').hide();
         $('.badge-default-' + response.default).show();
      }
   })
});

$('.daterange-cus').daterangepicker({
   locale: {
      format: 'YYYY/MM/DD HH:mm:ss',
      cancelLabel: 'Temizle'
   },
   drops: 'left',
   opens: 'left',
   timePicker:true,
   timePicker24Hour:true,
});

$('.date_filter_clear').click(function() {
   $('input[name=dateFilter]').val('');

})
