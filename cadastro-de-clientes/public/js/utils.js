(function($, document, window) {
    $(".cliente").click(function(e) {
        $(".info-cliente").hide();   
        $(this).find("div").show();
    });
})(jQuery, document, window);