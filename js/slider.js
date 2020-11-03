$(function(){

    let curSlide =0
    let maxSlide = $('.banner-single').length - 1
    let delay = 3
    
    initSlider()
    changeSlide()

    function initSlider(){
        $('.banner-single').hide()//esconde todos
        $('.banner-single').eq(0).show()
        for(var i=0; i < maxSlide+1; i++){
           let content =$('.bullets').html()
           if(i == 0)
               content+='<span class="active-slider"></span>'
           else
               content+='<span></span>'
           $('.bullets').html(content)
        }
    }
    
    function changeSlide(){
        setInterval(function(){
            $('.banner-single').eq(curSlide).stop().fadeOut(2000)
            curSlide++
            if(curSlide > maxSlide)
                curSlide = 0// volta pra zero
                $('.banner-single').eq(curSlide).stop().fadeIn(2000)
                //trocar bolinha da navegação do slider
                $('.bullets span').removeClass('active-slider')//remove todos antes
                $('.bullets span').eq(curSlide).addClass('active-slider')
            },delay * 1000)//fica repetindo a cada 3 segundos
    }

    //agora o click
    $('body').on('click','.bullets span',function(){
        let currentBullet = $(this)
        $('.banner-single').eq(curSlide).stop().fadeOut(1000)//esconde
        curSlide = currentBullet.index()//pega o index
        $('.banner-single').eq(curSlide).stop().fadeIn(1000)//mostra
        $('.bullets span').removeClass('active-slider')
        currentBullet.addClass('active-slider')
    })
       
    
})