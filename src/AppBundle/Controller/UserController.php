<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Controller\DefaultController;
use Symfony\Component\HttpFoundation\Session\Session;

class UserController extends Controller
{

    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        $user = new User();
        $name = $request->request->get('username');
        $password = $request->request->get('password');

        $data = new DbManager();
        $data -> authenticateUser($name, $password);

        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction(Request $request)
    {
        $session = new Session();
        $session ->remove('username');

        return $this->redirect('/');
    }





    /**
     * @Route("/users/list", name="user_list")
     */
    public function listAction(Request $request)
    {
        $userRepository = $this->getDoctrine()->getRepository('AppBundle:User');
        $users= $userRepository->findAll();
        $argsArray = [
            'users' => $users
        ];
        $templateName = 'users/list';
        return $this->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * @Route("/users/create/{name}, {password}", name="users_create")
     * @param $name
     * @param $password
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function createAction($name, $password)
    {
        $user = new User();
        $user->setName($name);
        $user->setPassword($password);

        $em = $this->getDoctrine()->getManager();
        // tells Doctrine you want to (eventually) save the Student (no queries yet)
        $em->persist($user);
        // actually executes the queries (i.e. the INSERT query)
        $em->flush();
//        return new Response('Created new student with id '.$student->getId());
        return $this->redirectToRoute('user_list');
    }

    /**
     * @Route("/users/delete/{id}", name="users_delete")
     * @param $id
     * @return Response
     */
    public function deleteAction($id)
    {
        // entity manager
        $em = $this->getDoctrine()->getManager();
        $userRepository = $em->getRepository('AppBundle:User');
        // find thge student with this ID
        $user = $userRepository->find($id);
        if (!$user) {
            throw $this->createNotFoundException(
                'No student found for id '.$id
            );
        }
        // tells Doctrine you want to (eventually) delete the Student (no queries yet)
        $em->remove($user);
        // actually executes the queries (i.e. the INSERT query)
        $em->flush();
        return new Response('Deleted user with id '.$id);
    }

    /**
     * @Route("/users/show/{id}", name="users_show")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find($id);
        if (!$user) {
            throw $this->createNotFoundException(
                'No user found for id '.$id
            );
        }
        $argsArray = [
            'user' => $user
        ];
        $templateName = 'users/show';
        return $this->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * @Route("/users/processNewForm", name="users_process_new_form")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function processNewFormAction(Request $request)
    {
        // extract 'name' parameter from POST data
        $name = $request->request->get('name');
        $password = $request->request->get('password');
        if(empty($name)){
            $this->addFlash(
                'error',
                'user name cannot be an empty string'
            );
            // forward this to the createAction() method
            return $this->newFormAction($request);
        }
        // forward this to the createAction() method
        return $this->createAction($name, $password);
    }

    /**
     * @Route("/users/new", name="users_new_form")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newFormAction(Request $request)
    {
        // create a task and give it some dummy data for this example
        $user = new User();
//        $name = $request->request->get('name');
//        $password = $request->request->get('password');
////        $form = $this->createFormBuilder($user)
//            ->add('name', TextType::class)
//            ->add('password', TextType::class)
//            ->add('save', SubmitType::class, array('label' => 'Create User'))
//            ->getForm();
//        $argsArray = [
//            'form' => $form->createView(),
//        ];
        echo '<h1>Your username was not found please register or try again</h1>';
        $templateName = 'users/new';
        return $this->render($templateName . '.html.twig');
    }
//
    /**
     * @Route("/register")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function registerUser(Request $request)
    {
//        session_start();
        $data = new DbManager();
        $data -> generateDatabase();

        // create a task and give it some dummy data for this example
        $user = new User();

        $fname = $request->request->get('name');
        $user -> setName($fname);

        $sname = $request->request->get('sname');
        $user -> setSName($sname);

        $email = $request->request->get('email');
//        $user -> setEmail($email);

        $username = $request->request->get('username');
        $user -> setUsername($username);

        $password = $request->request->get('password');
        $user -> setPassword($password);

        $dob = $request->request->get('dob');
        $user -> setAge($dob);

        $mobile = $request->request->get('mobile');
        $user -> setNumber($mobile);

        $addL1 = $request->request->get('addL1');
//        $user -> setAge($addL1);

        $addL2 = $request->request->get('addL2');
//        $user -> setAge($addL2);

        $addL3 = $request->request->get('addL3');
//        $user -> setAge($addL3);

//        $addL1 = $request->request->get('addL1');
//        $user -> setAddress($addL1);


        $data -> addUser($username, $fname, $mobile , $email, $dob, $addL1, $addL2, $addL3, $password );
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
}
