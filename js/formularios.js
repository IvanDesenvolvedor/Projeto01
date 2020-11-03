$(function(){
    $('body').on('submit','form',function(){
        var form = $(this)
        $.ajax({
             beforeSend:function(){//antes de  enviar o formulario
                $('.overlay-loading').fadeIn()
             },
             url:include_path+'ajax/formularios.php',
             method:'post',
            dataType:'json',
            data:form.serialize()
        }).done(function(data){
            if(data.sucesso){
                $('.overlay-loading').fadeOut()
                $('.sucesso').fadeIn()
                setTimeout(function(){
                    $('.sucesso').fadeOut()
                },3000)
            }else{//começo teste
                $('.overlay-loading').fadeOut()
                $('.error-email').fadeIn()
                setTimeout(function(){
                    $('.error-email').fadeOut()
                },3000)
                 console.log('Ocorrei um erro ao enviar o email')
            }
        })
        return false
    })
})