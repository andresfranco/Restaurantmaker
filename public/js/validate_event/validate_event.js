$.validator.prototype.elements = function() {
    var validator = this,
    rulesCache = {};

    return $( this.currentForm )
    .find( "input, select, textarea" )
    .not( ":submit, :reset, :image, [disabled]") // changed from: .not( ":submit, :reset, :image, [disabled], [readonly]" )
    .not( this.settings.ignore )
    .filter( function() {
        if ( !this.name && validator.settings.debug && window.console ) {
            console.error( "%o has no name assigned", this );
        }

        if ( this.name in rulesCache || !validator.objectLength( $( this ).rules() ) ) {
            return false;
        }

        rulesCache[ this.name ] = true;
        return true;
    });         
};

$(function() {

    // Setup form validation on the #register-form element
    $("#appform").validate({
         errorClass:'has-error',
         errorPlacement: function(error, element)
        {
            switch(element.attr("name")) 
            {
            case "start_date":
             error.appendTo('#start_date_error');
            break;
            case  "finish_date":
             error.appendTo('#finish_date_error');
            break;
            default:
            error.insertAfter(element);
            } 
        },

        // Specify the validation rules
        rules: {
            name:{required:true},
            start_date:{required:true},
            finish_date:{required:true}

        },
        // Specify the validation error messages
        messages: {
            name:{required:validatemessages.name},
            start_date:{required:validatemessages.start_date},
            finish_date:{required:validatemessages.finish_date}

        },

        submitHandler: function(form) {
            form.submit();
        }
    });

  });
