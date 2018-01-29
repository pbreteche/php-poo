<?php

require 'autoload.php';

use \Dawan\ContactBook\ContactBook;
use \Dawan\HtmlDisplay\ContactView;

$contactBook = new ContactBook();
$contactBook->loadFromFile('data/contacts.php');
$contacts = $contactBook->getList();

$contactView = new ContactView();
$contactView->displayList($contacts);
