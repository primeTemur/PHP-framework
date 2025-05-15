<?php 

use Tr\Framework\Http\Karnel;
use Tr\Framework\Http\Request;
use Tr\Framework\Http\Response;

define('BASE_PATH',dirname(__DIR__));
require_once dirname(__DIR__).'/vendor/autoload.php';

$request=Request::createFromGlobals();

$karnel=new Karnel();

$response=$karnel->handle($request);

$response->send();