<?php
$dbHost = 'localhost';
$dbUsername = 'explorew_Explore';
$dbPassword = 'Admin123!@#';
$dbName = 'explorew_Explorewide';
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $db->query("SELECT * FROM tbl_category WHERE cat_name LIKE '%".$searchTerm."%' ORDER BY cat_name ASC LIMIT 0 , 7");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['cat_name'];
}

$query = $db->query("SELECT * FROM tbl_cat_type WHERE cat_type LIKE '%".$searchTerm."%' ORDER BY cat_type ASC LIMIT 0 , 7");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['cat_type'];
}

$query = $db->query("SELECT * FROM tbl_peopleinfo WHERE people_name LIKE '%".$searchTerm."%' Group by people_name  ORDER BY people_name ASC LIMIT 0 , 7");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['people_name'];
}
//return json data
echo json_encode($data);
?>