<?php

namespace Dawan\Http;

class SimpleRequestParser
{
    const AVAILABLE_QUERIES = [
        '/show' => [
            'class' => 'ContactBook',
            'method' => 'getDetails',
            'template' => 'details'
        ],
        '/' => [
            'class' => 'ContactBook',
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
        return 'oups 404...';
    }
}