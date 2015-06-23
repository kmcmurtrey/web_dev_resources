<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=php_project', 'root', '');
} catch (PDOException $e) {
    echo $e->getMessage();
    die;
}

$stmt_websites = $dbh->query("SELECT * FROM websites");
$websites = $stmt_websites->fetchAll(PDO::FETCH_ASSOC);

$stmt_category = $dbh->query("SELECT DISTINCT category FROM websites ORDER BY category");
$categories = $stmt_category->fetchAll(PDO::FETCH_ASSOC);