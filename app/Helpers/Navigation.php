<?php

use Illuminate\Support\Facades\Route;

class Navigation
{
    public static function isActiveRoute($route, $output = 'active')
    {
        $routeName = explode(".", Route::currentRouteName());
        if ($routeName[0] == $route) {
            return $output;
        }
    }

}
