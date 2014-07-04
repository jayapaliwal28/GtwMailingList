define(function(require) {
    
    var $ = require("jquery");
    require("bootstrap");
   
    $('#mailinglist-btn').click(function(){
        $.ajax({
            type: "POST",
            url: "/emails/subscribe",
            data: { 
                email: $('#mailinglist-email').val()
            }
        })
        .always(function( response ) {
            $('#mailinglist-modal').modal();
        });
    });
        
});
