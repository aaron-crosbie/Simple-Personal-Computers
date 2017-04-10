<?php

namespace AppBundle\Controller;

use AppBundle\Entity\BlogPost;
use DateTime;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Validator\Constraints\Date;

class BlogController extends Controller
{



    public function showAction($blogPostID)
    {
        $blogPost = $this->getDoctrine()
            ->getRepository('AppBundle:BlogPost')
            ->find($blogPostID);

        if (!$blogPost) {
            throw $this->createNotFoundException(
                'No product found for id '.$blogPostID

            );
        }

        // ... do something, like pass the $product object into a template
    }
}