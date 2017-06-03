<?php

//build your connection

$server = "servername";
$user = "username";
$password = "password";
$db = "database";
 

$mysqli = new mysqli (  $server,$user,$password , $db);

//update to include your table name
$table   = "mn_posts";

//Get all columns in a table
$sql  = "DESCRIBE `{$table}`";

//run query
$rows = $mysqli->query($sql);

//build array from the list of columns
$fields = array();
while($row = $rows->fetch_assoc()) {
 array_push($fields, $row['Field']);
}


//create a file that has the same name as the table
$file = fopen( $table . ".txt", "w");

$str_line = array(); 

//get stats for each of the fields where field is not empty or null
foreach ($fields as $field) {

    $stats = "SELECT count(`{$field}`) as cn FROM  `{$table}` where `{$field}` is not null and `{$field}` != '' ";
    $details = $mysqli->query($stats);

    //get result of query
    while($result = $details->fetch_assoc() ) {
        
        $str_line = $field . "," .  $result['cn'] . PHP_EOL ;
        fwrite ($file, $str_line);
    }
}


//close mysql connection
mysqli_close($mysqli);

//close file
fclose($file);

//trigger download
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.basename( $table . '.txt'));
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
readfile( $table . '.txt');
 
?>