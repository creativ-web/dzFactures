<?php

namespace Commandes\CommandesBundle\Controller;

use Commandes\CommandesBundle\Entity\Configs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Config controller.
 *
 */
class ConfigsController extends Controller
{
    /**
     * Lists all config entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $configs = $em->getRepository('CommandesBundle:Configs')->findAll();

        return $this->render('configs/index.html.twig', array(
            'configs' => $configs,
        ));
    }

    /**
     * Creates a new config entity.
     *
     */
    public function newAction(Request $request)
    {
        $config = new Configs();
        $form = $this->createForm('Commandes\CommandesBundle\Form\ConfigsType', $config);
        $form->handleRequest($request);
        $user = $this->container->get('security.context')->getToken()->getUser();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $config->setUser($this->getUser());
            $em->persist($config);
            $em->flush();

            return $this->redirectToRoute('admin_configs_show', array('id' => $config->getId()));
        }

        return $this->render('configs/new.html.twig', array(
            'config' => $config,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a config entity.
     *
     */
    public function showAction(Configs $config)
    {
        $deleteForm = $this->createDeleteForm($config);

        return $this->render('configs/show.html.twig', array(
            'config' => $config,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing config entity.
     *
     */
    public function editAction(Request $request, Configs $config)
    {
        $deleteForm = $this->createDeleteForm($config);
        $editForm = $this->createForm('Commandes\CommandesBundle\Form\ConfigsType', $config);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_configs_edit', array('id' => $config->getId()));
        }

        return $this->render('configs/edit.html.twig', array(
            'config' => $config,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a config entity.
     *
     */
    public function deleteAction(Request $request, Configs $config)
    {
        $form = $this->createDeleteForm($config);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($config);
            $em->flush();
        }

        return $this->redirectToRoute('admin_configs_index');
    }

    /**
     * Creates a form to delete a config entity.
     *
     * @param Configs $config The config entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Configs $config)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_configs_delete', array('id' => $config->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
