$(function () {
    var open = true;
    var windowSize = $(window)[0].innerWidth;
    var targtSizeMenu = (windowSize < 400) ? 200 : 300;
    //aplicação do menu a uma detrminada largura 
    if (windowSize <= 768) {
        $('.menu').css('width', '0').css('padding', '0');

        open = false;
    }
    // aplicando função ao menu
    $('.menu-btn').click(function () {
        if (open) {
            //
            $('.menu').animate({ 'width': 0, 'padding': 0 }, function () {
                open = false;
            });

            $('.content,header').css({ 'width': '100%' });
            $('.content,header').animate({ 'left': '0' }, function () {
                open = false;

            });


        } else {
            $('.menu').css('display', 'block');
            $('.menu').animate({ 'width': targtSizeMenu + 'px', 'padding': '10px' }, function () {
                open = true;
            });

            // $('.content,header').css('width','calc(100% - 300px)');
            $('.content,header').animate({ 'left': targtSizeMenu + 'px' }, function () {
                open = true;

            });
            $(window).resize(function () {
                windowSize = $(window)[0].innerWidth;
                if (windowSize <= 768) {
                    $('menu').css('width', '0').css('padding', '0');
                    $('.content,header').css('width', '100%').css('left', '0');
                    open = false;
                } else {
                    open = true;
                    $('.content,header').css('width', 'calc(100% - 250px)').css('left', '250px');
                    $('menu').css('width', '250px').css('padding', '10px 0');

                }
            });
        }
    });
    $('[formato=data]').mask('99/99/9999');
});
