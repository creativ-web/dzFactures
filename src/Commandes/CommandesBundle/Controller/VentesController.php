<?php

namespace Commandes\CommandesBundle\Controller;

use Commandes\CommandesBundle\Entity\Ventes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Vente controller.
 *
 */
class VentesController extends Controller
{
    /**
     * Lists all vente entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ventes = $em->getRepository('CommandesBundle:Ventes')->findAll();

        return $this->render('ventes/index.html.twig', array(
            'ventes' => $ventes,
        ));
    }

    /**
     * Creates a new vente entity.
     *
     */
    public function newAction(Request $request)
    {
        $vente = new Ventes();
        $form = $this->createForm('Commandes\CommandesBundle\Form\VentesType', $vente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vente);
            $em->flush();

            return $this->redirectToRoute('admin_ventes_show', array('id' => $vente->getId()));
        }

        return $this->render('ventes/new.html.twig', array(
            'vente' => $vente,
            'form' => $form->createView(),
        ));
    }



    /**
     * Finds and displays a vente entity.
     *
     */
    public function showAction(Ventes $vente)
    {
        $deleteForm = $this->createDeleteForm($vente);

        return $this->render('ventes/show.html.twig', array(
            'vente' => $vente,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing vente entity.
     *
     */
    public function editAction(Request $request, Ventes $vente)
    {
        $deleteForm = $this->createDeleteForm($vente);
        $editForm = $this->createForm('Commandes\CommandesBundle\Form\VentesType', $vente);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_ventes_edit', array('id' => $vente->getId()));
        }

        return $this->render('ventes/edit.html.twig', array(
            'vente' => $vente,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a vente entity.
     *
     */
    public function deleteAction(Request $request, Ventes $vente)
    {
        $form = $this->createDeleteForm($vente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vente);
            $em->flush();
        }

        return $this->redirectToRoute('admin_ventes_index');
    }

    /**
     * Creates a form to delete a vente entity.
     *
     * @param Ventes $vente The vente entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ventes $vente)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_ventes_delete', array('id' => $vente->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
