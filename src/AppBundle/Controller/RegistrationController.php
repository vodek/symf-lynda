<?php
/**
 * Created by PhpStorm.
 * User: wlodek
 * Date: 11/03/16
 * Time: 11:48
 */

namespace AppBundle\Controller;

use AppBundle\Form\EmployerType;
use AppBundle\Form\StudentType;
use AppBundle\Entity\Employer;
use AppBundle\Entity\Student;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



class RegistrationController extends Controller
{
  /**
   * @Route("/register-{who}", name="registration")
   */
    public function registerAction(Request $request, $who)
    {
        //assign value to user based on 'who' passed from url
        if ($who == 'employer'){
            $user = new Employer();
            $template = 'AppBundle:registration:employer.html.twig';
            $form = $this->createForm(EmployerType::class, $user);
        }
        elseif ($who == 'student'){
            $user = new Student();
            $template = 'AppBundle:registration:student.html.twig';
            $form = $this->createForm(StudentType::class, $user);
        }




        //handle submit
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            //encode password
            $password= $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            //save user(employer or student)
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em ->flush();
            //redirect to hompage
            return $this->redirectToRoute('homepage');
        }
        return $this->render($template,array('form'=>$form->createView()) );

    }
}