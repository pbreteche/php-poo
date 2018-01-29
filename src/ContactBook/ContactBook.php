<?php

namespace Dawan\ContactBook;

class ContactBook
{
    private $contacts = [];

    public function loadFromFile($path)
    {
        $contactArray = require $path;
        foreach ($contactArray as $contactName) {
            $this->contacts[] = new Contact($contactName);
        }
    }

    public function getList()
    {
        return $this->contacts;
    }
}
