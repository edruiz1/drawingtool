<?php
#src/Controller/SiteController.php
namespace App\Tests\Controller;

use App\Controller\NewLineController;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class NewLineControllerTest extends TestCase {

    protected function setUp()
    {
        $this->client = new Client([
            'base_uri' => 'http://drawingtool.docksal/'
        ]);
    }


    public function testAjaxAction() {
      $response = $this->client->post(
        '/new-line',
        array(
          'headers'=> array('Content-Type'=>'application/json'),
          'query' => array(
            'x1' => 25,
            'x2' => 25,
            'y1' => 30,
            'y2' => 100,
          )
        )
      );
      $this->assertEquals(200, $response->getStatusCode());
      $data = json_decode($response->getBody(), true);
      $this->assertArrayHasKey('isVertical', $data);
      $this->assertArrayHasKey('isHorizontal', $data);
      $this->assertArrayHasKey('status', $data);
    }
}
