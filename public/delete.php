<?php

require '../vendor/autoload.php';

//if the id wasn't passed, display an error.
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo 'You did not pass in an ID.';
    exit;
}

//Retrieve website data for the to-be-deleted website.
$website_list = new \WebDevResources\WebsiteData();
$website = $website_list->getWebsiteById($_GET['id']);

if ($website === false) {
    echo 'Website not found.';
    exit;
}

//Call the deleteWebsite method.
if ($website_list->deleteWebsite($_GET['id'])) {
    header('Location: /');
    exit;
} else {
    echo "Failed to delete website.";
    exit;
}