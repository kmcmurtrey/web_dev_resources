<?php
include 'global.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Web Development Resources</title>
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
                        <a href="edit.php?id=<?php echo $website['id'] ?>" class="button">Edit</a>
                        <a href="delete.php?id=<?php echo $website['id'] ?>" class="button">Delete</a>
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

</body>
</html>