<?php
/**
 * Created by IntelliJ IDEA.
 * User: Sir Crobie
 * Date: 16/02/2017
 * Time: 15:27
 */

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

class ComponentController extends Controller
{
    /**
     * @Route("/cpu", name="cpu")
     */
    public function cpuAction(Request $request)
    {
        $data = new DbManager();

        $name = $request->request->get('Processors');
        $data -> getComponent($name, "cpu");



        echo '<h1> ', $data -> getComponent($name, "cpu") , " </h1>";

        // replace this example code with whatever you need
        return $this->render('build.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
}