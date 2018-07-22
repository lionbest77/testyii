!function ($) {

  "use strict"; 

  $(window).on('load', function () {
    
    $('.fixed_header_table #product-grid tr').eq(1).addClass('first_row_product');
    
    var i=0;
    $('.first_row_product td').each(function() {
        $(this).addClass('product-grid_c'+i);
        i++;
    })
    
    });
    
}(window.jQuery);
