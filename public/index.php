<?php

//Uses Composer's autoloader, and includes a modal from Bootstrap.
require '../vendor/autoload.php';
include '../views/confirm_delete_modal.php';

//Instantiates new WebsiteData, Paginator, and Votes classes.
$website_list = new \WebDevResources\WebsiteData();
$p = new \WebDevResources\Paginator();
$votes = new \WebDevResources\Votes();

//Checks for website Id's. If present, the vote count is increased.
$votes->checkForId();

//Method calls to get the starting and ending websites to display in the current view, list of websites that will be displayed, and the category list.
$start = $p->getStart();
$end = $p->getEnd();
$websites = $p->getWebsitesSubset($start, $end);
$categories = $website_list->getAllCategories();

//Instantiates Template class which renders the different views.
$template = new \WebDevResources\Template('../views/base.phtml');
//Render the content template we want, passing through variables so the template can access them.
$template->render('../views/index/index.phtml', ['websites' => $websites, 'categories' => $categories, 'p' => $p, 'votes' => $votes, 'website_list' => $website_list]);