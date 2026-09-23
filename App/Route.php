<?php

namespace App;

use MF\init\Bootstrap;

class Route extends Bootstrap {

    protected function initRoutes()
    {
        $routes['home'] = array(
            'route' => "/",
            'controller' => 'IndexController',
            'action' => 'index'
        );

        $routes['home'] = array(
            'route' => "/login",
            'controller' => 'IndexController',
            'action' => 'login'
        );

        $this->setRoutes($routes);

    }

}

?>