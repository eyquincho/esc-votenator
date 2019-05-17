// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#clasificacion').DataTable( {
	paging: false,
	"searching": false,
	"order": [[2, 'desc']]
  });
});
