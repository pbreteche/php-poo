<?php

namespace Dawan\HtmlDisplay;

class ContactView
{
    public function displayList($contacts)
    {
        $listItems = '';
        foreach ($contacts as $contact) {
            $listItems .= '<li><a href="?q=/show/' . $contact->getSlug() . '">' . $contact->getName() . '</a></li>';
        }
        $list = '<ul>' . $listItems . '</ul>';
        
        echo $list;
    }
}