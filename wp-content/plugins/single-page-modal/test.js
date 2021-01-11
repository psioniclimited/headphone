jQuery( document ).on( 'click', '.view-details-btn', function() {
    var prod_id = jQuery(jQuery(this)[0]).attr('prod_id');

    // console.log('PROD_ID => ' + prod_id);

    jQuery.ajax({
        url : singlepagemodal.ajax_url,
        type : 'post',
        data : {
            action : 'retrieve_specific_id',
            prod_id : prod_id
        },
        success : function( response ) {
            jQuery('.custom-psuedo-inner-modal-content').html( response );
        }
    });
});

//Page reload after adding product using ajax_add_to_cart button in shop page quick view modal
var ajaxCartBtnFlag = false;
jQuery( document ).on( 'click', '.custom-made-modal.active .ajax_add_to_cart', function() {
    ajaxCartBtnFlag = true;
}).ajaxStop(function() {
    // console.log('Ajax button clicked');
    if(ajaxCartBtnFlag){
        setTimeout(location.reload.bind(location), 300);
        ajaxCartBtnFlag = false;
    }
});
