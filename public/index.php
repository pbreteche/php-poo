<?php

require __DIR__ . '/../vendor/autoload.php';

use Dawan\ContactBook\ContactBook;
use Dawan\HtmlDisplay\ContactView;
use Dawan\Http\SimpleRequestParser;
use Symfony\Component\Debug\Debug;
use Dawan\Exception\BadRequestException;

Debug::enable();

// initialisation du carnet d'adresses
$contactBook = new ContactBook();
$contactBook->loadFromFile(__DIR__ . '/../data/contacts.php');

// Analyse de la requête utilisateur
$requestParser = new SimpleRequestParser();
try {
    $action = $requestParser->getAction();
} catch (BadRequestException $a) {
    http_response_code(400);
    require __DIR__ . '/../templates/error400.html';
    die;
}



// appèle la bonne action suivant la demande utlisateur
// récupère une structure de données, en fonction de l'action
$data = call_user_func([$contactBook, $action['method']], $action['arg']);

$contactView = new ContactView();
$contactView->display($action['template'], $data);
