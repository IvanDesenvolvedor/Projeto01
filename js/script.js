$(function(){
    $('nav.mobile').click(function(){
        let listMenu =$('nav.mobile ul')
        /*
        if(listMenu.is(':hidden') == true){//se o menu etá escondido
            listMenu.fadeIn()
        }else{
            listMenu.fadeOut()
        }  */
        if(listMenu.is(':hidden') == true){//se o menu etá escondido
            let icone =$('.botao-menu-mobile').find('i')
            icone.removeClass('fa-bars')
            icone.addClass('fa-times')
            listMenu.slideToggle()
        }else{
            let icone =$('.botao-menu-mobile').find('i')
            icone.removeClass('fa-times')
            icone.addClass('fa-bars')
            listMenu.slideToggle()
        }  
        
        })

        if($('target').length > 0){
            //O elemento existe, portanto precisamos dar o scroll em algum elemento.
            var elemento = '#'+$('target').attr('target');
    
            var divScroll = $(elemento).offset().top;
         
            $('html,body').animate({scrollTop:divScroll},2000);
        }

        //navegação sem carregar
        carregarDinamico();
        function carregarDinamico(){
            $('[realtime]').click(function(){
                var pagina = $(this).attr('realtime');
                $('.container-principal').hide();
                $('.container-principal').load(include_path+'pages/'+pagina+'.php');
                
                setTimeout(function(){
                    initialize();
                    addMarker(-27.609959,-48.576585,'',"Minha casa",undefined,false);
    
                },1000);
    
                $('.container-principal').fadeIn(1000);
                window.history.pushState('', '',contato);
    
                return false;
            })
        }
})