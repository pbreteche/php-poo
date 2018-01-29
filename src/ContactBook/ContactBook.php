<?php

namespace Dawan\ContactBook;

class ContactBook
{
    private $contacts = [];

    public function loadFromFile($path)
    {
        $contactArray = require $path;
        foreach ($contactArray as $contactInfos) {
            $this->contacts[] = new Contact($contactInfos);
        }
    }

    public function getList()
    {
        return $this->contacts;
    }
}
