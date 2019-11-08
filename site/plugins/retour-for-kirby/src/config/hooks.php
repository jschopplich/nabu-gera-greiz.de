<?php

namespace distantnative\Retour;

use Kirby\Http\Router;

return [
    'route:after' => function ($route, $path, $method, $result) {
        if (empty($result) === true) {

            // If logging enable, initialiye model
            if (option('distantnative.retour.logs') === true) {
                $log = new Log;
            }

            try {
                $routes = Redirects::routes($log ?? false);
                $router = new Router($routes);
                return $router->call($path, $method);

            } catch (\Throwable $e) {
                if (option('distantnative.retour.logs') === true) {
                    $log->add(['path' => $path]);
                    $log->close();
                }
            }
        }
    }
];
