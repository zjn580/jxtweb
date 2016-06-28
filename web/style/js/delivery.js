$(function(){
    $(document).on('click','.reset li a',function(){
       var type =  $(this).attr('type');
        $('.current').attr('class','');
        $(this).parent().attr('class','current');
        $.ajax({
            type:'POST',
            async: false,
            url:"?r=resume/search",
            data:{type:type},
            success:function(msg){
               $('#deliveryForm').html(msg);
            }
        })
    })
})