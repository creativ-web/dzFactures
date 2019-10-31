<?php

namespace Commandes\CommandesBundle\Controller;

use Commandes\CommandesBundle\Entity\Zonnestocks;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Zonnestock controller.
 *
 */
class ZonnestocksController extends Controller
{
    /**
     * Lists all zonnestock entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $zonnestocks = $em->getRepository('CommandesBundle:Zonnestocks')->findBy(array('user'=>$this->getUser()));

        return $this->render('zonnestocks/index.html.twig', array(
            'zonnestocks' => $zonnestocks,
        ));
    }

    /**
     * Creates a new zonnestock entity.
     *
     */
    public function newAction(Request $request)
    {
        $zonnestock = new Zonnestocks();
        $form = $this->createForm('Commandes\CommandesBundle\Form\ZonnestocksType', $zonnestock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $zonnestock->setUser($this->getUser());
            $em->persist($zonnestock);
            $em->flush();

            return $this->redirectToRoute('admin_zones_show', array('id' => $zonnestock->getId()));
        }

        return $this->render('zonnestocks/new.html.twig', array(
            'zonnestock' => $zonnestock,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a zonnestock entity.
     *
     */
    public function showAction(Zonnestocks $zonnestock)
    {
        $deleteForm = $this->createDeleteForm($zonnestock);

        return $this->render('zonnestocks/show.html.twig', array(
            'zonnestock' => $zonnestock,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing zonnestock entity.
     *
     */
    public function editAction(Request $request, Zonnestocks $zonnestock)
    {
        $deleteForm = $this->createDeleteForm($zonnestock);
        $editForm = $this->createForm('Commandes\CommandesBundle\Form\ZonnestocksType', $zonnestock);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_zones_edit', array('id' => $zonnestock->getId()));
        }

        return $this->render('zonnestocks/edit.html.twig', array(
            'zonnestock' => $zonnestock,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a zonnestock entity.
     *
     */
    public function deleteAction(Request $request, Zonnestocks $zonnestock)
    {
        $form = $this->createDeleteForm($zonnestock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($zonnestock);
            $em->flush();
        }

        return $this->redirectToRoute('admin_zones_index');
    }

    /**
     * Creates a form to delete a zonnestock entity.
     *
     * @param Zonnestocks $zonnestock The zonnestock entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Zonnestocks $zonnestock)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_zones_delete', array('id' => $zonnestock->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
