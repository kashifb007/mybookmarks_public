<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        if (isset($error) && !empty($lastUsername)) {
            if ($error->getMessage() === 'Bad credentials.') {
                $error = 'The username or password entered was incorrect';
            } elseif ($error->getMessage() === 'User account is disabled.') {
                $error = 'Sorry, your account is inactive';
            } else {
                $error = 'Sorry, we seem to have run into a snag trying to authenticate you';
            }
        }

        $errorMessage['messageKey'] = 0;
        $errorMessage['messageData'] = [$error] ?? [];
        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $errorMessage]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        //doesn't matter because it's handled by symfony
    }

    /**
     * @Route("/home", name="app_home")
     */
    public function home(): Response
    {
        return $this->render('security/home.html.twig', [

        ]);
    }
}
