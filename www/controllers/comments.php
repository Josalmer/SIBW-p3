<?php
    include(dirname(__FILE__)."/auth/authentication.helper.php");
    $authenticationHelper = new authenticationHelper();
    $authenticationHelper->moderatorGuard();

    include(dirname(__FILE__)."/../models/comments.repository.php");
    $commentsRepository = new commentsRepository();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $req = json_decode(stripslashes(file_get_contents("php://input")));
        $request = $req->type;
        $response = "";
        if ($request == 'newComment') {
            $author = $req->author;
            $body = $req->body;
            $event_id = $req->event_id;
            $response = $commentsRepository->newComment($author, $body, $event_id);
        }
        echo $response;
        return;
    }

    $comments = $commentsRepository->getAllComments();
    
    echo $twig->render('pages/comments.html', ['comments' => $comments]);
?>
