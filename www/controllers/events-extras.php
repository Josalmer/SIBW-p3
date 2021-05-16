<?php
    include(dirname(__FILE__)."/auth/authentication.helper.php");
    $authenticationHelper = new authenticationHelper();
    $authenticationHelper->managerGuard();

    include(dirname(__FILE__)."/../models/events.repository.php");
    $eventsRepository = new eventsRepository();

    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        $req = json_decode(stripslashes(file_get_contents("php://input")));
        $type = $req->type;
        $response = "";
        if ($type == 'image') {
            $eventId = $req->eventId;
            $imageUrl = $req->imageUrl;
            $response = $eventsRepository->deleteEventImage($eventId, $imageUrl);
        }
        echo $response;
    }
    return;
?>
