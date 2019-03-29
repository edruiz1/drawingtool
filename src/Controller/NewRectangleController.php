<?php
#src/Controller/SiteController.php
namespace App\Controller;

use App\Exception\ExceptionManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NewRectangleController extends AbstractController {

    public function ajaxAction(Request $request) {
      $rx1 = intval($request->get('rx1'));
      $rx2 = intval($request->get('rx2'));
      $ry1 = intval($request->get('ry1'));
      $ry2 = intval($request->get('ry2'));
      if(is_null($rx1) || $rx1 == '') {
        throw new ExceptionManager("Variable rx1 cannot be null or a text.");
      }
      if(is_null($rx2) || $rx2 == '') {
        throw new ExceptionManager("Variable rx2 cannot be null or a text.");
      }
      if(is_null($ry1) || $ry1 == '') {
        throw new ExceptionManager("Variable ry1 cannot be null or a text.");
      }
      if(is_null($ry2) || $ry2 == '') {
        throw new ExceptionManager("Variable ry2 cannot be null or a text.");
      }
      if(is_nan($rx1)) {
        throw new ExceptionManager("Variable rx1 is not a number.");
      }
      if(is_nan($rx2)) {
        throw new ExceptionManager("Variable rx2 is not a number.");
      }
      if(is_nan($ry1)) {
        throw new ExceptionManager("Variable ry1 is not a number.");
      }
      if(is_nan($ry2)) {
        throw new ExceptionManager("Variable ry2 is not a number.");
      }

      $response = [
        'status' => TRUE,
      ];
      return new JsonResponse($response);
    }
}
