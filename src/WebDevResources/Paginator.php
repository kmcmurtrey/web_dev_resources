<?php
namespace WebDevResources;

class Paginator extends WebsiteData
{
    public $currentPage;
    public $totalWebsites;
    public $websitesPerPage;
    public $totalPages;

    public function __construct() {
        $this->connect();
        if (empty($_GET['pg'])) {
            $this->currentPage = 1;
        } else {
            $this->currentPage = $_GET['pg'];
        }
        $this->totalWebsites = $this->getWebsitesCount();
        $this->websitesPerPage = 4;
        $this->totalPages = ceil($this->totalWebsites / $this->websitesPerPage);
    }

    public function getStart() {
        $start = (($this->currentPage - 1) * $this->websitesPerPage) + 1;
        return $start;
    }

    public function getEnd() {
        $end = $this->currentPage * $this->websitesPerPage;
        if ($end > $this->totalWebsites) {
            $end = $this->totalWebsites;
        }
        return $end;
    }

    public function getWebsitesSubset($start, $end) {
        if (isset($_GET['sort']) && $_GET['sort'] === 'vote') {
            $allWebsites = $this->sortVote();
        } else {
            $allWebsites = $this->getWebsites();
        }
        $subset = array();
        $position = 0;

        foreach ($allWebsites as $website) {
            $position += 1;
            if ($position >= $start && $position <= $end) {
                $subset[] = $website;
            }
        }
        return $subset;
    }

    public function getPageUrl($page) {
        echo '"index.php?pg=' . $page;
        if (isset($_GET['category'])) {
            echo '&category=' . $_GET['category'] . '"';
        }
        if (isset($_GET['sort'])) {
            echo '&sort=' . $_GET['sort'] . '"';
        } else {
            echo '"';
        }
    }
}