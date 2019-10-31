<?php

namespace Commandes\CommandesBundle\Controller;

use Commandes\CommandesBundle\Entity\Familles;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Famille controller.
 *
 */
class FamillesController extends Controller
{
    /**
     * Lists all famille entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $familles = $em->getRepository('CommandesBundle:Familles')->findAll();

        return $this->render('familles/index.html.twig', array(
            'familles' => $familles,
        ));
    }

    /**
     * Creates a new famille entity.
     *
     */
    public function newAction(Request $request)
    {
        $famille = new Familles();
        $form = $this->createForm('Commandes\CommandesBundle\Form\FamillesType', $famille);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($famille);
            $em->flush();

            return $this->redirectToRoute('admin_familles_index');
        }

        return $this->render('familles/new.html.twig', array(
            'famille' => $famille,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a famille entity.
     *
     */
    public function showAction(Familles $famille)
    {
        $deleteForm = $this->createDeleteForm($famille);

        return $this->render('familles/show.html.twig', array(
            'famille' => $famille,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing famille entity.
     *
     */
    public function editAction(Request $request, Familles $famille)
    {
        $deleteForm = $this->createDeleteForm($famille);
        $editForm = $this->createForm('Commandes\CommandesBundle\Form\FamillesType', $famille);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_familles_edit', array('id' => $famille->getId()));
        }

        return $this->render('familles/edit.html.twig', array(
            'famille' => $famille,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a famille entity.
     *
     */
    public function deleteAction(Request $request, Familles $famille)
    {
        $form = $this->createDeleteForm($famille);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($famille);
            $em->flush();
        }

        return $this->redirectToRoute('admin_familles_index');
    }

    /**
     * Creates a form to delete a famille entity.
     *
     * @param Familles $famille The famille entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Familles $famille)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_familles_delete', array('id' => $famille->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
