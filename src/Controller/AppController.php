<?php

namespace App\Controller;

use App\Entity\Role;
use App\Entity\User;
use App\Form\RegisterFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\RoleService;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class AppController
 * @package App\Controller
 */
class AppController extends AbstractController
{

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * @var RoleService
     */
    private $service;

    /**
     * AppController constructor.
     * @param RoleService $service
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(RoleService $service,
                                UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->service = $service;
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @Route("/", name="index")
     */
    public function index(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(RegisterFormType::class, $user, [
            'action' => $this->generateUrl('register'),
            'method' => 'POST',
        ]);
        $form->handleRequest($request);

        return $this->render('main/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route(
     *     "/register",
     *     name="register",
     *     methods={"GET", "POST"}
     * )
     * @param Request $request
     * @return Response
     */
    public function register(Request $request): Response
    {

        $user = new User();

        /** @var Role $role */
        $role = $this->service->fetchOne('Standard');

        $user->setRole($role);
        $form = $this->createForm(RegisterFormType::class, $user, [
            'action' => $this->generateUrl('register'),
            'method' => 'POST',
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                $user->getPassword()
                ));
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
        }

        return $this->render('main/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
