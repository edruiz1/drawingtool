<?php
#src/Controller/SiteController.php
namespace App\Controller;

use App\Exception\ExceptionManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NewCanvasController extends AbstractController {

    public function ajaxAction(Request $request) {
      $w = abs(intval($request->get('w')));
      $h = abs(intval($request->get('h')));
      if(is_null($w) || $w == '') {
        throw new ExceptionManager("Variable width cannot be null or a text.");
      }
      if(is_null($h) || $h == '') {
        throw new ExceptionManager("Variable height cannot be null or a text");
      }
      if(is_nan($w)) {
        throw new ExceptionManager("Variable width is not a number.");
      }
      if(is_nan($h)) {
        throw new ExceptionManager("Variable height is not a number.");
      }
      $response = [
        'status' => TRUE,
        'width' => $w,
        'height' => $h
      ];
      return new JsonResponse($response);
    }
}
