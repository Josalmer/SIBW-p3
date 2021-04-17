<?php
    include(dirname(__FILE__)."/../models/events.repository.php");

    $eventRepository = new eventsRepository();

    $params = substr($uri, strlen("/print_event/"));

    $evID = intval($params);
    $event = null;

    if($evID > 0) {
        $event = $eventRepository->getEvent($evID);
    }

    echo $twig->render('pages/print_event.html', ['event' => $event]);
?>
