<?php
    include(dirname(__FILE__)."/../models/events.repository.php");
    $eventsRepository = new eventsRepository();

    $events = $eventsRepository->getAllEvents();

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $req = json_decode(stripslashes(file_get_contents("php://input")));
        $query = $req->query;
        $events = $eventsRepository->searchEvents($query);
        return $events;
    }
?>
