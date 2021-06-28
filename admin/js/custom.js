jQuery(document).ready(function($) {

    $('#search-post').on('click', function(e) {
        e.preventDefault();
        const type_pet = $('#type-pet').val();
        const weight_pet = $('#weight-pet').val();
        const age_pet = $('#age-pet').val();

        jQuery.ajax({
            type: "POST",
            url: ajax_object.url,
            data: {
                action: ajax_object.hook,
                security: ajax_object.nonce,
                typePet: type_pet,
                weightPet: weight_pet,
                agePet: age_pet
            },
            success: function(response) {
                $("#content-pets").html(response);
            }
        });


    });



})