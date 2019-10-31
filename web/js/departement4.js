$('#recus_departements_id').prepend($('<option>', {
    value: '',
    text: 'Ajouter un nouveau département (ou compagnie)'
}));
$.ajax({
    type:'GET',
    url:'http://localhost/stockedin/web/admin/recus/user/'+$('#recus_departements_id').val(),
    success: function (data) {
        $('#recus_departements_nom').val(data.nom);
        $('#recus_departements_nifselect').val(data.nifselect);
        $('#recus_departements_nif').val(data.nif);
        $('#recus_departements_adresse').val(data.adresse);
        $('#recus_departements_codepostal').val(data.codepostal);
        $('#recus_departements_ville').val(data.ville);
        $('#recus_departements_email').val(data.email);
        $('#recus_departements_siteweb').val(data.siteweb);
        $('#recus_departements_fax').val(data.fax);
        $('#recus_departements_telephone').val(data.telephone);


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




$('#recus_departements_id').change(function(){
    $('#recus_departements_nom').val('');
    $('#recus_departements_nifselect').val('');
    $('#recus_departements_nif').val('');
    $('#recus_departements_adresse').val('');
    $('#recus_departements_codepostal').val('');
    $('#recus_departements_ville').val('');
    $('#recus_departements_email').val('');
    $('#recus_departements_siteweb').val('');
    $('#recus_departements_fax').val();
    $('#recus_departements_telephone').val('');
    $.ajax({
        type:'GET',
        url:'http://localhost/stockedin/web/admin/recus/user/'+$('#recus_departements_id').val(),
        success: function (data) {
            $('#recus_departements_nom').val(data.nom);
            $('#recus_departements_nifselect').val(data.nifselect);
            $('#recus_departements_nif').val(data.nif);
            $('#recus_departements_adresse').val(data.adresse);
            $('#recus_departements_codepostal').val(data.codepostal);
            $('#recus_departements_ville').val(data.ville);
            $('#recus_departements_email').val(data.email);
            $('#recus_departements_siteweb').val(data.siteweb);
            $('#recus_departements_fax').val(data.fax);
            $('#recus_departements_telephone').val(data.telephone);
        }
    });


});
