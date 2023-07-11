jQuery( document ).ready(function() {
    console.log( "Nova Development Utils Loaded" );

    jQuery('#brand').on('change', function() {
        var brandName = $(this).val();
        if(brandName) {
            jQuery.ajax({
                url: '/model/'+brandName,
                type: "GET",
                dataType: "json",
                success:function(data) {    
                    jQuery('#model').empty();
                    jQuery.each(data.models, function(key, value) {
                         // Create a new option with value 'option3' and text 'Option 3'
                        var option = jQuery('<option>', {
                          value: value.model,
                          text: value.model
                        });
                        // Append the new option to the Bootstrap-select dropdown
                        jQuery('#model').append(option);
                        // Refresh the Bootstrap-select dropdown to update the options
                    });
                    jQuery('#model').val('');
                    jQuery('#model').selectpicker('refresh');
                }
            });
        }else{
            jQuery('#model').empty();
        }
    });
});