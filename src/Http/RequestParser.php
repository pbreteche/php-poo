<?php

namespace Dawan\Http;

class RequestParser
{
    public function getAction()
    {
        // équivalent à $query = isset($_GET['q']) ? $_GET['q'] : '/';
        $query = $_GET['q'] ?? '/';

        foreach($this->getAvailableQueries() as $regex => $queryConfig) {
            if (preg_match($regex, $query, $matches)) {
                return array_merge($queryConfig, ['query' => $query]);
            }
        }
        return 'oups 404...';
    }

    private function getAvailableQueries()
    {
        return [
            '#^/$#' => [
                'class' => 'ContactBook',
                'method' => 'getList',
            ],
            '#^/show/#' => [
                'class' => 'ContactBook',
                'method' => 'getDetails',
            ],
        ];
    }
}