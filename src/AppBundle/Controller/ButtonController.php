<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Form\ButtonType;
use Symfony\Component\HttpFoundation\Request;

class ButtonController extends Controller
{
    /**
     * Matches /button
     *
     * @Route("/buttons", name="buttons_list")
     * @Template("@AppBundle/View/button.html.twig")
     */
    public function listAction()
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Button')->findAll();
        return array('buttons' => $repository);
    }

    /**
     *
     * @Route("/buttons/{id_button}", name="buttons_edit")
     * @Template("@AppBundle/View/buttonEdit.html.twig")
     */
    public function editAction($id_button, Request $request)
    {
        $button = $this->getDoctrine()->getRepository('AppBundle:Button')->findOneById($id_button);
        $form = $this->createForm(ButtonType::class, $button);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $button = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $em = $this->getDoctrine()->getManager();
            $em->persist($button);
            $em->flush();

            return $this->redirectToRoute('buttons_list');
        }

        return array(
            'buttons' => $button,
            'form'   => $form->createView(),
        );
    }
}