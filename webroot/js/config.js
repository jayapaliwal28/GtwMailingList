requirejs.config({

    baseUrl: '/js/lib',
    
    paths: {
        jquery: 'jquery-1.9.1.min'
    },
    
    shim: {
        'lazyload': {
            deps: ['jquery'],
            exports: 'lazyload'
        },
        'bootstrap': {
            deps: ['jquery'],
            exports: 'bootstrap'
        },
        'responsive-nav': {
            deps: ['jquery'],
            exports: 'responsive-nav'
        },
        'lightbox': {
            deps: ['jquery'],
            exports: 'lightbox'
        },
        'jquery.spin': {
            deps: ['jquery'],
            exports: 'lightbox.min'
        }
    },
        
    optimize: "none"
    
});

define(function(require) {
    
    require("jquery");
    require("main");
    
    function disableBtn(button){
        button.attr('disabled','disabled');
        button.text('Merci!');
        button.css('background-color', '#f00');
        button.css('color', '#fff');
        button.css('cursor', 'default');
    }
    
    $('#contact-btn').click(function(){
        $.ajax({
            type: "POST",
            url: "/contacts/message",
            data: { 
                content: $('#contact-msg').val(),
                email: $('#contact-email').val(),
                name: $('#contact-name').val()
            }
        })
        .always(function( response ) {
            disableBtn($('#contact-btn'));
            $('#contact-msg').attr('disabled','disabled');
            $('#contact-email').attr('disabled','disabled');
            $('#contact-name').attr('disabled','disabled');
        });
    });
    
    $('#newsletter-btn').click(function(){
        $.ajax({
            type: "POST",
            url: "/contacts/add_to_newsletter",
            data: { 
                email: $('#newsletter-email').val()
            }
        })
        .always(function( response ) {
            disableBtn($('#newsletter-btn'));
            $('#newsletter-email').attr('disabled','disabled');
        });
    });
        
});
