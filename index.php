<?php
require 'models/WebsiteData.php';
include 'views/confirm_delete_modal.php';

$website_list = new WebsiteData();
$websites = $website_list->getWebsites();
$categories = $website_list->getAllCategories();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Development Resources</title>

    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="views/css/style.css">

    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="views/js/app.js"></script>
</head>
<body>
    <div class="container">

        <h1><a href="index.php">Web Development Resources</a></h1>
        <div class="row">
            <div class="website-list col-md-6 col-md-offset-1">
                <ol>
                    <!-- loop through each website -->
                    <?php foreach( $websites as $website ) : ?>
                        <li>
                            <!-- output: <a href="__URL__">__TITLE__</a> -->
                            <a href="<?php echo $website['url'] ?>" class="website-title"><?php echo $website['title'] ?></a>
                            <p>Description: <?php echo $website['description'] ?></p>
                            <a href="public/edit.php?id=<?php echo $website['id'] ?>" class="btn btn-primary btn-xs" role="button">Edit</a>
                            <a class="btn btn-default btn-xs delete-btn" role="button" data-toggle="modal" data-target="#confirm-delete" data-href="delete.php?id=<?php echo $website['id']; ?>">Delete</a>
                        </li>
                    <?php endforeach; ?>
                </ol>
                <a href="public/new.php" class="button">New Website</a>
            </div>

            <div class="sidebar col-md-3 col-md-offset-1">
                <h2>Category</h2>

                <ol>
                    <?php foreach ( $categories as $category ) : ?>
                    <li>
                        <a href="<?php echo 'index.php?category=' . $category['category']; ?>"><?php echo $category['category']; ?></a>
                    </li>
                    <?php endforeach; ?>
                </ol>

            </div>
        </div>

    </div>

</body>
</html>