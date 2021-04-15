<?php
    class forbiddenWordsRepository {
        public function getAllForbiddenWords() {
            $queryResult = db::getDBSingleton()->query("SELECT word FROM forbidden_words", []);

            if($queryResult->num_rows > 0) {
                $words = $queryResult->fetch_all(MYSQLI_ASSOC);
                return $words;
            }
        }
    }
?>