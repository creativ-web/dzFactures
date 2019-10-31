$('#factures_type').change(function () {

    if (  this.value == 'fact' ) {
        window.location = '/stockedin/web/admin/factures/new';
    }
    if (  this.value == 'proforma' ) {
        window.location = '/stockedin/web/admin/proformas/new';
    }
    if (  this.value == 'recu' ) {
        window.location = '/stockedin/web/admin/recus/new';
    }

    if (  this.value == 'recu' ) {
        window.location = '/stockedin/web/admin/recus/new';
    }
    if (  this.value == 'devis' ) {
        window.location = '/stockedin/web/admin/devis/new';
    }

    if (  this.value == 'bdc' ) {
        window.location = '/stockedin/web/admin/bdc/new';
    }


});