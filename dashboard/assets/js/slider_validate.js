$(document).ready(function() {

    $('input[type="text"]').change(function(){
        this.value = $.trim(this.value);
    });

    $.validator.addMethod("formAlphanumeric", function(value, element) {
        var pattern1 = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;
        return this.optional(element) || pattern1.test(value);
    }, "El campo debe tener un valor alfanumérico");


    $("#slider_form").validate({
       
        wrapper: 'span',
        errorPlacement: function(error, element) {
            error.css({
                'padding-left': '10px',
                'margin-right': '20px',
                'padding-bottom': '2px',
                'color': 'red',
                'font-size': 'small'
            });
            error.addClass("arrow")
            error.insertAfter(element);
        },


        rules: {
            titulo: {
                
                maxlength: 100,
                
                
            },

            url_img1:{
                extension: "png|jpeg|jpg"
            },

            descripcion: {
                
                maxlength: 200,
                
                
            },
            
            visible: {
                required: true    
            },

           
        
        },

        messages: {

            titulo: {
                
                formAlphanumeric: 'El nombre solo puede contener letras',
                maxlength: 'El nombre debe tener menos de 100 caracteres'     
            },

            url_img1:{
                required: "La imagen del slide es requerido",
                extension: "Solo se aceptan imágenes con extesión png|jpeg|jpg"
                   
            },

            descripcion: {
                
                maxlength: 'El nombre no debe exceder de 200 caracteres'     
            },

            visible: {
                required: 'El campo visible es requerido'    
            },

        },

    });

});