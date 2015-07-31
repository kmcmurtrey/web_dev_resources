<?php

require '../vendor/autoload.php';

// If form was not submitted ("New website" link was clicked)
if (!isset($_POST['save_website'])) {
    $website_list = new \WebDevResources\WebsiteData();
    $categories = $website_list->getAllCategories();
}

// Check if the form was submitted, and call the addWebsite method.
if (isset($_POST['save_website'])) {
    $website_list = new \WebDevResources\WebsiteData();
    if ($website_list->addWebsite($_POST)) {
        header('Location: /');
        exit;
    } else {
        echo 'An error occurred when saving the website.';
        exit;
    }
}

//Render the page for adding New websites, passing through the $categories array for the form.
$template = new \WebDevResources\Template('../views/base.phtml');
$template->render('../views/index/new.phtml', ['categories' => $categories]);