<?php

require __DIR__ . '/../vendor/autoload.php';

use Dawan\ContactBook\ContactBook;
use Dawan\HtmlDisplay\ContactView;
use Symfony\Component\Debug\Debug; 

Debug::enable();

$contactBook = new ContactBook();
$contactBook->loadFromFile(__DIR__ . '/../data/contacts.php');
$contacts = $contactBook->getList();

$contactView = new ContactView();
$contactView->displayList($contacts);
