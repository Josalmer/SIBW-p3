<?php
  include(dirname(__FILE__)."/../config/db.php");

  class forbiddenWordsRepository {
    protected $db;

    public function __construct() {
      $this->db = db::getDBSingleton();
    }

    public function getAllForbiddenWords() {
      $queryResult = $this->db::query("SELECT word FROM forbidden_words");

      if($queryResult->num_rows > 0) {
        $words = $queryResult->fetch_all(MYSQLI_ASSOC);
        return $words;
      }
    }
  }
?>