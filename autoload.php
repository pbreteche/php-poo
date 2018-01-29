<?php

spl_autoload_register(function ($className)
{
    $pathFragments = explode('\\', $className);
    $path = implode(DIRECTORY_SEPARATOR, $pathFragments) . '.php';
    require $path;
});