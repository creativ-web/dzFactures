$('#documents_departements_id').prepend($('<option>', {
    value: '',
    text: 'Ajouter un nouveau département (ou compagnie)'
}));
$.ajax({
    type:'GET',
    url:'http://localhost/stockedin/web/admin/factures/user/'+$('#factures_departements_id').val(),
    success: function (data) {
        $('#documents_departements_nom').val(data.nom);
        $('#documents_departements_nifselect').val(data.nifselect);
        $('#documents_departements_nif').val(data.nif);
        $('#documents_departements_adresse').val(data.adresse);
        $('#documents_departements_codepostal').val(data.codepostal);
        $('#documents_departements_ville').val(data.ville);
        $('#documents_departements_email').val(data.email);
        $('#documents_departements_siteweb').val(data.siteweb);
        $('#documents_departements_fax').val(data.fax);
        $('#documents_departements_telephone').val(data.telephone);


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




$('#documents_departements_id').change(function(){
    $('#documents_departements_nom').val('');
    $('#documents_departements_nifselect').val('');
    $('#documents_departements_nif').val('');
    $('#documents_departements_adresse').val('');
    $('#documents_departements_codepostal').val('');
    $('#documents_departements_ville').val('');
    $('#documents_departements_email').val('');
    $('#documents_departements_siteweb').val('');
    $('#documents_departements_fax').val();
    $('#documents_departements_telephone').val('');
    $.ajax({
        type:'GET',
        url:'http://localhost/stockedin/web/admin/factures/user/'+$('#documents_departements_id').val(),
        success: function (data) {
            $('#documents_departements_nom').val(data.nom);
            $('#documents_departements_nifselect').val(data.nifselect);
            $('#documents_departements_nif').val(data.nif);
            $('#documents_departements_adresse').val(data.adresse);
            $('#documents_departements_codepostal').val(data.codepostal);
            $('#documents_departements_ville').val(data.ville);
            $('#documents_departements_email').val(data.email);
            $('#documents_departements_siteweb').val(data.siteweb);
            $('#documents_departements_fax').val(data.fax);
            $('#documents_departements_telephone').val(data.telephone);
        }
    });


});
