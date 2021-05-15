<?php
    class eventsRepository {
        public function getEvent($evID) {
            if (is_numeric($evID)) {
                $queryResult = db::getDBSingleton()->query("SELECT id, title, author, body, image_url, updated_at FROM events WHERE id = ?", [$evID]);

                if($queryResult->num_rows > 0) {
                    $event = mysqli_fetch_assoc($queryResult);

                    $comments = db::getDBSingleton()->query("SELECT id, author, body, created_at, edited_by FROM comments WHERE event_id = ?", [$evID]);
                    $event['comments'] = $comments->fetch_all(MYSQLI_ASSOC);

                    $gallery = db::getDBSingleton()->query("SELECT id, image_url FROM gallery_images WHERE event_id = ?", [$evID]);
                    $event['gallery'] = $gallery->fetch_all(MYSQLI_ASSOC);

                    return $event;
                }
            }
        }

        public function getAllEvents() {
            $queryResult = db::getDBSingleton()->query("SELECT id, title, author, body, image_url FROM events", []);

            if($queryResult->num_rows > 0) {
                $events = $queryResult->fetch_all(MYSQLI_ASSOC);
                return $events;
            }
        }
    }
?>