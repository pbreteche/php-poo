<?php

include 'autoload.php';

$c = new Customer('Fabien');

echo $c->getName() . ' ' . $c->getCustomerCode();
