<?php

require 'models/WebsiteData.php';

// If form was not submitted ("Add new website" link)
if (!isset($_POST['save_website'])) {
    $website_list = new WebsiteData();
    $categories = $website_list->getAllCategories();
}

// check if the form was submitted
if (isset($_POST['save_website'])) {
    $website_list = new WebsiteData();
    if ($website_list->addWebsite($_POST)) {
        header('Location: index.php');
        exit;
    } else {
        echo 'An error occurred when saving the website.';
        exit;
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
            <h1>Add a new Website</h1>

            <?php include 'form.php' ?>

        </div>
    </body>
</html>