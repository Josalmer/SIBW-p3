<?php
    include(dirname(__FILE__)."/auth/authentication.helper.php");
    $authenticationHelper = new authenticationHelper();
    $authenticationHelper->managerGuard();

    include(dirname(__FILE__)."/../models/events.repository.php");
    $eventsRepository = new eventsRepository();

    $events = $eventsRepository->getAllEvents();
    
    echo $twig->render('pages/events.html', ['events' => $events]);
?>
