<?php

namespace Dawan\ContactBook;

class ContactBook
{
    private $contacts = [];

    public function loadFromFile($path)
    {
        $contactArray = require $path;
        foreach ($contactArray as $contactInfos) {
            $this->contacts[$contactInfos['slug']] = new Contact($contactInfos);
        }
    }

    public function getList()
    {
        return [
            'contacts' => $this->contacts,
        ];
    }

    public function getDetails($contactSlug)
    {
        return [
            'contact' => $this->contacts[$contactSlug],
        ];
    }
}
