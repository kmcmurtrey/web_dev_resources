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

</head>
<body>

<ol>
    <!-- loop through each website -->
    <?php foreach( $websites as $website ) : ?>
        <li>
            <!-- output: <a href="__URL__">__TITLE__</a> by: __AUTHOR__ -->
            <a href="<?php echo $website['url'] ?>"><?php echo $website['title'] ?></a>
            <p>Description: <?php echo $website['description'] ?></p>
        </li>
    <?php endforeach; ?>
</ol>

<a href="new.php">New Website</a>
</body>
</html>