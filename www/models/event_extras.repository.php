<?php
    class eventExtrasRepository {
        public function addEventImage($eventId, $imageUrl) {
            $queryResult = db::getDBSingleton()->query("INSERT INTO gallery_images(event_id, image_url) VALUES(?, ?)", [$eventId, $imageUrl]);

            return 'correct';
        }

        public function deleteEventImage($eventId, $imageUrl) {
            $queryResult = db::getDBSingleton()->query("DELETE FROM gallery_images WHERE event_id = ? AND image_url = ?", [$eventId, $imageUrl]);

            return 'correct';
        }

        public function addEventTag($eventId, $tag) {
            $queryResult = db::getDBSingleton()->query("INSERT INTO tags(event_id, tag) VALUES(?, ?)", [$eventId, $tag]);

            return 'correct';
        }

        public function deleteEventTag($eventId, $tag) {
            $queryResult = db::getDBSingleton()->query("DELETE FROM tags WHERE event_id = ? AND tag = ?", [$eventId, $tag]);

            return 'correct';
        }
    }
?>