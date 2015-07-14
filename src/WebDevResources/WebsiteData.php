<?php
namespace WebDevResources;

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
            $this->dbh = new \PDO('mysql:host=localhost;dbname=php_project', 'homestead', 'secret');
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

    public function sortAlpha() {
        $allWebsites = $this->getWebsites();
        var_dump($allWebsites);
        die;
    }

    public function sortVote() {
        $allWebsites = $this->getWebsites();
    }
}