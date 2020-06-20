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
#
$conn = db2_connect( $conn_string, "", "" );
if( $conn )
{
    echo "Connection succeeded.";

    $create = 'CREATE TABLE animals (id INTEGER, breed VARCHAR(32),
    name CHAR(16), weight DECIMAL(7,2))';
$result = db2_exec($conn, $create);
if ($result) {
    print "Successfully created the table.\n";
}
    odbc_close( $conn );
}
else
{
    echo "Connection failed.";
}
?>