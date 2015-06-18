<?php

include 'global.php';

//if the id wasn't passed, go to index.php
if (!isset($_GET['id'])) {
    header('Location: index.php');
}

//prepare query to find website by id
try {
    $stmt = $dbh->prepare("DELETE FROM websites WHERE id = :id");

    //execute statement based on current website id
    if ($stmt->execute(array(
        'id' => $_GET['id']
    )) ){
        header('Location: index.php');
    } else {
        echo "Failed to delete website";
    }
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}
