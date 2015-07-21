<?php

require '../vendor/autoload.php';
include '../views/confirm_delete_modal.php';


$website_list = new \WebDevResources\WebsiteData();
$p = new \WebDevResources\Paginator();
$votes = new \WebDevResources\Votes();
$votes->checkForId();
$start = $p->getStart();
$end = $p->getEnd();
$websites = $p->getWebsitesSubset($start, $end);
$categories = $website_list->getAllCategories();

$template = new \WebDevResources\Template('../views/base.phtml');
//Render the content template we want, passing through the $websites and $categories variables so the template can access them.
$template->render('../views/index/index.phtml', ['websites' => $websites, 'categories' => $categories, 'p' => $p, 'votes' => $votes, 'website_list' => $website_list]);