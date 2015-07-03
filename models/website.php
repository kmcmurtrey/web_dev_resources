<?php
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
            $this->dbh = new PDO('mysql:host=localhost;dbname=php_project', 'homestead', 'secret');
        } catch (PDOException $e) {
            echo $e->getMessage();
            die;
        }
    }

    public function getWebsites()
    {
        if (!isset($_GET['category'])) {
            try {
                $query = $this->dbh->prepare("SELECT * FROM websites");
                $query->execute();
                $query = $query->fetchAll(PDO::FETCH_ASSOC);
                return $query;
            } catch (Exception $e) {
                echo $e->getMessage();
                die();
            }
        }

        if (isset($_GET['category'])) {
            try {
                $query = $this->dbh->prepare("SELECT * FROM websites WHERE category = :category");
                $query->execute(array(
                    'category' => $_GET['category']
                ));
                $query = $query->fetchAll(PDO::FETCH_ASSOC);
                return $query;
            } catch (Exception $e) {
                echo $e->getMessage();
                die();
            }
        }
    }

    public function getAllCategories()
    {
        try {
            $query = $this->dbh->prepare("SELECT DISTINCT category FROM websites ORDER BY category");
            $query->execute();
            $query = $query->fetchAll(PDO::FETCH_ASSOC);
            return $query;
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }

    public function addWebsite() {
        try {
            $query = $this->dbh->prepare("INSERT INTO websites (url, title, category, description) VALUES (:url, :title, :category, :description)");

            //run the SQL query
            if ($query->execute(array(
                'url' => $_POST['url'],
                'title' => $_POST['title'],
                'category' => $_POST['category'],
                'description' => $_POST['description']
            ))
            ) {
                //go back to index.php
                header('Location: index.php');
            } else {
                //display an error if failed
                echo "Failed to add website";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
}