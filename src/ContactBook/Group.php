<?php

namespace Dawan\ContactBook;

class Group
{
    private $contacts =  [];

    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getContacts()
    {
        return $this->contacts;
    }

    public function addContact(Contact $contact)
    {
        if (!key_exists($contact->getSlug(), $this->contacts)) {
            $this->contacts[$contact->getSlug()] = $contact;
        }
    }

    public function removeContact(Contact $contact)
    {
        if (!key_exists($contact->getSlug(), $this->contacts)) {
            unset($this->contacts[$contact->getSlug()]);
        }
    }

    public function getName()
    {
        return $this->name;
    }
}