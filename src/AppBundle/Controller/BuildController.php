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

        $cpu = $em->getRepository('AppBundle:cpu')->findAll();
        $gpu = $em->getRepository('AppBundle:gpu')->findAll();
        $compcase = $em->getRepository('AppBundle:compcase')->findAll();
        $cooling = $em->getRepository('AppBundle:cooling')->findAll();
        $hdd = $em->getRepository('AppBundle:hdd')->findAll();
        $ssd = $em->getRepository('AppBundle:ssd')->findAll();
        $keyboard = $em->getRepository('AppBundle:keyboard')->findAll();
        $monitor = $em->getRepository('AppBundle:monitor')->findAll();
        $motherboard = $em->getRepository('AppBundle:motherboard')->findAll();
        $mouse = $em->getRepository('AppBundle:mouse')->findAll();
        $psu = $em->getRepository('AppBundle:psu')->findAll();
        $ram = $em->getRepository('AppBundle:ram')->findAll();

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


}
