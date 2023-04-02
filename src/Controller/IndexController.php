<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class IndexController extends AbstractController
{
    private $name = 'Anonyme';

    /**
     * @Route("/", name="index")
     */
    public function index() : Response
    {
        return $this->render('index.html.twig', [
            'name' => $this->name
        ]);
    }

    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request) : Response
    {
        $form = $this->createFormBuilder()
            ->add('username', TextType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $this->name = $data['username'];
            dd($this->name);
            return $this->redirectToRoute('index');
        }

        return $this->render('login.html.twig', [
            'formLogin' => $form->createView()
        ]);
    }
}