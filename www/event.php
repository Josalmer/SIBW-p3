<?php
    require_once (dirname(__FILE__)."/config/server_initializer.php");
    include(dirname(__FILE__)."/models/events.repository.php");
    include(dirname(__FILE__)."/models/forbidden_words.repository.php");

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);
    $eventRepository = new eventsRepository();
    $forbiddenWordsRepository = new forbiddenWordsRepository();

    $evID;
    $event = null;
    $forbiddenWords = $forbiddenWordsRepository->getAllForbiddenWords();

    if(isset($_GET['ev'])) {
        $evID = $_GET['ev'];
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
