<?php
    include(dirname(__FILE__)."/../models/events.repository.php");
    include(dirname(__FILE__)."/../models/forbidden_words.repository.php");

    $eventRepository = new eventsRepository();
    $forbiddenWordsRepository = new forbiddenWordsRepository();

    $params = substr($uri, strlen("/event/"));

    $evID = intval($params);
    $event = null;
    $forbiddenWords = $forbiddenWordsRepository->getAllForbiddenWords();

    if($evID > 0) {
        $event = $eventRepository->getEvent($evID);
    }

    if(!is_null($event)) {
        echo $twig->render('pages/event.html', ['event' => $event, 'forbiddenWords' => $forbiddenWords]);
    } else {
        echo $twig->render('pages/not_found.html');
    }

?>
<script>
    const BANNED_WORDS= <?php echo json_encode($forbiddenWords); ?>;
</script>
