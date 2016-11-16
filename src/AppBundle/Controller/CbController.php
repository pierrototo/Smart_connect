<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Form\CbType;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Cb;

class CbController extends Controller
{
    /**
     * Matches /cb
     *
     * @Route("/cb", name="cbs_list")
     * @Template("@AppBundle/View/cb.html.twig")
     */
    public function listAction()
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Cb')->findAll();
        return array('cb' => $repository);
    }

    /**
     *
     * @Route("/cb/create", name="cb_create")
     * @Template("@AppBundle/View/cbEdit.html.twig")
     */
    public function createAction($id_cb, Request $request)
    {
        //$cb = $this->getDoctrine()->getRepository('AppBundle:Cb')->findOneById($id_cb);
        $cb = new Cb();
        $form = $this->createForm(CbType::class, $cb);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $cb = $form->getData();
            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $em = $this->getDoctrine()->getManager();
            $em->persist($cb);
            $em->flush();

            return $this->redirectToRoute('cbs_list');
        }

        return array(
            'cb' => $cb,
            'form'   => $form->createView(),
        );
    }

    /**
     *
     * @Route("/cb/{id_cb}", name="cb_edit")
     * @Template("@AppBundle/View/cbEdit.html.twig")
     */
    public function editAction($id_cb, Request $request)
    {
        $cb = $this->getDoctrine()->getRepository('AppBundle:Cb')->findOneById($id_cb);
        //$cb = new Cb();
        $form = $this->createForm(CbType::class, $cb);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $cb = $form->getData();
            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $em = $this->getDoctrine()->getManager();
            $em->persist($cb);
            $em->flush();

            return $this->redirectToRoute('cbs_list');
        }

        return array(
            'cb' => $cb,
            'form'   => $form->createView(),
        );
    }
}