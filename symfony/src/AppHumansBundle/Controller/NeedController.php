<?php

namespace AppHumansBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NeedController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $needs = $em->getRepository('AppHumansBundle:need')->findAll();
        return $this->render('AppHumansBundle:Need:index.html.twig', array(
            'needs' => $needs
        ));
    }
}