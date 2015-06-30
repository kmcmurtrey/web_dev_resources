<?php
//define input variables sent via POST
$url = $_POST['url'];
$title = $_POST['title'];
$category = $_POST['category'];
$description = $_POST['description'];

//prepare SQL query
try {
    $stmt = $dbh->prepare("INSERT INTO websites (url, title, category, description) VALUES (:url, :title, :category, :description)");

    //run the SQL query
    if ($stmt->execute(array(
        'url' => $url,
        'title' => $title,
        'category' => $category,
        'description' => $description
    ))
    ) {
        //go back to index.php
        header('Location: index.php');
    } else {
        //display an error if failed
        echo "Failed to add website";
    }
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}