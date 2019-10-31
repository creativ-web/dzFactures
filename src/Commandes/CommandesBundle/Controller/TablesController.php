<?php

namespace Commandes\CommandesBundle\Controller;

use Commandes\CommandesBundle\Entity\Tables;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Table controller.
 *
 */
class TablesController extends Controller
{
    /**
     * Lists all table entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $tables = $em->getRepository('CommandesBundle:Tables')->findBy(array('user'=>$this->getUser()));
        $form = $this->createForm('Commandes\CommandesBundle\Form\SearchsProduitsType');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $type = $form->get('type')->getData();
            $nature = $form->get('nature')->getData();
            $zone = $form->get('zone')->getData();
            $mot = $form->get('mot')->getData();


            if($zone == null){
                $produits = $em->getRepository('CommandesBundle:Tables')->search2($mot);
                return $this->render('tables/index.html.twig', array(
                    'produits' => $produits,
                    'form' => $form->createView(),
                ));
            }


            $produits = $em->getRepository('CommandesBundle:Tables')->search($mot,$zone);

        }
        return $this->render('tables/index.html.twig', array(
            'tables' => $tables,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new table entity.
     *
     */
    public function newAction(Request $request)
    {
        $table = new Tables();
        $form = $this->createForm('Commandes\CommandesBundle\Form\TablesType', $table);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $table->setUser($this->getUser());
            $table->setNom($form->get('nom')->getData());
            $em->persist($table);
            $em->flush();

            return $this->redirectToRoute('admin_tables_index');
        }

        return $this->render('tables/new.html.twig', array(
            'table' => $table,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a table entity.
     *
     */
    public function showAction(Tables $table)
    {
        $deleteForm = $this->createDeleteForm($table);

        return $this->render('tables/show.html.twig', array(
            'table' => $table,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing table entity.
     *
     */
    public function editAction(Request $request, Tables $table)
    {
        $deleteForm = $this->createDeleteForm($table);
        $editForm = $this->createForm('Commandes\CommandesBundle\Form\TablesType', $table);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_tables_edit', array('id' => $table->getId()));
        }

        return $this->render('tables/edit.html.twig', array(
            'table' => $table,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a table entity.
     *
     */
    public function deleteAction(Request $request, Tables $table)
    {
        $form = $this->createDeleteForm($table);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($table);
            $em->flush();
        }

        return $this->redirectToRoute('admin_tables_index');
    }

    /**
     * Creates a form to delete a table entity.
     *
     * @param Tables $table The table entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Tables $table)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_tables_delete', array('id' => $table->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
