<?php

require __DIR__ . '/../vendor/autoload.php';

use Dawan\ContactBook\ContactBook;
use Dawan\HtmlDisplay\ContactView;
use Dawan\Http\SimpleRequestParser;
use Symfony\Component\Debug\Debug;

Debug::enable();

// initialisation du carnet d'adresses
$contactBook = new ContactBook();
$contactBook->loadFromFile(__DIR__ . '/../data/contacts.php');

// Analyse de la requête utilisateur
$requestParser = new SimpleRequestParser();
$action = $requestParser->getAction();

// appèle la bonne action suivant la demande utlisateur
// récupère une structure de données, en fonction de l'action
$data = call_user_func([$contactBook, $action['method']], $action['arg']);

$contactView = new ContactView();
$contactView->display($action['template'], $data);
