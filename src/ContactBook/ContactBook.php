<?php

namespace Dawan\ContactBook;

class ContactBook
{
    private $contacts = [];

    private $groups = [];

    public function loadFromFile(string $path): void
    {
        $contactArray = require $path;
        foreach ($contactArray as $contactInfos) {
            if (!key_exists($contactInfos['group'], $this->groups)) {
                $this->groups[$contactInfos['group']] = new Group($contactInfos['group']);
            }
            $currentGroup = $this->groups[$contactInfos['group']];
            $newContact = new Contact($contactInfos);
            $newContact->setGroup($currentGroup);
            $this->contacts[$contactInfos['slug']] = $newContact;
            $currentGroup->addContact($newContact);
        }
    }

    public function getList(): array
    {
        return [
            'contacts' => $this->contacts,
            'groups' => $this->groups,
        ];
    }
    
    public function getListByGroup(string $groupName): array
    {
        return [
            'contacts' => $this->groups[$groupName]->getContacts(),
            'groupName' => $groupName,
        ];
    }

    public function getDetails(string $contactSlug): array
    {
        return [
            'contact' => $this->contacts[$contactSlug],
        ];
    }
}
