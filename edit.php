<?php

include 'global.php';

//if the id wasn't passed, go to index.php
if (!isset($_GET['id'])) {
    header('Location: index.php');
}

//if the form wasn't submitted
if (!isset($_POST['save_website'])) {
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
}

//if the form was submitted (after editing), prepare query to update website's info in database
if (isset($_POST['save_website'])) {
    try {
        //define input variables sent via POST
        $url = $_POST['url'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        //prepare statement to update website's information
        $stmt = $dbh->prepare("UPDATE websites SET url = :url, title = :title, description = :description WHERE id = :id");

        //execute SQL update query
        if ($stmt->execute(array(
            'url' => $url,
            'title' => $title,
            'description' => $description,
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
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
    <h1>Edit Website</h1>

    <?php include 'form.php' ?>

</div>
</body>
</html>