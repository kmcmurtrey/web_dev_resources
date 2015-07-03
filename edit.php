<?php

require 'models/website.php';

//if the id wasn't passed, go to index.php
if (!isset($_GET['id'])) {
    echo 'You did not pass in an ID.';
    exit;
}

//Populate form fields with website data based on $_GET['id']
    $website_list = new WebsiteData();
    $website = $website_list->getWebsiteById($_GET['id']);
    $categories = $website_list->getAllCategories();

if ($website === false) {
    echo 'Website not found';
    exit;
}

//if the form was submitted (after editing), prepare query to update database row
if (isset($_POST['save_website'])) {
    include 'database/edit_website.php';
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