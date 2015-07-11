<?php
namespace WebDevResources;

class Votes {
    public function addVote($websiteId) {
        try {
            $query = $this->dbh->prepare("UPDATE websites SET count = count + 1 WHERE id = :id");

            $sqlData = [
                'id' => $websiteId
            ];

            return $query->execute($sqlData);
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
}