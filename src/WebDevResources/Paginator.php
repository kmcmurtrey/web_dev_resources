<?php
namespace WebDevResources;

//Paginator class has the methods to get how many pages of websites there are, which websites to display,
// and how many page links are in the pagination.
class Paginator extends WebsiteData
{
    public $currentPage;
    public $totalWebsites;
    public $websitesPerPage;
    public $totalPages;

    //On object creation, this determines the currentPage, total number of website items, websites per page, and
    //total pages.
    public function __construct() {
        $this->connect();
        if (empty($_GET['pg'])) {
            $this->currentPage = 1;
        } else {
            $this->currentPage = $_GET['pg'];
        }
        $this->totalWebsites = $this->getWebsitesCount();
        $this->websitesPerPage = 5;
        $this->totalPages = ceil($this->totalWebsites / $this->websitesPerPage);
    }

    //Methods to get the first and last website to display on the page.
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

    //This method gets the list of websites based on whether they've been sorted by certain selected criteria on the page.
    //Then it cycles through that list of websites to determine which ones to actually display based on the current page.
    public function getWebsitesSubset($start, $end) {
        if (isset($_GET['sort']) && (($_GET['sort'] === 'leastPop') || ($_GET['sort'] === 'mostPop'))) {
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

    //This method creates the URL for the pagination links at the bottom of each page.
    public function getPageUrl($page) {
        if (isset($_GET['sort'])) {
            echo '/sort/' . $_GET['sort'];
        } if (isset($_GET['category'])) {
            echo '/category/' . $_GET['category'];
        }
        echo '/pg' . $page . '/';
    }
}