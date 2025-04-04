<?php

namespace Tests\Framework;

use Framework\App;
use GuzzleHttp\Psr7\ServerRequest;
use PHPUnit\Framework\TestCase;

class AppTest extends TestCase 
{
    public function testRedirectTrailingSlash()
    {
        $app = new App();
        $request = new ServerRequest('GET','/maelle/');
        $response = $app->run($request);
        $this->assertStringContainsString('Location: /maelle', $response->getHeader('Location')[0]);
        $this->assertEquals(301, $response->getStatusCode());
    }
    public function testBlog()
    {
        $app = new App();
        $request = new ServerRequest('GET','/blog');
        $response = $app->run($request);
        $this->assertStringContainsString('<h1>Bienvenue sur mon super blog</h1>', (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }
    public function testError404()
    {
        $app = new App();
        $request = new ServerRequest('GET','/404');
        $response = $app->run($request);
        $this->assertStringContainsString('<h1>Erreur 404</h1>', (string)$response->getBody());
        $this->assertEquals(404, $response->getStatusCode());
    }
}
