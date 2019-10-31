$('#bes_departements_id').prepend($('<option>', {
    value: '',
    text: 'Ajouter un nouveau département (ou compagnie)'
}));



$('#bes_acheteur_id').prepend($('<option>', {
    value:' ',
    selected:true,
    text: 'Ajouter un nouveau fournisseur'
}));

if($('#bes_acheteur_id').val()=='Ajouter un nouveau fournisseur'){
    $('#bes_acheteur_nom').hide

}

$('#bes_departements_id').change(function(){
    $('#bes_departements_nom').val('');
    $('#bes_departements_nifselect').val('');
    $('#bes_departements_nif').val('');
    $('#bes_departements_adresse').val('');
    $('#bes_departements_codepostal').val('');
    $('#bes_departements_ville').val('');
    $('#bes_departements_email').val('');
    $('#bes_departements_siteweb').val('');
    $('#bes_departements_fax').val();
    $('#bes_departements_telephone').val('');
    $.ajax({
        type:'GET',
        url:Routing.generate('admin_bes_getuser',{user:$('#bes_departements_id').val()}),

        success: function (data) {
            $('#bes_departements_nom').val(data.nom);
            $('#bes_departements_nifselect').val(data.nifselect);
            $('#bes_departements_nif').val(data.nif);
            $('#bes_departements_adresse').val(data.adresse);
            $('#bes_departements_codepostal').val(data.codepostal);
            $('#bes_departements_ville').val(data.ville);
            $('#bes_departements_email').val(data.email);
            $('#bes_departements_siteweb').val(data.siteweb);
            $('#bes_departements_fax').val(data.fax);
            $('#bes_departements_telephone').val(data.telephone);
        }
    });


});
