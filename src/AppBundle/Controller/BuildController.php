<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Class BuildController
 * @package AppBundle\Controller
 * @Route("/build", name="build")
 */
class BuildController extends Controller
{

    /**
     * Lists all component entities.
     *
     * @Route("/", name="build_index")
     * @Method("GET")
     */
    public function buildAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cpu = $em->getRepository('AppBundle:Cpu')->findAll();
        $gpu = $em->getRepository('AppBundle:Gpu')->findAll();
        $compcase = $em->getRepository('AppBundle:Compcase')->findAll();
        $cooling = $em->getRepository('AppBundle:Cooling')->findAll();
        $hdd = $em->getRepository('AppBundle:Hdd')->findAll();
        $ssd = $em->getRepository('AppBundle:Ssd')->findAll();
        $keyboard = $em->getRepository('AppBundle:Keyboard')->findAll();
        $monitor = $em->getRepository('AppBundle:Monitor')->findAll();
        $motherboard = $em->getRepository('AppBundle:Motherboard')->findAll();
        $mouse = $em->getRepository('AppBundle:Mouse')->findAll();
        $psu = $em->getRepository('AppBundle:Psu')->findAll();
        $ram = $em->getRepository('AppBundle:Ram')->findAll();

        return $this->render('build/build.html.twig', array(
            'cpus' => $cpu,
            'gpus' => $gpu,
            'compcases' => $compcase,
            'coolings' => $cooling,
            'hdds' => $hdd,
            'ssds' => $ssd,
            'keyboards' => $keyboard,
            'monitors' => $monitor,
            'motherboards' => $motherboard,
            'mouses' => $mouse,
            'psus' => $psu,
            'rams' => $ram,
        ));
    }
    /**
    * @Route("/info", name="build_show")
    * @Method("GET")
    */
    public function showAction()
    {
        $em = $this->getDoctrine()->getManager();

        return $this->render('build/info.html.twig', array(

        ));
    }

}
