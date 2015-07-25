<?php
namespace WebDevResources;
define("BASE_URL","");
define("ROOT_PATH",$_SERVER["DOCUMENT_ROOT"] . "/web_dev_resources/public");

class WebsiteData
{
    protected $dbh;

    public function __construct() {
        $this->connect();
    }

    public function connect()
    {
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

    public function getWebsites()
    {
        if (!isset($_GET['category'])) {
            try {
                $query = $this->dbh->prepare("SELECT websites.*, votes.count FROM websites INNER JOIN votes ON (votes.website_id = websites.id) ORDER BY title");
                $query->execute();
                $query = $query->fetchAll(\PDO::FETCH_ASSOC);
                return $query;
            } catch (Exception $e) {
                echo $e->getMessage();
                die();
            }
        }

        if (isset($_GET['category'])) {
            try {
                $query = $this->dbh->prepare("SELECT websites.*, votes.count FROM websites INNER JOIN votes ON (votes.website_id = websites.id) WHERE category = :category ORDER BY title");
                $query->execute(array(
                    'category' => $_GET['category']
                ));
                return $query->fetchAll(\PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                echo $e->getMessage();
                die();
            }
        }
    }

    public function getWebsitesCount() {
        return count($this->getWebsites());
    }



    public function getAllCategories()
    {
        try {
            $query = $this->dbh->prepare("SELECT DISTINCT category FROM websites ORDER BY category");
            $query->execute();
            return $query->fetchAll(\PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }

    public function addWebsite($post_data) {
        //Insert new website data into websites table
        try {
            $query = $this->dbh->prepare("INSERT INTO websites (url, title, category, description) VALUES (:url, :title, :category, :description)");

            $post_data = [
                'url' => $post_data['url'],
                'title' => $post_data['title'],
                'category' => $post_data['category'],
                'description' => $post_data['description']
            ];

            $query->execute($post_data);

            //Insert empty row into votes table after creating website
            $vote_id = $this->dbh->lastInsertId();
            $query = $this->dbh->prepare("INSERT INTO votes (website_id, count) VALUES (:id, 0)");

            $post_data = [
                'id' => $vote_id
            ];

            return $query->execute($post_data);
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }


    }

    public function getWebsiteById($id) {
        try {
            $query = $this->dbh->prepare("SELECT * FROM websites WHERE id = :id");

            $values = ['id' => $id];

            $query->execute($values);
            return $query->fetch(\PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }

    public function updateWebsite($post_data) {
        try {
            $query = $this->dbh->prepare("UPDATE websites SET url = :url, title = :title, description = :description, category = :category WHERE id = :id");

            $post_data = [
                'url' => $post_data['url'],
                'title' => $post_data['title'],
                'description' => $post_data['description'],
                'category' => $post_data['category'],
                'id' => $post_data['id']
            ];

            return $query->execute($post_data);
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }

    public function deleteWebsite($id) {
        try {
            $query = $this->dbh->prepare("DELETE FROM websites WHERE id = :id");

            $values = ['id' => $id];

            $result = $query->execute($values);

            if (!$result) {
                return false;
            }

            //Remove corresponding row from votes table when deleting website
            $query = $this->dbh->prepare("DELETE FROM votes WHERE website_id = :id");
            return $query->execute($values);

        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }

    public function getSortUrl($sortType) {
        echo '/sort/' . $sortType;
        if (isset($_GET['category'])) {
            echo '/category/' . $_GET['category'] . '/';
        } else {
            echo '/';
        }
    }

    public function checkForSort() {
        if (isset($_GET['sort'])) {
            $this->sortVote();
        }
    }

    public function sortVote() {
        if (!isset($_GET['category'])) {
            if ($_GET['sort'] === 'leastPop') {
                $query = $this->dbh->prepare("SELECT websites.*, votes.count FROM websites INNER JOIN votes ON (votes.website_id = websites.id) ORDER BY votes.count");
            }
            if ($_GET['sort'] === 'mostPop') {
                $query = $this->dbh->prepare("SELECT websites.*, votes.count FROM websites INNER JOIN votes ON (votes.website_id = websites.id) ORDER BY votes.count DESC");
            }
            try {
                $query->execute();
                $query = $query->fetchAll(\PDO::FETCH_ASSOC);
                return $query;
            } catch (Exception $e) {
                echo $e->getMessage();
                die();
            }
        }

        if (isset($_GET['category'])) {
            if ($_GET['sort'] === 'leastPop') {
                $query = $this->dbh->prepare("SELECT websites.*, votes.count FROM websites INNER JOIN votes ON (votes.website_id = websites.id) WHERE category = :category ORDER BY votes.count");
            }
            if ($_GET['sort'] === 'mostPop') {
                $query = $this->dbh->prepare("SELECT websites.*, votes.count FROM websites INNER JOIN votes ON (votes.website_id = websites.id) WHERE category = :category ORDER BY votes.count DESC");
            }
            try {
                $query->execute(array(
                    'category' => $_GET['category']
                ));
                return $query->fetchAll(\PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                echo $e->getMessage();
                die();
            }
        }
    }
}