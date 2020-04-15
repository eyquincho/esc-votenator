// Call the dataTables jQuery plugin
$(document).ready(function() {
	var t = $('#clasificacion').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": "_all"
        } ],
        "order": [[ 2, 'desc' ]],
		paging: false,
		"searching": false,
		"bInfo" : false,
		"sInfo": ""
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
	
	var q = $('.datavotante').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": "_all"
        } ],
        "order": [[ 0, 'desc' ]],
		paging: false,
		"searching": false,
		"bInfo" : false,
		"sInfo": ""
    } );
});
