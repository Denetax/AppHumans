<?php

namespace AppHumansBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppHumansBundle\Entity\beneficiaries;
use AppHumansBundle\Form\beneficiariesType;

class BeneficiariesController extends Controller
{
    public function loginAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('AppHumansBundle:beneficiaries');

        if($request->getMethod() == 'POST')
        {
            $email = $request->get('email');
            $password = $request->get('password');

            $user = $repository->findOneBy(array('email'=>$email, 'password'=>$password));

            if($user)
            {
                $session = $request->getSession();
                $session->set('id', $user->getId());
                $session->set('role', $user->getRole());
                return $this->redirect($this->generateUrl('app_humans_profil_beneficiaries', array(
                    'id' => $user->getId()
                )));
            }
        }
        return $this->render('AppHumansBundle:Beneficiaries:login.html.twig');
    }

    public function signUpAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $user = new beneficiaries();
        $form = $this->createForm(beneficiariesType::class, $user);


        if($request->isMethod('POST'))
        {
            if ($form->handleRequest($request)->isValid())
            {
                $user = $form->getData();
                $user->setRole('Beneficiary');
                $em->persist($user);
                $em->flush();

                $session = $request->getSession();
                $session->set('id', $user->getId());
                $session->set('role', $user->getRole());
                return $this->redirect($this->generateUrl('app_humans_profil_beneficiaries', array('id' => $user->getId())));
            }
        }
        return $this->render('AppHumansBundle:Beneficiaries:signUp.html.twig', array('form' => $form->createView() ));
    }

    public function profilAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $user = $em->getRepository('AppHumansBundle:beneficiaries')->find($id);
        return $this->render('AppHumansBundle:Beneficiaries:profil.html.twig', array(
            'user' => $user,
        ));
    }
}