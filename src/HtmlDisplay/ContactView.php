<?php

namespace Dawan\HtmlDisplay;

class ContactView
{
    public function display($template, $data)
    {
        extract($data);
        include __DIR__ . '/../../templates/' . $template . '.phtml';
    }
}