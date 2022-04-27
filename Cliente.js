function getContent( timestamp )
{


	var queryString = { 'timestamp' : timestamp };

	$.get ( 'Servidor.php' , queryString , function ( data )
	{
		var obj = jQuery.parseJSON( data );
		$( '#response' ).html( obj.content );
		
		getContent( obj.timestamp );
	});
}



$( document ).ready ( function ()
{
	getContent();
});