<?php
    include(dirname(__FILE__)."/auth/authentication.helper.php");
    $authenticationHelper = new authenticationHelper();
    $authenticationHelper->moderatorGuard();

    include(dirname(__FILE__)."/../models/comments.repository.php");
    $commentsRepository = new commentsRepository();

    if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {
        $req = json_decode(stripslashes(file_get_contents("php://input")));
        $body = $req->body;
        $commentId = $req->id;
        $response = $commentsRepository->updateComment($commentId, $body);
        echo $response;
        return;
    }

    $params = substr($uri, strlen("/comment/"));

    $commentID = intval($params);
    $comment = null;

    $comment = $commentsRepository->getComment($commentID);
    
    echo $twig->render('pages/comment.html', ['comment' => $comment]);
?>
