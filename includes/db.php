<?php
// db variables
$db_host = 'localhost';
$db_user = 'root';
$db_pw = 'root';
$db_name = 'super_list_db';

// make db connection
$connection = mysqli_connect($db_host, $db_user, $db_pw, $db_name);
//check connection
if($connection){
    echo "<script>console.log('Database connected');</script>";
} else {
    echo "<script>console.log('No database connection');</script>";
}

?>