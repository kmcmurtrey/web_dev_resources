<?php

require '../models/WebsiteData.php';

//if the id wasn't passed, go to index.php
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo 'You did not pass in an ID.';
    exit;
}

$website_list = new WebsiteData();
$website = $website_list->getWebsiteById($_GET['id']);

if ($website === false) {
    echo 'Website not found.';
    exit;
}

if ($website_list->deleteWebsite($_GET['id'])) {
    header('Location: index.php');
    exit;
} else {
    echo "Failed to delete website.";
    exit;
}