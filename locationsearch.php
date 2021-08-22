<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'ngo';
//connect with the database
$db = new mysql($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $db->query("SELECT * FROM `registration` WHERE address LIKE '%".$searchTerm."%' ORDER BY address ASC LIMIT 0 , 7");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['state_name'];
}

$query = $db->query("SELECT * FROM registration WHERE city LIKE '%".$searchTerm."%' Group by city  ORDER BY city ASC LIMIT 0 , 7");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['city'];
}

/*$query = $db->query("SELECT * FROM tbl_peopleinfo WHERE zipcode LIKE '%".$searchTerm."%' Group by zipcode  ORDER BY zipcode ASC LIMIT 0 , 5");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['zipcode'];
}*/
//return json data
echo json_encode($data);
?>