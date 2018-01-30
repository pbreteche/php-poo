<?php

namespace Dawan\Http;

use Dawan\Exception\BadRequestException;

class SimpleRequestParser
{
    const AVAILABLE_QUERIES = [
        '/show' => [
            'class' => 'Dawan\\ContactBook\\ContactBook',
            'method' => 'getDetails',
            'template' => 'details'
        ],
        '/filter' => [
            'class' => 'Dawan\\ContactBook\\ContactBook',
            'method' => 'getListByGroup',
            'template' => 'groupList'
        ],
        '/' => [
            'class' => 'Dawan\\ContactBook\\ContactBook',
            'method' => 'getList',
            'template' => 'list'
        ],
    ];

    public function getAction()
    {
        // équivalent à $query = isset($_GET['q']) ? $_GET['q'] : '/';
        $query = $_GET['q'] ?? '/';

        foreach(self::AVAILABLE_QUERIES as $prefix => $queryConfig) {
            if (strpos($query, $prefix) === 0) {
                return array_merge($queryConfig, ['arg' => $_GET['arg'] ?? '']);
            }
        }
        throw new BadRequestException();
    }
}