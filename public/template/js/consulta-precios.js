$(document).ready( function () {
    $('#table-precios-gasolina').DataTable({
        'scrollY'       : '500px',
        'scrollCollapse': true,
        'paging'        : false,
        'order'         : [[ 0, 'asc' ]],
        'ajax'          : {
            'url' : '/gasolinera',
            'dataSrc' : 'results',
        },
        'columns': [
            { 'data': 'estado' },
            { 'data': 'ciudad' },
            { 'data': 'calle' },
            { 'data': 'precio' },
            { 'data': 'mapa' },
        ]

    });

    // $('#table-estados').DataTable({
    //     'scrollY'       : '200px',
    //     'scrollCollapse': true,
    // });

    // $().DataTable({
    //     ajax: {
    //         url: '/identidades',
    //         type: 'GET'
    //     },
    //     columns: [  //or different depending on the structure of the object
    //                 {"data" : "o.JSON.ent[0].id"},
    //                 {"data" : "o.JSON.ent[0].name"},
    //                 {"data" : "o.JSON.ent[0].cif"}           
    //             ]
    // })
} );