<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class Lucky2Controller extends Controller
{
    /**
     * @Route("/index/{name}", defaults={"name"= "wlodek"})
     */
    public function indexAction($name)
    {
        return $this->render('AppBundle:Lucky2:index.html.twig', array('name'=>$name));
//        $response= new Response(json_encode(array('name'=>$name)));
//        return $this->render('AppBundle:Lucky2:index.html.twig', array('name'=>$response));

    }

}
