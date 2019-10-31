<?php

namespace Commandes\CommandesBundle\Controller;

use Commandes\CommandesBundle\Entity\Departements;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Departement controller.
 *
 */
class DepartementsController extends Controller
{
    /**
     * Lists all departement entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $departements = $em->getRepository('CommandesBundle:Departements')->findAll();

        return $this->render('departements/index.html.twig', array(
            'departements' => $departements,
        ));
    }

    /**
     * Creates a new departement entity.
     *
     */
    public function newAction(Request $request)
    {
        $departement = new Departement();
        $form = $this->createForm('Commandes\CommandesBundle\Form\DepartementsType', $departement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($departement);
            $em->flush();

            return $this->redirectToRoute('admin_departements_show', array('id' => $departement->getId()));
        }

        return $this->render('departements/new.html.twig', array(
            'departement' => $departement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a departement entity.
     *
     */
    public function showAction(Departements $departement)
    {
        $deleteForm = $this->createDeleteForm($departement);

        return $this->render('departements/show.html.twig', array(
            'departement' => $departement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing departement entity.
     *
     */
    public function editAction(Request $request, Departements $departement)
    {
        $deleteForm = $this->createDeleteForm($departement);
        $editForm = $this->createForm('Commandes\CommandesBundle\Form\DepartementsType', $departement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_departements_edit', array('id' => $departement->getId()));
        }

        return $this->render('departements/edit.html.twig', array(
            'departement' => $departement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a departement entity.
     *
     */
    public function deleteAction(Request $request, Departements $departement)
    {
        $form = $this->createDeleteForm($departement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($departement);
            $em->flush();
        }

        return $this->redirectToRoute('admin_departements_index');
    }

    /**
     * Creates a form to delete a departement entity.
     *
     * @param Departements $departement The departement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Departements $departement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_departements_delete', array('id' => $departement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
