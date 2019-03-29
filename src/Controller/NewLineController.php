<?php
#src/Controller/SiteController.php
namespace App\Controller;

use App\Exception\ExceptionManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NewLineController extends AbstractController {

    public function ajaxAction(Request $request) {
      $x1 = intval($request->get('x1'));
      $x2 = intval($request->get('x2'));
      $y1 = intval($request->get('y1'));
      $y2 = intval($request->get('y2'));
      $is_vertical = FALSE;
      $is_horizontal = FALSE;
      if(is_null($x1) || $x1 == '') {
        throw new ExceptionManager("Variable x1 cannot be null or a text.");
      }
      if(is_null($x2) || $x2 == '') {
        throw new ExceptionManager("Variable x2 cannot be null or a text.");
      }
      if(is_null($y1) || $y1 == '') {
        throw new ExceptionManager("Variable y1 cannot be null or a text.");
      }
      if(is_null($y2) || $y2 == '') {
        throw new ExceptionManager("Variable y2 cannot be null or a text.");
      }
      if(is_nan($x1)) {
        throw new ExceptionManager("Variable x1 is not a number.");
      }
      if(is_nan($x2)) {
        throw new ExceptionManager("Variable x2 is not a number.");
      }
      if(is_nan($y1)) {
        throw new ExceptionManager("Variable y1 is not a number.");
      }
      if(is_nan($y2)) {
        throw new ExceptionManager("Variable y2 is not a number.");
      }
      if($x1 == $x2) {
        $is_horizontal = TRUE;
      } elseif ($y1 == $y2) {
        $is_vertical = TRUE;
      } else {
        throw new ExceptionManager("Cannot determine the orientation of the line. Out of scope.");

      }

      $response = [
        'status' => TRUE,
        'isVertical' => $is_vertical,
        'isHorizontal' => $is_horizontal,
      ];
      return new JsonResponse($response);
    }
}
