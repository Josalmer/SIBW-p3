<?php
    class CommentsRepository {
        public function getEventComments($evID) {
            $queryResult = db::getDBSingleton()->query("SELECT id, author, body, created_at FROM comments WHERE event_id = ?", [$evID]);

            if($queryResult->num_rows > 0) {
                $comments = $queryResult->fetch_all(MYSQLI_ASSOC);
                return $comments;
            }
        }
    }
?>