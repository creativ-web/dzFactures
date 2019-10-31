<?php

namespace Commandes\CommandesBundle\Controller;

use Commandes\CommandesBundle\Entity\Stocks;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Stock controller.
 *
 */
class StocksController extends Controller
{
    /**
     * Lists all stock entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $stocks = $em->getRepository('CommandesBundle:Stocks')->findAll();

        return $this->render('stocks/index.html.twig', array(
            'stocks' => $stocks,
        ));
    }

    /**
     * Creates a new stock entity.
     *
     */
    public function newAction(Request $request)
    {
        $stock = new Stock();
        $form = $this->createForm('Commandes\CommandesBundle\Form\StocksType', $stock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($stock);
            $em->flush();

            return $this->redirectToRoute('admin_stock_show', array('id' => $stock->getId()));
        }

        return $this->render('stocks/new.html.twig', array(
            'stock' => $stock,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a stock entity.
     *
     */
    public function showAction(Stocks $stock)
    {
        $deleteForm = $this->createDeleteForm($stock);

        return $this->render('stocks/show.html.twig', array(
            'stock' => $stock,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing stock entity.
     *
     */
    public function editAction(Request $request, Stocks $stock)
    {
        $deleteForm = $this->createDeleteForm($stock);
        $editForm = $this->createForm('Commandes\CommandesBundle\Form\StocksType', $stock);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_stock_edit', array('id' => $stock->getId()));
        }

        return $this->render('stocks/edit.html.twig', array(
            'stock' => $stock,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a stock entity.
     *
     */
    public function deleteAction(Request $request, Stocks $stock)
    {
        $form = $this->createDeleteForm($stock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($stock);
            $em->flush();
        }

        return $this->redirectToRoute('admin_stock_index');
    }

    /**
     * Creates a form to delete a stock entity.
     *
     * @param Stocks $stock The stock entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Stocks $stock)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_stock_delete', array('id' => $stock->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
