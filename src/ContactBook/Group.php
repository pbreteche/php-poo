<?php

namespace Dawan\ContactBook;

use Dawan\Exception\DuplicateContactException;

class Group
{
    private $contacts =  [];

    private $name;

    public function getContacts(): array
    {
        return $this->contacts;
    }

    public function addContact(Contact $contact)
    {
        if (!key_exists($contact->getSlug(), $this->contacts)) {
            $this->contacts[$contact->getSlug()] = $contact;
        }
        else {
            throw new DuplicateContactException('Le contact est déjà présent');
        }
    }

    public function removeContact(Contact $contact)
    {
        if (key_exists($contact->getSlug(), $this->contacts)) {
            unset($this->contacts[$contact->getSlug()]);
        }
    }
    
    public function setName(string $name)
    {
        $this->name = $name;
    }
    
    public function getName(): string
    {
        return $this->name;
    }
}