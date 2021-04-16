<?php
    include(dirname(__FILE__)."/../models/events.repository.php");

    $eventRepository = new eventsRepository();

    $events = $eventRepository->getAllEvents();
    
    echo $twig->render('pages/landing.html', ['events' => $events]);
?>
