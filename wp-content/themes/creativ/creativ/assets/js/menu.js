(function ($) {
    "use strict";

    $(document).ready(function(){

        var $menu = $('.nav-menu');
        $menu.find('ul.sub-menu > li').each(function(){
            var $submenu = $(this).find('>ul');
            if($submenu.length == 1){
                $(this).hover(function(){
                    if($submenu.offset().left + $submenu.width() > $(window).width()){
                        $submenu.addClass('back');
                    }else if($submenu.offset().left < 0){
                        $submenu.addClass('back');
                    }
                }, function(){
                    $submenu.removeClass('back');
                });
            }
        });

        $('.nav-menu li.menu-item-has-children').append('<span class="zo-menu-toggle"><i class="fa fa-angle-down"></i></span>');
        $('.zo-menu-toggle').click(function(){
            $(this).prev().toggleClass('submenu-open');
            if($(this).prev().hasClass('submenu-open')){
                $(this).prev().parent().addClass('zo-menu-hover');
            }else {
                $(this).prev().parent().removeClass('zo-menu-hover');
            } 
        
        });
        /* Page Fixed Menu */
        $('.header-fixed-page').parents('body').addClass('remove-margin-top');
        $('#zo-header.no-sticky').parents('body').addClass('remove-margin-top');
        
       
        
    });
    $(window).resize(function() {
        var window_width = $(window).width();
        if(window_width  < 767 ) {
            $('.multicolumn').css('background-color','#141414');
        }
    });

})(jQuery);
/*Menu portfolio*/
(function($) {
    if($('#zo-header').hasClass('zo-header-style-9')) {
        var triggerBttn = document.getElementById( 'trigger-overlay' ),
            overlay = document.querySelector( 'div.overlay' );
            
             if(classie.has(overlay,'overlay-scale')){
                $('nav div > ul').prepend('<li><button type="button" class="overlay-close">Close</button></li>'); 
            } 
        var   closeBttn = overlay.querySelector( 'button.overlay-close' );
            transEndEventNames = {
                'WebkitTransition': 'webkitTransitionEnd',
                'MozTransition': 'transitionend',
                'OTransition': 'oTransitionEnd',
                'msTransition': 'MSTransitionEnd',
                'transition': 'transitionend'
            },
            transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
            support = { transitions : Modernizr.csstransitions };

        function toggleOverlay() {
            if( classie.has( overlay, 'open' ) ) {
                classie.remove( overlay, 'open' );
                classie.add( overlay, 'close' );
                var onEndTransitionFn = function( ev ) {
                    if( support.transitions ) {
                        if( ev.propertyName !== 'visibility' ) return;
                        this.removeEventListener( transEndEventName, onEndTransitionFn );
                    }
                    classie.remove( overlay, 'close' );
                };
                if( support.transitions ) {
                    overlay.addEventListener( transEndEventName, onEndTransitionFn );
                }
                else {
                    onEndTransitionFn();
                }
            }
            else if( !classie.has( overlay, 'close' ) ) {
                classie.add( overlay, 'open' );
            }
        }

        triggerBttn.addEventListener( 'click', toggleOverlay );
        closeBttn.addEventListener( 'click', toggleOverlay );
        // GALLERY
        new BoxesFx( document.getElementById( 'boxgallery' ) );
    }
    // Left Side Menu
    $('[data-toggle=offcanvas]').click(function() {
        $('#zo-header').toggleClass('active');
        $('.zo-vertical-menu').toggleClass('zo-page-active');
    }); 
    
})(jQuery);



