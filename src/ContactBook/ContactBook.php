<?php

namespace Dawan\ContactBook;

use Dawan\Exception\DuplicateContactException;

class ContactBook
{
    private $provider;

    public function __construct(ContactProvider $provider)
    {
        $this->provider = $provider;
    }   

    public function getList(): array
    {
        return [
            'contacts' => $this->provider->findAll(),
            'groups' => $this->provider->findGroups(),
        ];
    }
    
    public function getListByGroup(string $groupName): array
    {
        return [
            'contacts' => $this->provider->findByGroup($groupName),
            'groupName' => $groupName,
        ];
    }

    public function getDetails(string $contactSlug): array
    {
        return [
            'contact' => $this->provider->findBySlug($contactSlug),
        ];
    }
}
