<?php

namespace Dawan\ContactBook;

class Contact
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function __destruct()
    {
        // rarement utilisé
    }

    public function getName()
    {
        return $this->name;
    }
}
