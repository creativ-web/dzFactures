<?php

namespace Commandes\CommandesBundle\Controller;

use Commandes\CommandesBundle\Entity\Acheteurs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
/**
 * Acheteur controller.
 *
 */
class AcheteursController extends Controller
{
    /**
     * Lists all acheteur entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm('Commandes\CommandesBundle\Form\Filtre\FiltreContactType');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $mot = $form->get('mot')->getData();


            $acheteurs = $em->getRepository('CommandesBundle:Acheteurs')->search($mot,$this->getUser());

            return $this->render('acheteurs/index.html.twig', array(
                'acheteurs' => $acheteurs,
                'form' => $form->createView(),

                'mot'=>$mot
            ));
        }

        $acheteurs = $em->getRepository('CommandesBundle:Acheteurs')->findBy(array('user'=>$this->getUser(),'supp'=>0));

        return $this->render('acheteurs/index.html.twig', array(
            'acheteurs' => $acheteurs,
            'form' => $form->createView(),

        ));
    }

    /**
     * Creates a new acheteur entity.
     *
     */
    public function newAction(Request $request)
    {
        $acheteur = new Acheteurs();
        $form = $this->createForm('Commandes\CommandesBundle\Form\AcheteursType', $acheteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $acheteur->setUser($this->getUser());
            $em->persist($acheteur);
            $em->flush();

            return $this->redirectToRoute('admin_Acheteurs_show', array('id' => $acheteur->getId()));
        }

        return $this->render('acheteurs/new.html.twig', array(
            'acheteur' => $acheteur,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a acheteur entity.
     *
     */
    public function showAction(Acheteurs $acheteur)
    {
        $deleteForm = $this->createDeleteForm($acheteur);

        return $this->render('acheteurs/show.html.twig', array(
            'acheteur' => $acheteur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing acheteur entity.
     *
     */
    public function editAction(Request $request, Acheteurs $acheteur)
    {
        $deleteForm = $this->createDeleteForm($acheteur);
        $editForm = $this->createForm('Commandes\CommandesBundle\Form\AcheteursType', $acheteur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_Acheteurs_edit', array('id' => $acheteur->getId()));
        }

        return $this->render('acheteurs/edit.html.twig', array(
            'acheteur' => $acheteur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a acheteur entity.
     *
     */
    public function deleteAction( Acheteurs $acheteur)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $qb = $em->createQueryBuilder();
        $q = $qb->update('CommandesBundle:Acheteurs', 'u')

            ->set('u.supp', '?1')
            ->where('u.id = ?2')
            ->andWhere('u.user = ?3')
            ->setParameter(1, '1')
            ->setParameter(2, $acheteur)
            ->setParameter(3, $this->getUser())
            ->getQuery();
        $p = $q->execute();


        return $this->redirectToRoute('admin_Acheteurs_index');
    }

    /**
     * Creates a form to delete a acheteur entity.
     *
     * @param Acheteurs $acheteur The acheteur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Acheteurs $acheteur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_Acheteurs_delete', array('id' => $acheteur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    public function clientsAction()
    {

            $em = $this->getDoctrine()->getManager();
            $clients  =  $em->getRepository('CommandesBundle:Acheteurs')->findAll();


        foreach($clients as $data)
        {

                    $c[] = $data['nom'];

        }


        $response = new JsonResponse();

            $response->headers->set('Content-Type','application/json');
            return $response->setData(array(
                'c'=>$c,

            ));

        }
}
