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

            if ($form->get("product")->getData() == "Y0L0"){
                if ($form->get("category")->getData() == 0){
                    $category = 'DVD';
                }
                else{
                    $category = 'Music';
                }
                $search = $form->get("search")->getData();
                //$button->search;

                //code su service
                $client = $this->get("amazon.service");

                $response1  = $client->category($category)->page(1)->search($search);
                $response2  = $client->category($category)->page(2)->search($search);
                $response3  = $client->category($category)->page(3)->search($search);

                $list_of_items = array();

                for($i = 0; $i<count($response1->Items->Item); $i++)
                {
                    array_push($list_of_items, $response1->Items->Item[$i]);
                }

                for($i = 0; $i<count($response2->Items->Item); $i++)
                {
                    array_push($list_of_items, $response2->Items->Item[$i]);
                }

                for($i = 0; $i<count($response3->Items->Item); $i++)
                {
                    array_push($list_of_items, $response3->Items->Item[$i]);
                }

                $form = $this->createForm(new ButtonType($list_of_items), $button);
            }

            else {
                // A modifier
                //$button->setButtonProduct($form->get("product")->getData());
                $em = $this->getDoctrine()->getManager();
                $em->persist($button);
                $em->flush();

                return $this->redirectToRoute('buttons_list');
            }
        }

        return array(
            'button' => $button,
            'form'   => $form->createView(),
        );
    }
}