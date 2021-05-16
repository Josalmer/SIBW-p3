<?php
    include(dirname(__FILE__)."/auth/authentication.helper.php");
    $authenticationHelper = new authenticationHelper();
    $authenticationHelper->managerGuard();

    include(dirname(__FILE__)."/../models/events.repository.php");
    $eventsRepository = new eventsRepository();

    $params = substr($uri, strlen("/event-form/"));

    $eventId = intval($params);
    $event = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $body = $_POST['body'];
        $eventId = $_POST['id'];

        if ($eventId != null) {
            $eventsRepository->updateEvent($eventId, $title, $author, $body);
        } else {
            $eventId = $eventsRepository->newEvent($title, $author, $body);
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        $req = json_decode(stripslashes(file_get_contents("php://input")));
        $event_id = $req->id;
        $response = "";
        $response = $eventsRepository->deleteEvent($event_id);
        echo $response;
        return;
    }

    $event = $eventsRepository->getEvent($eventId);
    
    echo $twig->render('pages/event-form.html', ['event' => $event]);
?>
