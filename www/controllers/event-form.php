<?php
    include(dirname(__FILE__)."/auth/authentication.helper.php");
    $authenticationHelper = new authenticationHelper();
    $authenticationHelper->managerGuard();

    include(dirname(__FILE__)."/../models/events.repository.php");
    $eventsRepository = new eventsRepository();

    // if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {
    //     $req = json_decode(stripslashes(file_get_contents("php://input")));
    //     $body = $req->body;
    //     $commentId = $req->id;
    //     $response = $commentsRepository->updateComment($commentId, $body);
    //     echo $response;
    //     return;
    // }

    $params = substr($uri, strlen("/event-form/"));

    $eventId = intval($params);
    $event = null;

    $event = $eventsRepository->getEvent($eventId);
    
    echo $twig->render('pages/event-form.html', ['event' => $event]);
?>
