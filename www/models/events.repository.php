<?php
  include(dirname(__FILE__)."/../config/db.php");

  class eventsRepository {
    protected $db;

    public function __construct() {
      $this->db = db::getDBSingleton();
    }

    public function getEvent($evID) {
      if (is_numeric($evID)) {
        $queryResult = $this->db::query("SELECT id, title, author, body, updated_at FROM events WHERE id={$evID}");

        if($queryResult->num_rows > 0) {
          $row = $queryResult->fetch_assoc();
          $event['id']=$row['id'];
          $event['title']=$row['title'];
          $event['author']=$row['author'];
          $event['body']=$row['body'];
          $event['updated_at']=$row['updated_at'];
          return $event;
        }
      }
    }

    public function getAllEvents() {
      $queryResult = $this->db::query("SELECT id, title FROM events");

      if($queryResult->num_rows > 0) {
        $events = $queryResult->fetch_all(MYSQLI_ASSOC);
        return $events;
      }
    }
  }
?>