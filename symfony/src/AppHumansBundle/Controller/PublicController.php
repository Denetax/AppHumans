<?php

namespace AppHumansBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppHumansBundle\Entity\User;
use AppHumansBundle\Form\UserType;
use Symfony\Component\Security\Core\Security;

class PublicController extends Controller
{
    public function loginAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('AppHumansBundle:User');

        if($request->getMethod() == 'POST')
        {
            $email = $request->get('email');
            $password = $request->get('password');

            $user = $repository->findOneBy(array('email'=>$email, 'password'=>$password));

            if($user)
            {
                return $this->redirect($this->generateUrl('app_humans_profil', array('id' => $user->getId())));
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
                $em->persist($user);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

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
            'name' => $user->getName(),
            'lastname' => $user->getLastname(),
            'email' => $user->getEmail(),
            'sexe' => $user->getSexe(),
            'yearborn' => $user->getYearBorn(),
            'phone' => $user->getPhone(),
            'adress' => $user->getAdress(),
            'cp' => $user->getCp(),
            'city' => $user->getCity(),
        ));
    }
}