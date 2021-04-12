<?php
  require_once "/usr/local/lib/php/vendor/autoload.php";
  include(dirname(__FILE__)."/models/event_repository.php");

  $loader = new \Twig\Loader\FilesystemLoader('templates');
  $twig = new \Twig\Environment($loader);
  $eventRepository = new eventRepository();

  $events = $eventRepository->getAllEvents();
  
  echo $twig->render('pages/index.html', ['events' => $events]);
?>
