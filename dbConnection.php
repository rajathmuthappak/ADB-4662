<?php

$database = "BLUDB";        # Get these database details from
$hostname = "dashdb-txn-sbox-yp-dal09-11.services.dal.bluemix.net";  # the web console
$user     = "chj37602";   #
$password = "ptfmbkw4439+fwrd";   #
$port     = 50000;          #
$ssl_port = 50001;          #

# Build the connection string
#
$driver  = "DRIVER={IBM DB2 ODBC DRIVER};";
$dsn     = "DATABASE=$database; " .
           "HOSTNAME=$hostname;" .
           "PORT=$port; " .
           "PROTOCOL=TCPIP; " .
           "UID=$user;" .
           "PWD=$password;";

$conn_string = $driver . $dsn;     # Non-SSL

# Connect

$conn = db2_connect( $conn_string, "", "" );

if(!$conn){
    echo "DB Connection Failure..!!";
}
?>