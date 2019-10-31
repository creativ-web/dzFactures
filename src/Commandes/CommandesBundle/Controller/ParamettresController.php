<?php

namespace Commandes\CommandesBundle\Controller;

use Commandes\CommandesBundle\Entity\Paramettres;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Paramettre controller.
 *
 */
class ParamettresController extends Controller
{
    /**
     * Lists all paramettre entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $paramettres = $em->getRepository('CommandesBundle:Paramettres')->findAll();

        return $this->render('paramettres/index.html.twig', array(
            'paramettres' => $paramettres,
        ));
    }

    /**
     * Creates a new paramettre entity.
     *
     */
    public function newAction(Request $request)
    {
        $paramettre = new Paramettres();
        $form = $this->createForm('Commandes\CommandesBundle\Form\ParamettresType', $paramettre);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $SectionDocuments = $em->getRepository('CommandesBundle:Sectiondocs')->findOneBy(array('user' =>$this->getUser()));
        $Paramgestions = $em->getRepository('CommandesBundle:Paramgestions')->findOneBy(array('user' =>$this->getUser()));
        $img = $em->getRepository('CommandesBundle:Logos')->findBy(array('user' => $this->getUser()),array('id' => 'DESC'));
        $imgCachet = $em->getRepository('CommandesBundle:Cachets')->findBy(array('user' => $this->getUser()),array('id' => 'DESC'));

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($paramettre);
            $em->flush();

            return $this->redirectToRoute('admin_parametres_show', array('id' => $paramettre->getId()));
        }

        return $this->render('paramettres/new.html.twig', array(
            'paramettre' => $paramettre,
            'logo' => $img,
            'cachets' =>$imgCachet,
            'sectionDocuments'=>$SectionDocuments,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a paramettre entity.
     *
     */
    public function showAction(Paramettres $paramettre)
    {
        $deleteForm = $this->createDeleteForm($paramettre);

        return $this->render('paramettres/show.html.twig', array(
            'paramettre' => $paramettre,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing paramettre entity.
     *
     */
    public function editAction(Request $request, Paramettres $paramettre)
    {
        $deleteForm = $this->createDeleteForm($paramettre);
        $editForm = $this->createForm('Commandes\CommandesBundle\Form\ParamettresType', $paramettre);
        $editForm->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        $img = $em->getRepository('CommandesBundle:Logos')->findBy(array('user' => $this->getUser()),array('id' => 'DESC'));
        $imgCachet = $em->getRepository('CommandesBundle:Cachets')->findBy(array('user' => $this->getUser()),array('id' => 'DESC'));

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_parametres_edit', array('id' => $paramettre->getId()));
        }

        return $this->render('paramettres/edit.html.twig', array(
            'paramettre' => $paramettre,
            'logo' => $img,
            'cachets' =>$imgCachet,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a paramettre entity.
     *
     */
    public function deleteAction(Request $request, Paramettres $paramettre)
    {
        $form = $this->createDeleteForm($paramettre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($paramettre);
            $em->flush();
        }

        return $this->redirectToRoute('admin_parametres_index');
    }

    /**
     * Creates a form to delete a paramettre entity.
     *
     * @param Paramettres $paramettre The paramettre entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Paramettres $paramettre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_parametres_delete', array('id' => $paramettre->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
