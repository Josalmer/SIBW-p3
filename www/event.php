<?php
  require_once "/usr/local/lib/php/vendor/autoload.php";
  include(dirname(__FILE__)."/models/events.repository.php");

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);
  $eventRepository = new eventsRepository();

  $evID;
  $event = null;

  if(isset($_GET['ev'])) {
      $evID = $_GET['ev'];
      $event = $eventRepository->getEvent($evID);
  }

  if(!is_null($event)) {
    echo $twig->render('pages/event.html', ['event' => $event]);
  } else {
    echo $twig->render('pages/not-found.html');
  }
  
?>
