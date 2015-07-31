<?php

require '../vendor/autoload.php';

//If the id wasn't passed, display error.
if (!isset($_GET['id'])) {
    echo 'You did not pass in a valid ID.';
    exit;
}

//Check if the form was submitted, and call the updateWebsite method.
if (isset($_POST['save_website'])) {
    $website_list = new \WebDevResources\WebsiteData();
    if ($website_list->updateWebsite($_POST)) {
        header('Location: /');
        exit;
    } else {
        echo 'An error occurred when saving the website.';
        exit;
    }
}

//Retrieve the website data for the to-be-edited website, which will then be populated in the form fields.
$website_list = new \WebDevResources\WebsiteData();
$website = $website_list->getWebsiteById($_GET['id']);
$categories = $website_list->getAllCategories();

if ($website === false) {
    echo 'Website not found';
    exit;
}

//Render the page for editing websites, passing through the $website and $categories data for the form.
$template = new \WebDevResources\Template('../views/base.phtml');
$template->render('../views/index/edit.phtml', ['website' => $website, 'categories' => $categories]);