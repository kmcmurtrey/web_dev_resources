<?php
namespace WebDevResources;

class Paginator extends WebsiteData {
    public $currentPage;
    public $totalWebsites;
    public $websitesPerPage;
    public $totalPages;

    public function __construct() {
        if (empty($_GET['pg'])) {
            $this->currentPage = 1;
        } else {
            $this->currentPage = $_GET['pg'];
        }
        $this->totalWebsites = $this->getWebsitesCount();
        $this->websitesPerPage = 4;
        $this->totalPages = ceil($this->totalWebsites / $this->websitesPerPage);
    }

    public function getWebsiteRange() {
        $start = (($this->currentPage - 1) * $this->websitesPerPage) + 1;
        $end = $this->currentPage * $this->websitesPerPage;
        if ($end > $this->totalWebsites) {
            $end = $this->totalWebsites;
        }
        $websites = $this->getWebsitesSubset($start, $end);
        return $websites;
    }
}