<?php

namespace Dawan\ContactBook;

class ContactProvider
{
    private $dbh;

    public function __construct(\PDO $connection)
    {
        $this->dbh = $connection;
    }

    public function findAll()
    {
        return $this->dbh
            ->query('SELECT name, slug FROM Contact', \PDO::FETCH_CLASS, 'Dawan\\ContactBook\\Contact')
            ->fetchAll();
    }
    
    public function findGroups()
    {
        return $this->dbh
            ->query('SELECT name FROM ContactGroup', \PDO::FETCH_CLASS, 'Dawan\\ContactBook\\Group')
            ->fetchAll();
    }
    
    public function findByGroup(string $groupName)
    {
        $contacts = [];
        $st = $this->dbh
            ->query('SELECT c.name, c.slug FROM Contact c
                    JOIN ContactGroup g ON c.contactGroup_id = g.id
                    WHERE g.name = "' . $groupName . '"
                ', \PDO::FETCH_OBJ);
        foreach($st as $contactData) {
            $contact = new Contact();
            $contact->setName($contactData->name);
            $contact->setSlug($contactData->slug);
            $contacts[] = $contact;
        }
        return $contacts;
    }
    
    public function findBySlug(string $slug)
    {
        $contactData = $this->dbh
            ->query('SELECT c.name, c.slug, c.email, g.name as groupName FROM Contact c
            JOIN ContactGroup g ON c.contactGroup_id = g.id
            WHERE slug = "' . $slug .'"', \PDO::FETCH_OBJ)
            ->fetch();

        $contact = new Contact();
        $group = new Group();
        $contact->setName($contactData->name);
        $contact->setEmail($contactData->email);
        $contact->setSlug($contactData->slug);
        $group->setName($contactData->groupName);
        $contact->setGroup($group);
        return $contact;
    }
}