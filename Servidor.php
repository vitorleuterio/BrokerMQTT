<?php
$dataFileName = 'MQTTdate.json'; 
 
while ( true )
{
    $requestedTimestamp = isset( $_GET['timestamp'] ) ? (int)$_GET['timestamp'] : null;      
  
    clearstatcache();  
 
    $modifiedAt = filemtime( $dataFileName );       
 
    if ( $requestedTimestamp == null || $modifiedAt > $requestedTimestamp )
    {
        $data = file_get_contents( $dataFileName );
 
        $arrData = array(
            'content' => $data,
            'timestamp' => $modifiedAt
        );
 
        $json = json_encode( $arrData );
 
        echo $json;
 
        break;
    }
    else
    {
        sleep( 2 );
        continue;
    }
}