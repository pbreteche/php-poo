<?php

class ContactView
{
    public function displayList($contacts)
    {
        $listItems = '';
        foreach ($contacts as $contact) {
            $listItems .= '<li>' . $contact->getName() . '</li>';
        }
        $list = '<ul>' . $listItems . '</ul>';
        
        echo $list;
    }
}