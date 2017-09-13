<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test MySQL Connection on OpenShift</title>
</head>
<body>
<?php

$mysqlpass = file_get_contents('/data/database-password');
$mysql_user = file_get_contents('/data/database-user');

echo "mysql user = " . $mysql_user . "\n";
echo "mysql_pass = " . $mysqlpass . "\n";

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("mysql", $mysql_user, $mysqlpass);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Print host information
echo "Connect Successfully. Host info: " . mysqli_get_host_info($link);
 
 // Attempt select query execution
$sql = "select * from `mysqldb`.`tb_user`";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>nome</th>";
                echo "<th>idade</th>";                
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nome'] . "</td>";
                echo "<td>" . $row['idade'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} 
// Close connection
mysqli_close($link);
?>
</body>
</html>