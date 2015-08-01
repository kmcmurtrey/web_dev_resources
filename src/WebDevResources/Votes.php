<?php
namespace WebDevResources;

//Votes class has the methods relating to voting for a particular website.
class Votes
{

    //On construction of object, connects to database.
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

    //This checks for the website ID as a $_Get variable. If present (from clicking the Vote button, the vote count
    // for that website is increased.
    public function checkForId() {
        if (isset($_GET['id'])) {
            $websiteId = $_GET['id'];
            $this->addVote($websiteId);
        }
    }

    //This method runs the SQL query to update the vote count for a particular website.
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

    //This method creates the URL for the voting buttons with each website list item.
    public function getVoteUrl($id, $currentPage) {
        if (isset($_GET['sort'])) {
            echo '/sort/' . $_GET['sort'];
        } if (isset($_GET['category'])) {
            echo '/category/' . $_GET['category'];
        }
        echo '/website' . $id . '/pg' . $currentPage . '/';
    }
}