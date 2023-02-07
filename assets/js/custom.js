// =============  Data Table - (Start) ================= //

$(document).ready(function(){
    
    var table = $('#example').DataTable({
        // dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                className:'btn btn-success',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                className:'btn btn-success',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                className:'btn btn-success',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
            extend:'colvis',
            className:'btn btn-success',
        }
        ]
        
        // buttons:['copy', 'csv', 'excel', 'pdf', 'print','colvis']
        
    });
    
    
    table.buttons().container()
    .appendTo('#example_wrapper .col-md-6:eq(0)');

});

// =============  Data Table - (End) ================= //
