<?php

namespace AppHumansBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppHumansBundle:Default:index.html.twig');
    }
}
