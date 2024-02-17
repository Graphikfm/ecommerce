<?php
namespace Ecommerce;
use Ecommerce\App;
use GuzzleHttp\Psr7\ServerRequest;
use PHPUnit\Framework\TestCase;


class AppTest extends TestCase {
    public function testRedirectTailingSlash() {
        $app = new App();
        $request = new ServerRequest('GET','/demoslash/');
        $response = $app->run($request);
        $this->assertContains('/demoslash', $response->getHeader('Location'));
        $this->assertEquals(301, $response->getStatusCode());
    }
    public function testEcommerce() {
        $app = new App();
        $request = new ServerRequest('GET', "/ecommerce");
        $response = $app->run($request);
        $this->assertStringContainsString('<h1>Bienvenue sur le blog</h1>', (string)$response->getBody());
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testError404() {
        $app = new App();
        $request = new ServerRequest('GET', "/ecdndndns");
        $response = $app->run($request);
        $this->assertStringContainsString('<h1>Erreur 404</h1>', (string)$response->getBody());
        $this->assertEquals(404, $response->getStatusCode());
    }
}