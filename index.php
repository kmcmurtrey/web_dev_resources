<?php
include 'global.php';

$stmt = $dbh->query("SELECT * FROM websites");

$websites = $stmt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($websites);
//die();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Web Development Resources</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
    
        <h1>Web Development Resources</h1>

        <div class="website-list">
            <ol>
                <!-- loop through each website -->
                <?php foreach( $websites as $website ) : ?>
                    <li>
                        <!-- output: <a href="__URL__">__TITLE__</a> -->
                        <a href="<?php echo $website['url'] ?>"><?php echo $website['title'] ?></a>
                        <p>Description: <?php echo $website['description'] ?></p>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </div>

<a href="new.php">New Website</a>
</body>
</html>