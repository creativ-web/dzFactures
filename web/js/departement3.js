$('#proformas_departements_id').prepend($('<option>', {
    value: '',
    text: 'Ajouter un nouveau département (ou compagnie)'
}));
$.ajax({
    type:'GET',
    url:'http://localhost/stockedin/web/admin/proformas/user/'+$('#proformas_departements_id').val(),
    success: function (data) {
        $('#proformas_departements_nom').val(data.nom);
        $('#proformas_departements_nifselect').val(data.nifselect);
        $('#proformas_departements_nif').val(data.nif);
        $('#proformas_departements_adresse').val(data.adresse);
        $('#proformas_departements_codepostal').val(data.codepostal);
        $('#proformas_departements_ville').val(data.ville);
        $('#proformas_departements_email').val(data.email);
        $('#proformas_departements_siteweb').val(data.siteweb);
        $('#proformas_departements_fax').val(data.fax);
        $('#proformas_departements_telephone').val(data.telephone);


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




$('#proformas_departements_id').change(function(){
    $('#proformas_departements_nom').val('');
    $('#proformas_departements_nifselect').val('');
    $('#proformas_departements_nif').val('');
    $('#proformas_departements_adresse').val('');
    $('#proformas_departements_codepostal').val('');
    $('#proformas_departements_ville').val('');
    $('#proformas_departements_email').val('');
    $('#proformas_departements_siteweb').val('');
    $('#proformas_departements_fax').val();
    $('#proformas_departements_telephone').val('');
    $.ajax({
        type:'GET',
        url:'http://localhost/stockedin/web/admin/proformas/user/'+$('#proformas_departements_id').val(),
        success: function (data) {
            $('#proformas_departements_nom').val(data.nom);
            $('#proformas_departements_nifselect').val(data.nifselect);
            $('#proformas_departements_nif').val(data.nif);
            $('#proformas_departements_adresse').val(data.adresse);
            $('#proformas_departements_codepostal').val(data.codepostal);
            $('#proformas_departements_ville').val(data.ville);
            $('#proformas_departements_email').val(data.email);
            $('#proformas_departements_siteweb').val(data.siteweb);
            $('#proformas_departements_fax').val(data.fax);
            $('#proformas_departements_telephone').val(data.telephone);
        }
    });


});
