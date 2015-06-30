<?php
try {
//prepare statement to find current website
$stmt = $dbh->prepare("SELECT * FROM websites WHERE id = :id");

//execute SQL query
$stmt->execute(array('id' => $_GET['id']));

//set $website variable for the form fields
$website = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (Exception $e) {
echo $e->getMessage();
die();
}