<?php
    class eventsRepository {
        public function getEvent($evID) {
            if (is_numeric($evID)) {
                $queryResult = db::getDBSingleton()->query("SELECT id, title, author, body, created_at, updated_at FROM events WHERE id = ?", [$evID]);

                if($queryResult->num_rows > 0) {
                    $event = mysqli_fetch_assoc($queryResult);

                    $comments = db::getDBSingleton()->query("SELECT id, author, body, created_at, edited_by FROM comments WHERE event_id = ?", [$evID]);
                    $event['comments'] = $comments->fetch_all(MYSQLI_ASSOC);

                    $gallery = db::getDBSingleton()->query("SELECT id, image_url FROM gallery_images WHERE event_id = ?", [$evID]);
                    $event['gallery'] = $gallery->fetch_all(MYSQLI_ASSOC);
                    $event['image_url'] = $event['gallery'][0]['image_url'];

                    $tags = db::getDBSingleton()->query("SELECT id, tag FROM tags WHERE event_id = ?", [$evID]);
                    $event['tags'] = $tags->fetch_all(MYSQLI_ASSOC);

                    return $event;
                }
            }
        }

        public function getAllEvents() {
            $queryResult = db::getDBSingleton()->query("SELECT id, title, author, body FROM events", []);

            if($queryResult->num_rows > 0) {
                $events = $queryResult->fetch_all(MYSQLI_ASSOC);
                foreach ($events as &$event) {
                    $id = $event['id'];
                    $gallery = db::getDBSingleton()->query("SELECT id, image_url FROM gallery_images WHERE event_id = ? LIMIT 1", [$id]);
                    $image = $gallery->fetch_all(MYSQLI_ASSOC);
                    $event['image_url'] = $image[0]['image_url'];
                }
                
                return $events;
            }
        }
    }
?>