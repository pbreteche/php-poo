<?php

include 'ContactBook.php';
include 'ContactView.php';

$contactBook = new ContactBook();
$contactBook->loadFromFile('data/contacts.php');
$contacts = $contactBook->getList();

$contactView = new ContactView();
$contactView->displayList($contacts);
