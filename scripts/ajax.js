$(function(){
    $('.ajax').ajaxForm({
        beforeSend:function(){
            $('.ajax').animate({'opacity':'0.5'});
            $('.ajax').find('input[type=submit]').attr('disabled','true');
        },
        success: function(data){
            $('.ajax').animate({'opacity':'1'});
            $('.ajax').find('input[type=submit]').removeAttr('disabled');
            console.log(data);
        }
    })
})