$('#bdc_departements_id').prepend($('<option>', {
    value: '',
    text: 'Ajouter un nouveau département (ou compagnie)'
}));
$.ajax({
    type:'GET',
    url:'http://localhost/stockedin/web/admin/bdc/user/'+$('#bdc_departements_id').val(),
    success: function (data) {
        $('#bdc_departements_nom').val(data.nom);
        $('#bdc_departements_nifselect').val(data.nifselect);
        $('#bdc_departements_nif').val(data.nif);
        $('#bdc_departements_adresse').val(data.adresse);
        $('#bdc_departements_codepostal').val(data.codepostal);
        $('#bdc_departements_ville').val(data.ville);
        $('#bdc_departements_email').val(data.email);
        $('#bdc_departements_siteweb').val(data.siteweb);
        $('#bdc_departements_fax').val(data.fax);
        $('#bdc_departements_telephone').val(data.telephone);


        $('.departement_form').hide();


        $('.departement_view').append(' <h2>Client</h2>');
        $('.departement_view').append('<p>'+data.nom+'</p>');
        $('.departement_view').append('<p>'+data.nifselect+': '+data.nif+'</p>');
        $('.departement_view').append('<p>'+data.adresse+','+ data.codepostal+'</p>' + '<p>'+data.ville+'</p>');

        $('.departement_view').append('<span class="btn btn-glow btn-xs departement_button ">Modifier</span>');




        $('.departement_button').on('click', function(e) {

            $('.departement_view').hide();
            $('.departement_form').show();


        });

    }
});




$('#bdc_departements_id').change(function(){
    $('#bdc_departements_nom').val('');
    $('#bdc_departements_nifselect').val('');
    $('#bdc_departements_nif').val('');
    $('#bdc_departements_adresse').val('');
    $('#bdc_departements_codepostal').val('');
    $('#bdc_departements_ville').val('');
    $('#bdc_departements_email').val('');
    $('#bdc_departements_siteweb').val('');
    $('#bdc_departements_fax').val();
    $('#bdc_departements_telephone').val('');
    $.ajax({
        type:'GET',
        url:'http://localhost/stockedin/web/admin/bdc/user/'+$('#bdc_departements_id').val(),
        success: function (data) {
            $('#bdc_departements_nom').val(data.nom);
            $('#bdc_departements_nifselect').val(data.nifselect);
            $('#bdc_departements_nif').val(data.nif);
            $('#bdc_departements_adresse').val(data.adresse);
            $('#bdc_departements_codepostal').val(data.codepostal);
            $('#bdc_departements_ville').val(data.ville);
            $('#bdc_departements_email').val(data.email);
            $('#bdc_departements_siteweb').val(data.siteweb);
            $('#bdc_departements_fax').val(data.fax);
            $('#bdc_departements_telephone').val(data.telephone);
        }
    });


});
