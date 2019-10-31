$('#devis_departements_id').prepend($('<option>', {
    value: '',
    text: 'Ajouter un nouveau département (ou compagnie)'
}));
$.ajax({
    type:'GET',
    url:'http://localhost/stockedin/web/admin/devis/user/'+$('#devis_departements_id').val(),
    success: function (data) {
        $('#devis_departements_nom').val(data.nom);
        $('#devis_departements_nifselect').val(data.nifselect);
        $('#devis_departements_nif').val(data.nif);
        $('#devis_departements_adresse').val(data.adresse);
        $('#devis_departements_codepostal').val(data.codepostal);
        $('#devis_departements_ville').val(data.ville);
        $('#devis_departements_email').val(data.email);
        $('#devis_departements_siteweb').val(data.siteweb);
        $('#devis_departements_fax').val(data.fax);
        $('#devis_departements_telephone').val(data.telephone);


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




$('#devis_departements_id').change(function(){
    $('#devis_departements_nom').val('');
    $('#devis_departements_nifselect').val('');
    $('#devis_departements_nif').val('');
    $('#devis_departements_adresse').val('');
    $('#devis_departements_codepostal').val('');
    $('#devis_departements_ville').val('');
    $('#devis_departements_email').val('');
    $('#devis_departements_siteweb').val('');
    $('#devis_departements_fax').val();
    $('#devis_departements_telephone').val('');
    $.ajax({
        type:'GET',
        url:'http://localhost/stockedin/web/admin/devis/user/'+$('#devis_departements_id').val(),
        success: function (data) {
            $('#devis_departements_nom').val(data.nom);
            $('#devis_departements_nifselect').val(data.nifselect);
            $('#devis_departements_nif').val(data.nif);
            $('#devis_departements_adresse').val(data.adresse);
            $('#devis_departements_codepostal').val(data.codepostal);
            $('#devis_departements_ville').val(data.ville);
            $('#devis_departements_email').val(data.email);
            $('#devis_departements_siteweb').val(data.siteweb);
            $('#devis_departements_fax').val(data.fax);
            $('#devis_departements_telephone').val(data.telephone);
        }
    });


});
