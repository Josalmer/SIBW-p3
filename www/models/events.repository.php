<?php
    class eventsRepository {
        public function getEvent($evID) {
            if (is_numeric($evID)) {
                $queryResult = db::getDBSingleton()->query("SELECT id, title, author, body, image_url, updated_at FROM events WHERE id = ?", [$evID]);

                if($queryResult->num_rows > 0) {
                    $event = mysqli_fetch_assoc($queryResult);
                    return $event;
                }
            }
        }

        public function getAllEvents() {
            $queryResult = db::getDBSingleton()->query("SELECT id, title, image_url FROM events", []);

            if($queryResult->num_rows > 0) {
                $events = $queryResult->fetch_all(MYSQLI_ASSOC);
                return $events;
            }
        }
    }
?>