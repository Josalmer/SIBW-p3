<?php
    include(dirname(__FILE__)."/auth/authentication.helper.php");
    $authenticationHelper = new authenticationHelper();

    include(dirname(__FILE__)."/../models/comments.repository.php");
    $commentsRepository = new commentsRepository();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $req = json_decode(stripslashes(file_get_contents("php://input")));
        $author = $req->author;
        $body = $req->body;
        $event_id = $req->event_id;
        $response = $commentsRepository->newComment($author, $body, $event_id);
        echo $response;
        return;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        $authenticationHelper->moderatorGuard();
        $req = json_decode(stripslashes(file_get_contents("php://input")));
        $comment_id = $req->id;
        $response = "";
        $response = $commentsRepository->deleteComment($comment_id);
        echo $response;
        return;
    }

    $comments = $commentsRepository->getAllComments();
    
    echo $twig->render('pages/comments.html', ['comments' => $comments]);
?>
