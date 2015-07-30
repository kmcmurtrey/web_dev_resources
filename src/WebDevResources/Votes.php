<?php
namespace WebDevResources;

class Votes
{

    public function __construct() {
        $this->connect();
    }

    public function connect() {
        try {
            //XAMPP MySQL [username = 'root', password = '']
            //Homestead MySQL [username = 'homestead', password = 'secret']
            //ScotchBox [username = 'root', password = 'root']
            $this->dbh = new \PDO('mysql:host=localhost;dbname=php_project', 'root', 'root');
        } catch (\PDOException $e) {
            echo $e->getMessage();
            die;
        }
    }

    public function checkForId() {
        if (isset($_GET['id'])) {
            $websiteId = $_GET['id'];
            $this->addVote($websiteId);
        }
    }

    public function addVote($websiteId) {
        try {
            $query = $this->dbh->prepare("UPDATE votes SET count = count + 1 WHERE website_id = :id");

            $sqlData = [
                'id' => $websiteId
            ];

            return $query->execute($sqlData);
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }

    public function getVoteUrl($id, $currentPage) {
        if (isset($_GET['sort'])) {
            echo '/sort/' . $_GET['sort'];
        } if (isset($_GET['category'])) {
            echo '/category/' . $_GET['category'];
        }
        echo '/website' . $id . '/pg' . $currentPage . '/';
    }
}