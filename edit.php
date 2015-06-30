<?php

include 'global.php';

//if the id wasn't passed, go to index.php
if (!isset($_GET['id'])) {
    header('Location: index.php');
}

//if the form wasn't submitted ('edit' button was selected), SELECT website data based on $_GET['id']
if (!isset($_POST['save_website'])) {
    include 'database/selected_website.php';
}

//if the form was submitted (after editing), prepare query to update website's info in database
if (isset($_POST['save_website'])) {
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
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Web Development Resources</title>
    <link rel="stylesheet" type="text/css" href="views/css/style.css">
</head>
<body>
<div class="container">
    <h1>Edit Website</h1>

    <?php include 'form.php' ?>

</div>
</body>
</html>