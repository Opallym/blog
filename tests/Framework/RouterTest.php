<?php

namespace Tests\Framework;

use Framework\App;
use GuzzleHttp\Psr7\Request;

class RouterTest extends TestCase 
{
    public function setUp()
    {
        $this->router = new Router();
    }
    public function testGetMethod()
    {
        $request = new Request('GET', '/blog');
        $this->router->get('/blog',function(){return 'Hello';}, 'blog');
        $route = $this->router->match($request );
        $this->assertEquals('blog', $route->getName);
        $this->assertEquals('Hello', call_user_func_array($route->getCallBack(),[$request]));
    }
}
