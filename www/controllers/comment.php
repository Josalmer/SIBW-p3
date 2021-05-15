<?php
    include(dirname(__FILE__)."/auth/authentication.helper.php");
    $authenticationHelper = new authenticationHelper();
    $authenticationHelper->moderatorGuard();

    include(dirname(__FILE__)."/../models/comments.repository.php");
    $commentsRepository = new commentsRepository();

    $params = substr($uri, strlen("/comment/"));

    $commentID = intval($params);
    $comment = null;

    $comment = $commentsRepository->getComment($commentID);
    
    echo $twig->render('pages/comment.html', ['comment' => $comment]);
?>
