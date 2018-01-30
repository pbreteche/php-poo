<?php

namespace Dawan\ContactBook;

class Contact
{
    private $name;

    private $slug;

    private $email;

    private $group;

    public function __construct($infos)
    {
        foreach ($infos as $key => $val)
        $this->$key = $val;
    }

    public function __destruct()
    {
        // rarement utilisé
    }
    
    public function getName()
    {
        return $this->name;
    }

    public function incrementSlug()
    {
        $this->slug .= '-1'; 
    }
    
    public function getSlug()
    {
        return $this->slug;
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
