$(function(){
    let open = true
    let windowsize =$(window)[0].innerWidth//pega o tamanho cerrto da tela
    let targetSizemenu = $(windowsize <= 400) ? 200 : 300

    if(windowsize <= 768){
        $('.menu').css({'width':'0'}).css({'padding':'0'}) 
        open = false
    }
    $('.menu-btn').click(function(){
        if(open){
            //o menu está aberto precisamos fechar
           $('.menu').animate({'width':'0','padding':'0'},function(){
               open = false
           })
           $('.content,header').css({'width':'100%'})
           $('.content,header').animate({'left':'0'},function(){
               open = false
           })
        }else{
            //o enu está fechado
            $('.menu').css('display','block')
            $('.menu').animate({'width':targetSizemenu+'px','padding':'10px'},function(){
                open = true
            })
           // $('.content,header').css({'width':'calc(100% - 300px)'})
            $('.content,header').animate({'left':targetSizemenu+'px'},function(){
                open = true
            })
        }
    })

    $(window).resize(function(){
		windowSize = $(window)[0].innerWidth;
		targetSizeMenu = (windowSize <= 400) ? 200 : 250;
		if(windowSize <= 768){
			$('.menu').css('width','0').css('padding','0');
			$('.content,header').css('width','100%').css('left','0');
			open = false;
		}else{
			$('.menu').animate({'width':targetSizeMenu+'px','padding':'10px 0'},function(){
				open = true;
			});

			$('.content,header').css('width','calc(100% - 250px)');
			$('.content,header').animate({'left':targetSizeMenu+'px'},function(){
			open = true;
			});
		}

	})
})