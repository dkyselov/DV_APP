$(function () {
    $('.popup_t').click(function () {
        $(this).next('.popup_bg').addClass('active');
        $(this).next('.popup_bg').next('.popup').addClass('active');
    })

    $('.popup_bg').click(function () {
        $(this).removeClass('active');
        $(this).next('.popup.active').removeClass('active');
    })

    $('.button').click(function () {
        jQuery.scrollTo('#' + $(this).attr('data-rel'), 1000);
    });
});

$(document).ready(function () {
    $(function () {
        $("#win1").fadeOut(3000);
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $("#main_menu").css("opacity", "0.5").fadeIn(3000);
            }
            else { 
                $("#main_menu").css("opacity", "1").fadeIn(3000);
            }
        });

        $("#open_login").click(function () {
            $("#login_windows").fadeIn(1000);
        });
        $("#close_login").click(function () { 
            $("#login_windows").fadeOut(1000);
        });
        $("#main_menu").hover(function () {
            $("#main_menu").css("opacity", "1").fadeIn(3000);  
        });
		$("#close_social").click(function () { 
            $("#social").fadeOut(1000);
        });

    });
    
});

//setTimeout(function ( ) { $("#win1").fadeOut(2000); }, 4000);

   

