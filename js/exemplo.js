$(function(){

    let atual = -1
    let maximo = $('.box-especialidade').length -1
    let timer
    let animacaodelay = 3

    executarAnimacao()
    function executarAnimacao(){
        $('.box-especialidade').hide()//esconde todos
        timer = setInterval(logicaAnimacao,animacaodelay * 1000)
        function logicaAnimacao(){
            atual++//incrementa o atual
            if(atual > maximo){
                clearInterval(timer)//pausa o timer
                return false
            }
            $('.box-especialidade').eq(atual).fadeIn()//pega o indice atual
        }
    }
})  