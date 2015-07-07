<?php

require '../vendor/autoload.php';

// If form was not submitted ("Add new website" link)
if (!isset($_POST['save_website'])) {
    $website_list = new \WebDevResources\WebsiteData();
    $categories = $website_list->getAllCategories();
}

// check if the form was submitted
if (isset($_POST['save_website'])) {
    $website_list = new \WebDevResources\WebsiteData();
    if ($website_list->addWebsite($_POST)) {
        header('Location: index.php');
        exit;
    } else {
        echo 'An error occurred when saving the website.';
        exit;
    }
}

$template = new \WebDevResources\Template('../views/base.phtml');
$template->render('../views/index/new.phtml', ['categories' => $categories]);