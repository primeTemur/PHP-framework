<?php 

namespace Tr\Framework\Http;

class Request{
    public function __construct(
        public readonly array $getParams,
        public readonly array $postParams,
        public readonly array $cookies,
        public readonly array $files,
        public readonly array $server,

    ){

    }
    public static function createFromGlobals()  {
        return new static($_GET,$_POST,$_COOKIE,$_FILES,$_SERVER);   
    }
    public function getPathInfo():string{
        return strtok($this->server['REQUEST_URI'],'?');
    }

    public function getMethod(){
        return $this->server['REQUEST_METHOD'];
    } 
}