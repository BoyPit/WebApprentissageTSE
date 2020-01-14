$(".acceptModal").on('click', function () {

    let tempid = $(this).data("contratid");

    if(tempid !== 'undefined')
    {
        $.ajax({
            url:"/ajaxupdatecontrat",
            method: "post",
            context: this,
            data:{id: tempid},
           success: function (res) {
                let tempModal = $("#Modal"+tempid);
               $('#myModal').on('hide', function () {
                   $('#Modal'+tempid).remove();
               })
               tempModal.modal('toggle');
               $('#tag'+tempid).text('check');

            },
            error : function (res) {
                console.log(res);
            }
        })
    }
    console.log();
})