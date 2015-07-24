<?php

require '../vendor/autoload.php';

//if the id wasn't passed, display error
if (!isset($_GET['id'])) {
    echo 'You did not pass in an ID.';
    exit;
}

//if the form was submitted (after editing), prepare query to update database row
if (isset($_POST['save_website'])) {
    $website_list = new \WebDevResources\WebsiteData();
    if ($website_list->updateWebsite($_POST)) {
        header('Location: /index.php');
        exit;
    } else {
        echo 'An error occurred when saving the website.';
        exit;
    }
}

//Populate form fields with website data based on $_GET['id']
$website_list = new \WebDevResources\WebsiteData();
$website = $website_list->getWebsiteById($_GET['id']);
$categories = $website_list->getAllCategories();

if ($website === false) {
    echo 'Website not found';
    exit;
}

$template = new \WebDevResources\Template('../views/base.phtml');
$template->render('../views/index/edit.phtml', ['website' => $website, 'categories' => $categories]);