<?php

namespace AppHumansBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppHumansBundle\Entity\User;
use AppHumansBundle\Form\UserType;

class PublicController extends Controller
{
    public function loginAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $repository_user = $em->getRepository('AppHumansBundle:User');
        $repository_beneficiaries = $em->getRepository('AppHumansBundle:beneficiaries');

        if($request->getMethod() == 'POST')
        {
            $name = $request->get('name');
            $password = $request->get('password');

            $user = $repository_user->findOneBy(array('name'=>$name, 'password'=>$password));

            $beneficiaries = $repository_beneficiaries->findOneBy(array('name'=>$name, 'password'=>$password));

            if($user)
            {
                $session = $request->getSession();
                $session->set('id', $user->getId());
                $session->set('role', $user->getRole());
                return $this->redirect($this->generateUrl('app_humans_profil', array(
                    'id' => $user->getId()
                )));
            }

            if($beneficiaries)
            {
                $session = $request->getSession();
                $session->set('id', $beneficiaries->getId());
                $session->set('role', $beneficiaries->getRole());
                return $this->redirect($this->generateUrl('app_humans_profil_beneficiaries', array(
                    'id' => $beneficiaries->getId()
                )));
            }
        }
        return $this->render('AppHumansBundle:Public:login.html.twig');
    }

    public function signUpAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $user = new User();
        $form = $this->createForm(UserType::class, $user);


        if($request->isMethod('POST'))
        {
            if ($form->handleRequest($request)->isValid())
            {
                $user = $form->getData();
                $user->setRole('User');
                $em->persist($user);
                $em->flush();

                $session = $request->getSession();
                $session->set('id', $user->getId());
                $session->set('role', $user->getRole());
                return $this->redirect($this->generateUrl('app_humans_profil', array('id' => $user->getId())));
            }
        }
        return $this->render('AppHumansBundle:Public:signUp.html.twig', array('form' => $form->createView() ));
    }

    public function profilAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $user = $em->getRepository('AppHumansBundle:User')->find($id);
        return $this->render('AppHumansBundle:Public:profil.html.twig', array(
            'user' => $user,
        ));
    }
}