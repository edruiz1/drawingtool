<?php
#src/Controller/SiteController.php
namespace App\Tests\Controller;

use App\Controller\NewRectangleController;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class NewRectangleControllerTest extends TestCase {

    protected function setUp()
    {
        $this->client = new Client([
            'base_uri' => 'http://drawingtool.docksal/'
        ]);
    }


    public function testAjaxAction() {
      $response = $this->client->post(
        '/new-rectangle',
        array(
          'headers'=> array('Content-Type'=>'application/json'),
          'query' => array(
            'rx1' => 25,
            'rx2' => 25,
            'ry1' => 30,
            'ry2' => 100,
          )
        )
      );
      $this->assertEquals(200, $response->getStatusCode());
      $data = json_decode($response->getBody(), true);
      $this->assertArrayHasKey('status', $data);
    }
}
