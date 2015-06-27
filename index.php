<?php
include 'global.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Development Resources</title>

    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
    
        <h1><a href="index.php">Web Development Resources</a></h1>

        <div class="website-list">
            <ol>
                <!-- loop through each website -->
                <?php foreach( $websites as $website ) : ?>
                    <li>
                        <!-- output: <a href="__URL__">__TITLE__</a> -->
                        <a href="<?php echo $website['url'] ?>" class="website-title"><?php echo $website['title'] ?></a>
                        <p>Description: <?php echo $website['description'] ?></p>
                        <a href="edit.php?id=<?php echo $website['id'] ?>" class="btn btn-primary btn-xs" role="button">Edit</a>
                        <a href="" class="btn btn-default btn-xs" role="button">Delete</a>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div><!--

        --><div class="sidebar">
            <h2>Category</h2>

            <ol>
                <?php foreach ( $categories as $category ) : ?>
                <li>
                    <a href="<?php echo 'index.php?category=' . $category['category']; ?>"><?php echo $category['category']; ?></a>
                </li>
                <?php endforeach; ?>
            </ol>
        </div>
        <a href="new.php" class="button">New Website</a>
    </div>

    <script src="js/bootstrap.min.js"></script>
</body>
</html>