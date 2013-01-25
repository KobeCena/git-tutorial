<?php 
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
    header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT"); 
    header("Cache-Control: no-cache, must-revalidate"); 
    header("Pragma: no-cache");
    header("Content-type: application/json");
    
    $return = array( 'login' => false , 'loginDate' => Date('Y-m-d H:i:s') );
    if ( $_REQUEST ) {
        $user = "test@test.com";
        $password = "password";

        if ( $_REQUEST['email'] == $user && $_REQUEST['password'] == $password ) {
            $return['login'] = true;
        }
    }
    echo json_encode($return);

?>