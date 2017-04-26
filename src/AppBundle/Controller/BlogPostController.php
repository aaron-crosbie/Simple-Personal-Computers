<?php

namespace AppBundle\Controller;

use AppBundle\Entity\BlogComment;
use AppBundle\Entity\BlogPost;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Blogpost controller.
 *
 * @Route("blogpost")
 */
class BlogPostController extends Controller
{
    /**
     * Lists all blogPost entities.
     *
     * @Route("/", name="blogpost_index")
     *
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request)
    {
        $bPost = new BlogPost();

        $em = $this->getDoctrine()->getManager();


        if(isset($_POST['commentData'])) {

            $blogTopic = $request->request->get('topic');
            $blogContent = $request->request->get('content');

            $today = date('Y-m-d H:i:s');

            $bPost->setTitle($blogTopic);
            $bPost->setContent($blogContent);
            $bPost->setCreatedAt($today);

            $user = $this->get('security.token_storage')->getToken()->getUser();
            $bPost->setUser($user->getUsername());

            $em->persist($bPost);

            $em->flush();
        }



        $blogPosts = $em->getRepository('AppBundle:BlogPost')->findAll();


        return $this->render('blogpost/index.html.twig', array(
            'blogPosts' => $blogPosts,
        ));
    }

    /**
     * Creates a new blogPost.
     *
     * @Route("/new", name="blogpost_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        // Calling a new blog post entity
        $blogPost = new Blogpost();

        // Creating a form based on the information specified within the form type class
        $form = $this->createForm('AppBundle\Form\BlogPostType', $blogPost);

        // Symfony's way of handling a form with a received request
        $form->handleRequest($request);

        // Checking if the form is submitted and valid
        if ($form->isSubmitted() && $form->isValid())
        {
            // Calling the Doctrine to manage the query
            $em = $this->getDoctrine()->getManager();

            // The information is then persisted / sent tto the database
            $em->persist($blogPost);

            // Everything is flushed
            $em->flush();

            // A route containing that post is then returned to the user for view or edit
            return $this->redirectToRoute('blogpost_show', array('id' => $blogPost->getId()));
        }// end if

        // if the above if is false render this template with the passed variables within the array
        return $this->render('blogpost/new.html.twig', array(
            'blogPost' => $blogPost,
            'form' => $form->createView(),
        ));// end of route return

    }// End of new blog post class

    /**
     * Finds and displays a blogPost entity.
     *
     * @Route("/{id}", name="blogpost_show")
     * @Method("GET")
     * @param BlogPost $blogPost
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction(BlogPost $blogPost)
    {
        $deleteForm = $this->createDeleteForm($blogPost);

        $blogcommentRepository = $repository = $this->getDoctrine()->getRepository('AppBundle:BlogComment');

        $blogcomments = $blogcommentRepository->findBy(array('post' => $blogPost->getId()));

        return $this->render('blogpost/show.html.twig', array(
            'blogPost' => $blogPost,
            'blogcomments' => $blogcomments,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing blogPost entity.
     *
     * @Route("/{id}/edit", name="blogpost_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, BlogPost $blogPost)
    {
        $deleteForm = $this->createDeleteForm($blogPost);
        $editForm = $this->createForm('AppBundle\Form\BlogPostType', $blogPost);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('blogpost_edit', array('id' => $blogPost->getId()));
        }

        return $this->render('blogpost/edit.html.twig', array(
            'blogPost' => $blogPost,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a blogPost entity.
     *
     * @Route("/{id}", name="blogpost_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, BlogPost $blogPost)
    {
        $form = $this->createDeleteForm($blogPost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($blogPost);
            $em->flush();
        }

        return $this->redirectToRoute('blogpost_index');
    }

    /**
     * Creates a form to delete a blogPost entity.
     *
     * @param BlogPost $blogPost The blogPost entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(BlogPost $blogPost)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blogpost_delete', array('id' => $blogPost->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
