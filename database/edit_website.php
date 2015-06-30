<?php
try {
//define input variables sent via POST
$url = $_POST['url'];
$title = $_POST['title'];
$category = $_POST['category'];
$description = $_POST['description'];

//prepare statement to update website's information
$stmt = $dbh->prepare("UPDATE websites SET url = :url, title = :title, description = :description, category = :category WHERE id = :id");

//execute SQL update query
if ($stmt->execute(array(
'url' => $url,
'title' => $title,
'description' => $description,
'category' => $category,
'id' => $_GET['id']
))) {
header('Location: index.php');
} else {
echo "Your changes were not saved to the database.";
}

} catch (Exception $e) {
echo $e->getMessage();
die();
}