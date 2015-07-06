<?php
require '../src/WebDevResources/WebsiteData.php';
require '../src/WebDevResources/Template.php';
include '../views/confirm_delete_modal.php';

$website_list = new \WebDevResources\WebsiteData();
$websites = $website_list->getWebsites();
$categories = $website_list->getAllCategories();

$template = new \WebDevResources\Template('../views/base.phtml');
//Render the content template we want, passing through the $websites and $categories variables so the template can access them.
$template->render('../views/index/index.phtml', ['websites' => $websites, 'categories' => $categories]);