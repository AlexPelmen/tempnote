<?php
    require __DIR__ . "/vard.php";
    require __DIR__ . "/config.php";
    require __DIR__ . "/tempclass.php";

    $Temp = new TempDB(); 
    $query = $_GET[ "request" ];
    if( empty( $query ) )
        exit( "" );
    $resp = $Temp->search( $query );
    exit( json_encode( $resp ) );
    exit( json_encode( $resp ? $resp : false ) );

    





    
    


    