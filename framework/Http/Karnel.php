<?php 

namespace Tr\Framework\Http;

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;
class Karnel{
    public function  __construct() {
        
    }
    public function handle(Request $request):Response{
       

        $dispatcher=simpleDispatcher(function(RouteCollector $routeCollector){
            $routes=include BASE_PATH.'/routes/web.php';
            foreach($routes as $route){
                $routeCollector->addRoute(...$route);
            }
        });
        
        $routeInfo=$dispatcher->dispatch(
            $request->getMethod(),
            $request->getPathInfo()       
        );

        dd($request->getPathInfo());
        // Dispatcher::FOUND;
        [$status,$handler,$vars]=$routeInfo;

        return $handler($vars);
    }
}