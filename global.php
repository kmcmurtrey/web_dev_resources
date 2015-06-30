<?php
try {
    //XAMPP MySQL [username = 'root', password = '']
    //Homestead MySQL [username = 'homestead', password = 'secret']
    $dbh = new PDO('mysql:host=localhost;dbname=php_project', 'homestead', 'secret');
} catch (PDOException $e) {
    echo $e->getMessage();
    die;
}

$stmt_category = $dbh->query("SELECT DISTINCT category FROM websites ORDER BY category");
$categories = $stmt_category->fetchAll(PDO::FETCH_ASSOC);

//Prepares SQL query for displaying websites based on category passed through $_GET.
if (!isset($_GET['category'])) {
    try {
        $stmt_websites = $dbh->query("SELECT * FROM websites");
        $websites = $stmt_websites->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo $e->getMessage();
        die();
    }
}

if (isset($_GET['category'])) {
    try {
        $stmt_websites = $dbh->prepare("SELECT * FROM websites WHERE category = :category");
        $stmt_websites->execute(array(
            'category' => $_GET['category']
        ));

        $websites = $stmt_websites->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo $e->getMessage();
        die();
    }
}