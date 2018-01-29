<?php

require __DIR__ . '/../vendor/autoload.php';

use Dawan\ContactBook\ContactBook;
use Dawan\HtmlDisplay\ContactView;
use Dawan\Http\RequestParser;
use Symfony\Component\Debug\Debug; 

Debug::enable();

$contactBook = new ContactBook();
$contactBook->loadFromFile(__DIR__ . '/../data/contacts.php');

$requestParser = new RequestParser();
$action = $requestParser->getAction();

var_dump($action);

$contacts = $contactBook->getList();

$contactView = new ContactView();
$contactView->displayList($contacts);
