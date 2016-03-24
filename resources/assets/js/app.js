// window.$ = window.jQuery = require('jquery');
//
// require('bootstrap-sass');


/**
 * пикер детей 
 */
$(document).ready(function() { $(".select2-multiselect").select2(); });

jQuery.fn.preventDoubleSubmission = function() {
    $(this).on('submit',function(e){
        var $form = $(this);

        if ($form.data('submitted') === true) {
            // Previously submitted - don't submit again
            e.preventDefault();
        } else {
            // Mark it so that the next submit can be ignored
            $form.data('submitted', true);
        }
    });

    // Keep chainability
    return this;
};

$(document).ready(function() { $('form').preventDoubleSubmission(); });
