(function($){
    $(document).ready(function () {

        $("#message").html("");  

        
        $.getJSON("https://api.ipify.org?format=json", function(data) { 

            $("#ip").val(data.ip); 
            
        });
        
        // max word length
        $.validator.addMethod("maxWordLength",
        function(value, element, params) {
            let count = value.replace( /[^\w ]/g, "" ).split( /\s+/ ).length;
            
            if(count >= params) {                
                return false;
            }

            return true;
        },
        $.validator.format("Please enter no more than {0} words")
        );

        // validate only lettes digit and spaces
        $.validator.addMethod("letterDigitSpace", function(value, element) {
            return this.optional(element) || /^([a-zA-Z0-9]+\s)*[a-zA-Z0-9\s]+$/i.test(value);
        }, "Type only alphabetical characters");
        
        // validate only lettes digit and spaces
        $.validator.addMethod("letterSpace", function(value, element) {
            return this.optional(element) || /^[a-z\s]+$/i.test(value);
        }, "Type only letters allowed");
        

        // validate only letters
        $.validator.addMethod( "lettersOnly", function( value, element ) {
            return this.optional( element ) || /^[a-z]+$/i.test( value );
        }, "Type only letters allowed" );
        
       

        $("#entryForm").validate({
            errorClass: "error is-invalid",
            validClass: "is-valid",
            rules: {
                buyer: {
                    required: true,
                    maxlength: 20,
                    letterDigitSpace: true
                },
                buyer_email: {
                    required: true,
                    email: true
                },
                city: {
                    required: true,
                    letterSpace: true
                },
                phone: {
                    required: true,
                    number: true
                },
                items: {
                    required: true,
                    letterSpace: true
                },
                amount: {
                    required: true,
                    number:true,
                    min: 0
                },
                receipt_id: {
                    required: true,
                    lettersOnly: true
                },
                entry_by: {
                    required: true
                },
                note: {
                    required: true,
                    maxWordLength: 30,
                    
                }
            },
            submitHandler: function(form) {
                // do other things for a valid form
                // console.log(event);
                
                $(form).submit( function(e) {
                    e.preventDefault();
                    let formData = $(this).serialize();
                  
                    $.ajax({          
                        url: form.action,              
                        type: form.method,
                        data:formData,            
                        success: function(data){
                            
                            $("#message").html(data);

                            setTimeout(function() {                                
                                
                                $("#message").html("");  
                                
                            }, 4000);                                                      
                        }
                    
                    }).done(function() {
                        setTimeout(function() {
                            window.location.reload();
                         }, 5000);
                    });
                });

                // form.submit();
            }
        });


    });
})(jQuery);