//ajax load the loai va loai tin
$(document).ready(function(){
    $('#Cate').change(function(){
        var idTheLoai= $(this).val();
        $.get('/laraphp/public/admin/ajaxNews/'+idTheLoai,function(data){
            $('#TypeCate').html(data);
        });
    });

    //thong bao thanh cong
    $('.thanhcong').delay(3000).slideUp();

//xu ly check all


});
$(window).load(function(){
    $(".checkboxall").click(function()
    {
         var checked_status = this.checked;
         $("input[class='checkall']").each(function() {
         this.checked = checked_status;
         });
    });

});
