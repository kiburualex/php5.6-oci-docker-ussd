<?php
/**
 * Ref: connection
 *  oci_pconnect ( string $username , string $password 
 * [, string $connection_string [, string $character_set 
 * [, int $session_mode ]]] ) : resource
 */
// Create connection to Oracle
$conn = oci_connect('username', 'password', 'connection_string(x.x.x.x:yyyy/db.demo.com)');

if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit;
}
else {
    print "Connected to Oracle!";
}
// Close the Oracle connection
oci_close($conn);

?>