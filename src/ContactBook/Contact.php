<?php

namespace Dawan\ContactBook;

class Contact
{
    private $name;

    private $slug;

    private $email;

    private $group;

    public function __destruct()
    {
        // rarement utilisé
    }
    
    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function incrementSlug()
    {
        $this->slug .= '-1'; 
    }
    
    public function setSlug(string $slug)
    {
        $this->slug = $slug;
    }

    public function getSlug()
    {
        return $this->slug;
    }
    
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }
    
    public function setGroup(Group $group)
    {
        $this->group = $group;
    }
    
    public function getGroup(): Group
    {
        return $this->group;
    }


}
