<?php

namespace AppBundle\Controller;

use AppBundle\Entity\BlogPost;
use DateTime;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use AppBundle\Controller\ComponentController;

/**
 * Survey controller.
 *
 * @Route("survey")
 */
class SurveyController extends Controller
{
    /**
     * @Route("/", name="survey_index")
     */
    public function indexAction(Request $request)
    {
        $session = new Session();

        $submission = false;

        if (isset($_POST['gamesubmit'])) {

            $session->set('price', $request->request->get('price'));
            $session->set('motherboard', $request->request->get('motherboard'));
            $session->set('cpuPref', $request->request->get('cpuPref'));
            $session->set('gpuPref', $request->request->get('gpuPref'));
            $session->set('ram', $request->request->get('ram'));
            $session->set('hdd', $request->request->get('hdd'));
            $session->set('ssd', $request->request->get('ssd'));

            $submission = true;
        }

        if ($submission)
        {

            $cont = new ComponentController($session->get('price'), $session->get('motherboard'), $session->get('cpuPref'), $session->get('gpuPref'), $session->get('ram'), $session->get('hdd'), $session->get('ssd'));
            $test = $cont->surveyAnalysis();
            $testMotherboard = $cont->getMotherboardName();
            $testCpu = $cont->getCpuName();
            $testGpu = $cont->getGpuName();
            $testRam = $cont->getRamName();
            $testHdd = $cont->getHddName();
            $testSsd = $cont->getSsdName();
            $testPsu = $cont->getPsuName();
            $testSpent = $cont->getSpent();
            $underBudget = ($session->get('price') - $testSpent);

        return $this->render('survey/build.html.twig', array(
            'submission' => $submission,
            'test' => $test,
            'testMotherboard' => $testMotherboard,
            'testCpu' => $testCpu,
            'testGpu' => $testGpu,
            'testRam' => $testRam,
            'testHdd' => $testHdd,
            'testSsd' => $testSsd,
            'testPsu' => $testPsu,
            'testSpent' => $testSpent,
            'testUnderBudget' => $underBudget,
            ));
        }

        return $this->render('survey/survey.html.twig', array(
            'submission' => $submission,
        ));
    }
}