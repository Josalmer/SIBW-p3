<?php
    include(dirname(__FILE__)."/../models/events.repository.php");
    $eventsRepository = new eventsRepository();

    $events = $eventsRepository->getAllEvents();

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $query = $_GET['search'];
        $events = $eventsRepository->searchEvents($query);
        echo json_encode($events);
        return;
    }
?>
