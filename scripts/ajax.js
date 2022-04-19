$(function(){
    $('.ajax').ajaxForm({
        dataType: 'json',
        beforeSend:function(){
            $('.ajax').animate({'opacity':'0.5'});
            $('.ajax').find('input[type=submit]').attr('disabled','true');
        },
        success: function(data){
            $('.ajax').animate({'opacity':'1'});
            $('.ajax').find('input[type=submit]').removeAttr('disabled');
            $('.box-alert').remove();
            if(data.sucesso){
                $('.ajax').prepend('<div class="box-alert sucesso"><i class="bi bi-check2-circle"></i> O Cliente foi inserido com sucesso! </div>');
                $('.ajax')[0].reset();
            }else{
                $('.ajax').prepend('<div class="box-alert erro"><i class="bi bi-exclamation-circle"></i> Ocorreu os seguintes erros: <b>'+data.mensagem+'</b> </div>');
            }
            
        }
    })
})