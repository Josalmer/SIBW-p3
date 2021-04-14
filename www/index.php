<?php
    require_once (dirname(__FILE__)."/config/server_initializer.php");
    include(dirname(__FILE__)."/models/events.repository.php");

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);
    $eventRepository = new eventsRepository();

    $events = $eventRepository->getAllEvents();
    
    echo $twig->render('pages/index.html', ['events' => $events]);
?>
