<?php

namespace AppBundle\Controller;

use AppBundle\Entity\BlogPost;
use DateTime;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller
{

    public function routeFinder(Request $request)
    {
        $request = $this->container->get('request');

        $routeName = $request->get('_route');
    }



    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need

        return $this->render('default/index.html.twig', [

            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,

        ]);
    }



    /**
     * @Route("/build", name="buildpage")
     */
    public function buildAction(Request $request)
    {
        // replace this example code with whatever you need

        return $this->render('build.html.twig', [

            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,

        ]);
    }



    /**
     * @Route("/blog", name="blogpage")
     */
    public function blogAction(Request $request)
    {
        $bPost = new BlogPost();
        $session = new Session();

        date_default_timezone_set('UTC');

        if($request->request->get('topic') != null) {

            $blogTopic = $request->request->get('topic');
            $blogContent = $request->request->get('content');

            $today = new DateTime(date('Y-m-d H:i:s'));

            $bPost->setTitle($blogTopic);
            $bPost->setContent($blogContent);
            $bPost->setCreatedAt($today);
            $bPost->setUser($this->username = $session->get('username'));

            $em = $this->getDoctrine()->getManager();

            // tells Doctrine you want to (eventually) save the Blog Post
            $em->persist($bPost);

            // actually executes the queries (i.e. the INSERT query)
            $em->flush();
        }

        $repository = $this->getDoctrine()->getRepository('AppBundle:BlogPost');

        $blogPosts = $repository ->findAll();

        $argsArray = [
            'blogPosts' => $blogPosts
        ];

        $templateName = 'blog';
        return $this->render($templateName. '.html.twig', $argsArray);
    }



    /**
     * @Route("/survey", name="surveypage")
     */
    public function surveyAction(Request $request)
    {
        // replace this example code with whatever you need

        return $this->render('survey.html.twig', [

            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,

        ]);
    }



    /**
     * @Route("/account", name="accountpage")
     */
    public function accountAction(Request $request)
    {
        return $this->render('account.html.twig', [

            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,

        ]);
    }


}
