<?php
#src/Controller/SiteController.php
namespace App\Controller;

use App\Entity\Canvas;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NewCanvasController extends AbstractController {

    public function ajaxAction(Request $request) {
      $w = $request->get('w');
      $h = $request->get('h');
      if(is_null($w) || is_null($h)) {

      }
      $response = ['w' => $w, 'h' => $h];
      return new JsonResponse(json_encode($response));
    }

    public function new(Request $request)
    {
        // creates a canvas and gives it some dummy data for this example
        $canvas = new Canvas();

        $form = $this->createFormBuilder($canvas)
            ->add('width', IntegerType::class)
            ->add('height', IntegerType::class)
            ->add('save', SubmitType::class, ['label' => 'Create Canvas'])
            ->getForm();

            $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $canvas = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($task);
            // $entityManager->flush();

            return new JsonResponse( json_encode($canvas) );
        }

        return $this->render('canvas/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
