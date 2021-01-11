jQuery(document).ready( function(){

    // on hover Changes Scripts -->
    function showcaseSection( element ){
        var otherElements = element.parents('.showcase-section').find('.showcase-feature'),
            elementTarget = jQuery( element.attr('data-target') ),
            otherTargets = element.parents('.showcase-section').find('.showcase-target');

        otherElements.removeClass('showcase-feature-active');
        element.addClass('showcase-feature-active');
        otherTargets.removeClass('showcase-target-active');
        elementTarget.addClass('showcase-target-active');
    }

    jQuery('.showcase-section').each( function(){
        if ( jQuery(this).find('.showcase-feature-active').length < 1 ) {
            jQuery(this).find('.showcase-feature:eq(0)').addClass('showcase-feature-active');
        }
    });

    var elementActive = jQuery('.showcase-feature-active');

    elementActive.each( function(){
        showcaseSection( jQuery(this) );
    });

    jQuery('.showcase-feature').hover( function(){
        showcaseSection( jQuery(this) );
    }); // --> Scripts End.



    // Hide Bracket From category filter in side bar
    jQuery( function($) {

        $('.woocommerce-widget-layered-nav-list .count').each( function() {

            $(this).html( /(\d+)/g.exec( $(this).html() )[0] );

        } );

    } );

    //Fixing Bug for Image Flipper plugin used in shop page
    jQuery( '.product-image' ).hover( function() {
        jQuery( this ).find( '.attachment-woocommerce_thumbnail' ).removeClass( 'fadeIn' ).addClass( 'animated fadeOut' );
        jQuery( this ).find( '.secondary-image' ).removeClass( 'fadeOut' ).addClass( 'animated fadeIn' );
    }, function() {
        jQuery( this ).find( '.attachment-woocommerce_thumbnail' ).removeClass( 'fadeOut' ).addClass( 'fadeIn' );
        jQuery( this ).find( '.secondary-image' ).removeClass( 'fadeIn' ).addClass( 'fadeOut' );
    });


    //Set Single page id to modal to load single page
    jQuery( '.product-image .view-details-btn' ).click(function() {

        jQuery('.custom-made-modal').addClass('active');

    });
    jQuery( '.custom-made-modal-container-close-icon' ).click(function() {
        // alert( "Handler for .click() called." );
        jQuery('.custom-made-modal').removeClass('active');
    });


    //Remove DISABLE ATTRIBUTE from UPDATE CART button in Cart Page
    jQuery( '.shop_table.cart .plus, .shop_table.cart .minus' ).click(function() {
        // alert( "Handler for .click() called." );
        jQuery( '.shop_table.cart' ).find( 'button[name="update_cart"]' ).prop("disabled", false);
    })

    //Remove DISABLE ATTRIBUTE from Update cart button
    jQuery( '#top-cart' ).click(function(e) {
        e.preventDefault();
        console.log('Menu Cart Icon Clicked');
        jQuery('#header-cart-menu').toggleClass('active');
    })

    //customize shop page sidebar for mobile screens
    jQuery( '.custom-shop-mobile-sidebar-reveal-icon' ).click(function() {
        jQuery('.custom-shop-sidebar-col aside').toggleClass('active');
    })

});

//Page reload after adding product using ajax_add_to_cart button in shop page quick view modal
var ajaxCartBtnFlag = false;
jQuery( document ).on( 'click', '.ajax_add_to_cart', function() {
    ajaxCartBtnFlag = true;
}).ajaxStop(function() {
    // console.log('Ajax button clicked');
    if(ajaxCartBtnFlag){
        setTimeout(location.reload.bind(location), 300);
        ajaxCartBtnFlag = false;
    }
});

$('#ytb-video-button').on('click', function(e){
    e.preventDefault();

    if( $(this).hasClass('video-played') ) {
        $('#ytb-video').YTPMute();
        $('.hide-on-play').stop(true,true).fadeTo( "slow", 1 );
    } else {
        $('#ytb-video').YTPUnmute();
        $('.hide-on-play').stop(true,true).fadeTo( "slow", 0.05 );
    }

    $(this).toggleClass('video-played');
});