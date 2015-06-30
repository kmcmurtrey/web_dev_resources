<?php 

include 'global.php';

// check if the form was submitted
if (isset($_POST['save_website'])) {
    include 'new_website.php';
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