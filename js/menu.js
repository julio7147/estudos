$(function(){
    //chamando a função do menu
    $('nav.mobile').click(function(){
    //efeito para menu
        var listaMenu = $('nav.mobile ul');
        /*if(listaMenu.is(':hidden') == true)
            listaMenu.fadeIn();
        else
            listaMenu.fadeOut();
        */
       listaMenu.slideToggle();

    })
    carregamentoDinamico();

    function carregamentoDinamico(){
        $('[realtime]').click(function(){
            var pagina = $(this).attr('realtime');

            $('.container-principal').load(INCLUDE_PAHT+'pages/'+pagina+'.php');
            return false;
        })
    }
})