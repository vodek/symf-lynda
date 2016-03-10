<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Employer;
use AppBundle\Form\EmployerType;

/**
 * Employer controller.
 *
 * @Route("/employer")
 */
class EmployerController2 extends Controller
{
    /**
     * Lists all Employer entities.
     *
     * @Route("/", name="employer_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $employers = $em->getRepository('AppBundle:Employer')->findAll();

        return $this->render('employer/index.html.twig', array(
            'employers' => $employers,
        ));
    }

    /**
     * Creates a new Employer entity.
     *
     * @Route("/new", name="employer_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $employer = new Employer();
        $form = $this->createForm('AppBundle\Form\EmployerType', $employer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($employer);
            $em->flush();

            return $this->redirectToRoute('employer_show', array('id' => $employer->getId()));
        }

        return $this->render('employer/new.html.twig', array(
            'employer' => $employer,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Employer entity.
     *
     * @Route("/{id}", name="employer_show")
     * @Method("GET")
     */
    public function showAction(Employer $employer)
    {
        $deleteForm = $this->createDeleteForm($employer);

        return $this->render('employer/show.html.twig', array(
            'employer' => $employer,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Employer entity.
     *
     * @Route("/{id}/edit", name="employer_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Employer $employer)
    {
        $deleteForm = $this->createDeleteForm($employer);
        $editForm = $this->createForm('AppBundle\Form\EmployerType', $employer);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($employer);
            $em->flush();

            return $this->redirectToRoute('employer_edit', array('id' => $employer->getId()));
        }

        return $this->render('employer/edit.html.twig', array(
            'employer' => $employer,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Employer entity.
     *
     * @Route("/{id}", name="employer_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Employer $employer)
    {
        $form = $this->createDeleteForm($employer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($employer);
            $em->flush();
        }

        return $this->redirectToRoute('employer_index');
    }

    /**
     * Creates a form to delete a Employer entity.
     *
     * @param Employer $employer The Employer entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Employer $employer)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('employer_delete', array('id' => $employer->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
