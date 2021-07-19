<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    /**
     * @Route ("login", name="app_login",methods={"GET","POST"})
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function loginAction(AuthenticationUtils $authenticationUtils): Response
    {
        if (TRUE === $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute("admin");
        }

        if (TRUE === $this->get('security.authorization_checker')->isGranted('ROLE_FORMER')) {
            return $this->redirectToRoute("admin");
        }

        if (TRUE === $this->get('security.authorization_checker')->isGranted('ROLE_STUDENT')) {
            return $this->redirectToRoute("admin");
        }

        $lastUserName = $authenticationUtils->getLastUsername();
        $error = $authenticationUtils->getLastAuthenticationError();

        return $this->render('login/index.html.twig', [
            'last_username' => $lastUserName,
            'error' => $error,
        ]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

}
