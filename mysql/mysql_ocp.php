<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test MySQL Connection on OpenShift</title>
</head>
<body>
<?php

$mysqlpass = getenv('MYSQL_PASSWORD');
$mysql_user = getenv('MYSQL_USER');

echo "mysql user = " . $mysql_user;
echo "mysql_pass = " . $mysqlpass;

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("mysql", $mysql_user, $mysqlpass);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Print host information
echo "Connect Successfully. Host info: " . mysqli_get_host_info($link);
 
// Close connection
mysqli_close($link);
?>
</body>
</html>