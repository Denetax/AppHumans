<?php

namespace AppHumansBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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

    public function rechercheAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();

        if($request->getMethod() == 'POST')
        {
            $search = $request->get('search');
            if($search)
            {
                $a = $em->createQueryBuilder()
                    ->select('a')
                    ->from('AppHumansBundle:associations', 'a')
                    ->where('a.name LIKE :search')
                    ->setParameters(array('search' => '%'.$search.'%'))
                    ->getQuery()
                    ->getResult();

                return $this->render('AppHumansBundle:Assos:search.html.twig', array(
                    'associations' => $a
                ));
            }
        }
    }
}
