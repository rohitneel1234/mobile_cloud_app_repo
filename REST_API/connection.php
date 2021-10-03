<?php
$servername = getenv('CLOUDSQL_DSN'); //replace it with your database server name
$username = getenv('CLOUDSQL_USER');  //replace it with your database username
$password = getenv('CLOUDSQL_PASSWORD');  //replace it with your database password
$dbname = getenv('CLOUDSQL_DB');          // replace it with your database name
// Create connection
$conn = mysqli_connect(null, $username, $password, $dbname, null, $servername);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>



	
	
	