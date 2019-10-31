$(document).ready(function() {
    $('#example').DataTable( {


        "order": [1, 'asc'],
        "lengthChange": false,

        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;

            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                i.replace(/[\$, DA]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };



            // Total over all pages
            total = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            total2 = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            total3 = api
                .column( 7 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Total over this page
            pageTotal = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            pageTotal2 = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            pageTotal3 = api
                .column( 7, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

           function formatNumber ( toFormat ) {
                return toFormat.toString().replace(
                 /\B(?=(\d{3})+(?!\d))/g, " "

                );
            };
            // Update footer
            $('.ht').html(
                '<b>Total H.T :</b> <span style="color:#4bae51; ">'+ formatNumber(pageTotal)+' DA </span>'
            );
            $('.ttc').html(
                '<b>Total T.T.C :</b> <span style="color:#4bae51; ">'+ formatNumber(pageTotal2)+' DA </span>'
            );
            $('.tva').html(
                '<b>Total TVA : </b> <span style="color:#4bae51; ">'+ formatNumber(pageTotal3)+' DA </span>'
            );
        }
    } );

    $('#example2').DataTable( {

        "order": [0, 'desc'],
        "pageLength": 25,
        "searching": false,
        "lengthChange": false,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,

            } );


} );