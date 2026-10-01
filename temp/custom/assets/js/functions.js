
	function myCopy() {
		var x = document.getElementById( "showCopy" );
		if ( x.style.display === "none" ) {
			x.style.display = "block";
		} else {
			x.style.display = "none";
		}
	}

	var clipboard = new ClipboardJS( '#copy' );

	clipboard.on( 'success', function ( e ) {
		console.info( 'Action:', e.action );
		console.info( 'Text:', e.text );
		console.info( 'Trigger:', e.trigger );

		e.clearSelection();
	} );

	clipboard.on( 'error', function ( e ) {
		console.error( 'Action:', e.action );
		console.error( 'Trigger:', e.trigger );
	} );

	$( document ).ready( function () {
		$.fn.dataTable.moment( 'DD/MM/YY H:i' );
		$( '#example' ).DataTable( {		
			responsive: true,
			dom: 'Bfrtip',
			buttons: [ {
				extend: 'copyHtml5',
				footer: true
			}, {
				extend: 'excelHtml5',
				footer: true
			}, {
				extend: 'csvHtml5',
				footer: true
			}, {
				extend: 'pdfHtml5',
				footer: true
			} ],
			"order": [
				[ 0, "desc" ]
			]
		} );
	} );

