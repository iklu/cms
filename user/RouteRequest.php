<?php

/**
 * Created by PhpStorm.
 * User: ovidiu
 * Date: 07.10.2015
 * Time: 09:59
 */
class RouteRequest
{
    /**
     * @param null $path
     * @param null $routes
     * @return int|string
     */
    static function match($path = NULL, $routes = array()) {
        //If no arguments are supplied, return false
        if(!isset($path)  && !isset($routes)) {
            return false;
        }
        //search for routes
        foreach ($routes as $key => $value) {
            //search key if exists execute match
            preg_match("#:([a-zA-Z0-9]+)#", $value, $keys);
            if(sizeof($keys)&&sizeof($keys[0])&&sizeof($keys[1]))
            {
                //get the id from URI
                preg_match_all('/\d+/', $path, $id);
                $id = end($id[0]);

                //normalize route pattern
                $pattern = preg_replace("#(:[a-zA-Z0-9]+)#", $id, $value);

                if(preg_match("#".$pattern."#", $path ))
                {
                    $route = str_replace ('bridge', 'secured', $pattern);
                    return $route;
                }
            //simple match
            } elseif (preg_match("#".$value."#", $path)) {
                $route = str_replace ('bridge', 'secured', $value);
                return $route;
            }
        }
        return false;

    }
}
