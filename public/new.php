<?php

require '../models/WebsiteData.php';

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
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Web Development Resources</title>

        <link href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="/views/css/style.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="/vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="/views/js/app.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-inverse" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Web Development Resources</a>
                </div>
                <a href="new.php" type="button" class="btn btn-default navbar-btn navbar-right">New Website</a>
            </div>

        </nav>

        <div class="container">
            <h1>Add a new Website</h1>

            <?php include 'form.php' ?>

        </div>

        <nav class="navbar navbar-default navbar-inverse navbar-fixed-bottom" role="navigation">
            <div class="container-fluid">
                <div class="navbar-footer">
                    <p class="copyright">&copy 2015 Korey McMurtrey</p>
                </div>
            </div>

        </nav>
        <?php include '../views/confirm_delete_modal.php'; ?>
    </body>
</html>