<?php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Blogger\BlogBundle\Entity\Consulta;
use Blogger\BlogBundle\Form\ConsultaType;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller
{
    public function indexAction()
    {
        return $this->render('BloggerBlogBundle:Page:index.html.twig');
    }

    public function nosotrosAction()
    {
        return $this->render('BloggerBlogBundle:Page:nosotros.html.twig');
    }

    public function contactoAction(Request $request)
    {
    	$consulta = new Consulta();
	    $form = $this->createForm(ConsultaType::class, $consulta);
	    //$request = $this->getRequest(); 
	    if ($request->getMethod() == 'POST') {
	        $form->handleRequest($request);
	        if ($form->isValid()) {
	            /*$message = \Swift_Message::newInstance()
	            ->setSubject('Contact enquiry from symblog')
	            ->setFrom('enquiries@symblog.co.uk')
	            ->setTo($this->container->getParameter('blogger_blog.emails.contact_email'))
	            ->setBody($this->renderView('BloggerBlogBundle:Page:contactEmail.txt.twig', array('enquiry' => $enquiry)));
        	$this->get('mailer')->send($message);
        	*/
        	$this->get('session')->getFlashBag()->add('blogger-notice', 'Your contact enquiry was successfully sent. Thank you!');
	        return $this->redirect($this->generateUrl('blogger_blog_contacto'));
	        }
	    }
	    return $this->render('BloggerBlogBundle:Page:contacto.html.twig', array(
	        'form' => $form->createView()
	    ));
        //return $this->render('BloggerBlogBundle:Page:contacto.html.twig');
    }
}
