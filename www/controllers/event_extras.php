<?php
    include(dirname(__FILE__)."/auth/authentication.helper.php");
    $authenticationHelper = new authenticationHelper();
    $authenticationHelper->managerGuard();

    include(dirname(__FILE__)."/../models/event_extras.repository.php");
    $eventExtrasRepository = new eventExtrasRepository();

    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        $req = json_decode(stripslashes(file_get_contents("php://input")));
        $type = $req->type;
        $response = "";
        if ($type == 'image') {
            $eventId = $req->eventId;
            $imageUrl = $req->imageUrl;
            $response = $eventExtrasRepository->deleteEventImage($eventId, $imageUrl);
        } else if ($type == 'tag') {
            $eventId = $req->eventId;
            $tag = $req->tag;
            $response = $eventExtrasRepository->deleteEventTag($eventId, $tag);
        }
        echo $response;
    }
    return;
?>
