<?php
#src/Controller/SiteController.php
namespace App\Tests\Controller;

use App\Controller\NewCanvasController;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class NewCanvasControllerTest extends TestCase {

    protected function setUp()
    {
        $this->client = new Client([
            'base_uri' => 'http://drawingtool.docksal/'
        ]);
    }


    public function testAjaxAction() {
      $response = $this->client->post(
        '/new-canvas',
        array(
          'headers'=> array('Content-Type'=>'application/json'),
          'query' => array(
            'h' => 250,
            'w' => 300,
          )
        )
      );
      $this->assertEquals(200, $response->getStatusCode());
      $data = json_decode($response->getBody(), true);
      $this->assertArrayHasKey('width', $data);
      $this->assertArrayHasKey('height', $data);
      $this->assertArrayHasKey('status', $data);
    }
}
