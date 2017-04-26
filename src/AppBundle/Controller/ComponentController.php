<?php

namespace AppBundle\Controller;

use AppBundle\Entity\BlogPost;
use DateTime;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use AppBundle\Entity\Motherboard;
use AppBundle\Entity\Cpu;
use AppBundle\Entity\Gpu;
use AppBundle\Entity\Hdd;
use AppBundle\Entity\Ram;
use AppBundle\Entity\Ssd;
use AppBundle\Entity\Psu;
use AppBundle\Controller\DbManager;

class ComponentController extends Controller
{
    //***************DEFAULT VARIABLES FOR EACH CLASS******************
    protected $price;
    protected $spent;
    protected $motherboard;
    protected $cpu;
    protected $gpu;
    protected $ram;
    protected $psu;
    protected $hdd;
    protected $ssd;
    protected $dbMgr;

    //*****************CHOICES FROM FORM INPUT*******************
    private $motherboardPref;
    private $cpuPref;
    private $gpuPref;
    private $ramPref;
    private $hddSize;
    private $ssdSize;

    /**
     * Controller constructor.
     * @param $price
     * @param $motherboardPref
     * @param $cpuPref
     * @param $gpuPref
     * @param $ramPref
     * @param $hddSize
     * @param $ssdSize
     * Initialises all component classes & takes in form data for later use
     */
    function __construct($price, $motherboardPref, $cpuPref, $gpuPref, $ramPref, $hddSize, $ssdSize)
    {
        //Instantiates all component classes
        $this->motherboard = new Motherboard();
        $this->cpu = new Cpu();
        $this->gpu = new Gpu();
        $this->ram = new Ram();
        $this->psu = new Psu();
        $this->hdd = new Hdd();
        $this->ssd = new Ssd();
        $this->dbMgr = new DbManager();

        //Instantiates all preferences
        $this->price = $price;
        $this->motherboardPref = $motherboardPref;
        $this->cpuPref = $cpuPref;
        $this->gpuPref = $gpuPref;
        $this->ramPref = $ramPref;
        $this->hddSize = $hddSize;
        $this->ssdSize = $ssdSize;
    }

    /**
     * @param $motherboard
     */
    function setMotherboard($motherboard)
    {
        $this->motherboard = $motherboard;

    }

    /**
     * @param $cpu
     */
    function setCpu($cpu)
    {
        $this->cpu = $cpu;
    }

    /**
     * @param $gpu
     */
    function setGpu($gpu)
    {
        $this->gpu = $gpu;
    }

    /**
     * @param $ram
     */
    function setRam($ram)
    {
        $this->ram = $ram;
    }

    /**
     * @param $hdd
     */
    function setHdd($hdd)
    {
        $this->hdd = $hdd;
    }

    /**
     * @param $ssd
     */
    function setSsd($ssd)
    {
        $this->ssd = $ssd;
    }

    /**
     * @param $psu
     */
    function setPsu($psu)
    {
        $this->psu = $psu;
    }

    /**
     * @return Motherboard name
     */
    function getMotherboardName()
    {
        return $this->motherboard->getName();
    }

    /**
     * @return Motherboard price
     */
    function getMotherboardPrice()
    {
        return $this->motherboard->getPrice();
    }

    /**
     * @return CPU name
     */
    function getCpuName()
    {
        return $this->cpu->getName();
    }

    /**
     * @return string
     */
    function getPsuName()
    {
        return $this->psu->getName();
    }

    function getPsuPrice()
    {
        return $this->psu->getPrice();
    }

    /**
     * @return CPU price
     */
    function getCpuPrice()
    {
        return $this->cpu->getPrice();
    }

    /**
     * @return GPU name
     */
    function getGpuName()
    {
        return $this->gpu->getName();
    }

    /**
     * @return GPU price
     */
    function getGpuPrice()
    {
        return $this->gpu->getPrice();
    }

    /**
     * @return Ram name
     */
    function getRamName()
    {
        return $this->ram->getName();
    }

    /**
     * @return Ram price
     */
    function getRamPrice()
    {
        return $this->ram->getPrice();
    }

    /**
     * @return HDD name
     */
    function getHddName()
    {
        return $this->hdd->getName();
    }

    /**
     * @return HDD price
     */
    function getHddPrice()
    {
        return $this->hdd->getPrice();
    }

    /**
     * @return SSD name
     */
    function getSsdName()
    {
        return $this->ssd->getName();
    }

    /**
     * @return SSD price
     */
    function getSsdPrice()
    {
        return $this->ssd->getPrice();
    }

    /**
     * @param $spent
     */
    function setSpent($spent)
    {
        $this->spent = $spent;
    }

    /**
     * @return mixed
     */
    function getSpent()
    {
        return $this->spent;
    }

    /**
     * @return string
     * Calls method to assemble components & returns price
     */
    function surveyAnalysis()
    {
        $price = (int)$this->price;

        $this->buildComputer($price);
    }

    /**
     * @param $price
     */
    function buildComputer($price)
    {
        $spent = 0;
        $maxPrice = $price;
        $currentWattage = 0;

        $this->setMotherboard($this->dbMgr->chooseMotherboard($this->motherboardPref, $maxPrice));
        $spent += $this->motherboard->getPrice();

        $this->setCpu($this->dbMgr->chooseCpu($this->cpuPref, $maxPrice));
        $spent += $this->cpu->getPrice();
        $currentWattage += $this->cpu->getWatts();

        $this->setGpu($this->dbMgr->chooseGpu($this->gpuPref, $maxPrice));
        $spent += $this->gpu->getPrice();
        $currentWattage += $this->gpu->getWatts();

        $this->setRam($this->dbMgr->chooseRam($this->motherboard->getRamType(), $this->ramPref));
        $spent += $this->ram->getPrice();
        $currentWattage += $this->ram->getWatts();

        $this->setHdd($this->dbMgr->chooseHdd($this->hddSize));
        $spent += $this->hdd->getPrice();
        $currentWattage += $this->hdd->getWatts();

        $this->setSsd($this->dbMgr->chooseSsd($this->ssdSize));
        $spent += $this->ssd->getPrice();
        $currentWattage += $this->ssd->getWatts();

        $this->setPsu($this->dbMgr->choosePsu($currentWattage, $this->getMotherboardPrice()));
        $spent += $this->psu->getPrice();

        if ($spent < $maxPrice) {
            $this->setSpent($spent);
        } else {
            $ssdSizes = $this->dbMgr->getSsdSizes();
            $spent -= $this->ssd->getPrice();
            $isNext = false;
            foreach ($ssdSizes as $currSize) {
                if ($isNext) {
                    list($size) = explode("GB", $currSize);
                    $this->setSsd($this->dbMgr->chooseSsd($size));
                    $this->setSpent($spent);
                }
                if ($currSize == $this->ssd->getStorage()) {
                    $isNext = true;
                }

            }
            if (!$isNext) {
                $this->spent -= $this->ssd->getPrice();
                $this->ssd->unsetVariables();
            }

        }
    }
}