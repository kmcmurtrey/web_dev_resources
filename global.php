<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=php_project', 'root', '');
} catch (PDOException $e) {
    echo $e->getMessage();
    die;
}