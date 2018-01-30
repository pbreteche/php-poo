<?php

namespace Dawan\HtmlDisplay;

class ContactView
{
    public function display($template, $data)
    {
        extract($data);

        ob_start();
        include __DIR__ . '/../../templates/' . $template . '.phtml';
        $body = ob_get_clean();
        $title = 'Carnet d\'adresse';
        include __DIR__ . '/../../templates/base.phtml';
    }
}