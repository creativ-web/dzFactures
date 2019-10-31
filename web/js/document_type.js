

$('#documents_type').change(function () {

    window.location = this.value;





});

if (  window.location.pathname == '/stockedin/web/admin/documents/new/be' ) {
    $('#documents_type').val('be').attr("selected");
}

if (  window.location.pathname == '/stockedin/web/admin/documents/new/bl' ) {
    $('#documents_type').val('bl').attr("selected");
}