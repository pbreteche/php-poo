<?php

class Customer extends Contact
{
    public function __construct($name, $code = null)
    {
        $this->code = $code;
        parent::__construct($name);
    }

    public function getName()
    {
        return 'Client: ' . $this->name;
    }

    public function getCustomerCode()
    {
        return 'DA-1234-F';
    }
}