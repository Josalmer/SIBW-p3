<?php
    include(dirname(__FILE__)."/auth/authentication.helper.php");
    $authenticationHelper = new authenticationHelper();
    $authenticationHelper->managerGuard();

    include(dirname(__FILE__)."/../models/events.repository.php");
    $eventsRepository = new eventsRepository();

    include(dirname(__FILE__)."/../models/event_extras.repository.php");
    $eventExtrasRepository = new eventExtrasRepository();

    $params = substr($uri, strlen("/event-form/"));

    $eventId = intval($params);
    $event = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        var_dump($_POST);
        $type = $_POST['type'];

        if ($type == 'event') {
            $title = $_POST['title'];
            $author = $_POST['author'];
            $body = $_POST['body'];
            $eventId = $_POST['id'];
    
            if ($eventId != null) {
                $eventsRepository->updateEvent($eventId, $title, $author, $body);
            } else {
                $eventId = $eventsRepository->newEvent($title, $author, $body);
            }
        } else if ($type == 'image') {
            if(isset($_FILES['image'])){
                $errors= array();
                $eventId = $_POST['id'];
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_tmp = $_FILES['image']['tmp_name'];
                $file_type = $_FILES['image']['type'];
                $file_ext = strtolower(end(explode('.',$_FILES['image']['name'])));
                
                $extensions= array("jpeg","jpg","png");
                
                if (in_array($file_ext,$extensions) === false){
                    $errors[] = "Extensión no permitida, elige una imagen JPEG o PNG.";
                }
                
                if ($file_size > 2097152){
                    $errors[] = 'Tamaño del fichero demasiado grande';
                }
                
                if (empty($errors)==true) {
                    move_uploaded_file($file_tmp, "public/uploads/" . $file_name);
                    $imageUrl = "/public/uploads/" . $file_name;
                    $eventExtrasRepository->addEventImage($eventId, $imageUrl);
                }
            }
        } else if ($type == 'tag') {
            $eventId = $_POST['id'];
            $tag = $_POST['tag'];
            $eventExtrasRepository->addEventTag($eventId, $tag);
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {
        $req = json_decode(stripslashes(file_get_contents("php://input")));
        $eventId = $req->id;
        $newStatus = $req->status;
        $response = $eventsRepository->togglePublished($eventId, $newStatus);
        return $response;
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
    
    echo $twig->render('pages/event_form.html', ['event' => $event, 'errors' => $errors]);
?>
