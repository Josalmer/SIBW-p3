<?php
    class commentsRepository {
        public function getComment($commentID) {
            if (is_numeric($commentID)) {
                $queryResult = db::getDBSingleton()->query("SELECT id, event_id, author, body, edited_by, created_at FROM comments WHERE id = ?", [$commentID]);

                if($queryResult->num_rows > 0) {
                    $comment = mysqli_fetch_assoc($queryResult);

                    return $comment;
                }
            }
        }

        public function getAllComments() {
            $queryResult = db::getDBSingleton()->query("SELECT id, event_id, author, body, edited_by, created_at FROM comments order by created_at ASC", []);

            if($queryResult->num_rows > 0) {
                $comments = $queryResult->fetch_all(MYSQLI_ASSOC);
                return $comments;
            }
        }

        public function newComment($author, $body, $event_id) {
            $date = new DateTime();
            $now = $date->format('Y-m-d H:i:s');
            $queryResult = db::getDBSingleton()->query("INSERT INTO comments(event_id, author, body, created_at, updated_at) VALUES(?, ?, ?, ?, ?)", [$event_id, $author, $body, $now, $now]);

            return 'correct';
        }

        public function updateCommnent($commentID, $newBody) {
            $date = new DateTime();
            $now = $date->format('Y-m-d H:i:s');

            $queryResult = db::getDBSingleton()->query("UPDATE comments set body = ?, edited_by = ?, updated_at = ? WHERE id = ?", [$newBody, $_SESSION['user']['username'], $now, $commentID]);

            return 'correct';
        }

        public function deleteComment($commentID) {
            $queryResult = db::getDBSingleton()->query("DELETE FROM comments WHERE id = ?", [$commentID]);

            return 'correct';
        }
    }
?>