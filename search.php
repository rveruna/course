<?php

$dbHost = 'veronikarosicova.co.uk.mysql';
$dbUsername = 'veronikarosicova_co_uk';
$dbPassword = 'Ty7ih6ot';
$dbName = 'veronikarosicova_co_uk';


//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

error_reporting(E_ERROR);

//get search term
$searchTerm = $_GET['term'];
//get matched data from course table
$query = $db->query("SELECT DISTINCT title FROM course WHERE title LIKE '%".$searchTerm."%' ORDER BY title ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['title'];
}
//return json data
echo json_encode($data);
?>