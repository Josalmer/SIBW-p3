<?php
include(dirname(__FILE__)."/../db.php");

class eventRepository {
    protected $db;

    public function __construct() {
        $this->db = db::getDBSingleton();
    }

    public function getEvent($evID) {
        $queryResult = $this->db::query("SELECT title, author, body, updated_at FROM events WHERE id={$evID}");

        if($queryResult->num_rows > 0) {
            $row = $queryResult->fetch_assoc();
            $event['title']=$row['title'];
            $event['author']=$row['author'];
            $event['body']=$row['body'];
            $event['date']=$row['updated_at'];
        }
        return $event;
    }
}
?>