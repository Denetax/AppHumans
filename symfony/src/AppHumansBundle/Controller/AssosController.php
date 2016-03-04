<?php

namespace AppHumansBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AssosController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $associations = $em->getRepository('AppHumansBundle:associations')->findAll();
        return $this->render('AppHumansBundle:Assos:index.html.twig', array(
            'associations' => $associations
            ));
    }

    public function getAssosAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $associations = $em->getRepository('AppHumansBundle:associations')->find($id);
        return $this->render('AppHumansBundle:Assos:singleAssos.html.twig', array(
            'associations' => $associations
            ));
    }

    public function joinAssosAction($id_user, $id_assos, $role)
    {
        $em = $this->getDoctrine()->getEntityManager();
        if ($role == "User")
        {
            $user = $em->getRepository('AppHumansBundle:User')->find($id_user);
            $assos = $em->getRepository('AppHumansBundle:associations')->find($id_assos);
            $user->setAssociations($assos);
            $em->persist($user);
            $em->flush();

            return $this->redirect($this->generateUrl('app_humans_profil', array(
                'id' => $id_user
                )));
        }
        else
        {
            $user = $em->getRepository('AppHumansBundle:beneficiaries')->find($id_user);
            $assos = $em->getRepository('AppHumansBundle:associations')->find($id_assos);
            $assos->addBeneficiaries($user);
            $em->persist($assos);
            $em->flush();

            return $this->redirect($this->generateUrl('app_humans_profil_beneficiaries', array(
                'id' => $id_user
                )));
        }
    }
}
