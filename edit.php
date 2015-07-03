<?php

//if the id wasn't passed, go to index.php
if (!isset($_GET['id'])) {
    header('Location: index.php');
}

//if the form wasn't submitted ('edit' button was selected), SELECT website data based on $_GET['id']
if (!isset($_POST['save_website'])) {
    include 'database/selected_website.php';
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