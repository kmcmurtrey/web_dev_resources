<?php 

include 'global.php';

$title = $_POST['title'];
$url = $_POST['url'];
$description = $_POST['description'];

if (isset($_POST['save_website'])) {
//    $website = $_POST['website[]'];
    echo $title, $url, $description;
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
            <h1>Add a new Website</h1>

            <?php include 'form.php' ?>

        </div>
    </body>
</html>