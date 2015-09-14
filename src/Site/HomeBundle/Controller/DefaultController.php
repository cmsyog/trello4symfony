<?php

namespace Site\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Site\HomeBundle\Entity\Boards;


class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $boards = $em -> getRepository('SiteHomeBundle:Boards')->findAll();

        return $this->render('SiteHomeBundle:Default:index.html.twig',array('boards' =>$boards));
    }


    /**
     * @Route("/addBoard")
     */
    public function addBoard(){

        //request获取
        $name = $this->getRequest()->get('name');
        $description = $this->getRequest()->get('description');

        //数据操作
        $boards = new Boards();
        $em = $this ->getDoctrine()->getManager();

        $boards -> setName($name);
        $boards -> setDescription($description);
        $boards->setCreatedAt(new \DateTime('now'));
        $boards->setUpdatedAt(new \DateTime('now'));
        $boards -> setOpen('1');
        $boards -> setBoardVisibility('1');

        $em -> persist($boards);
        $em -> flush();

        return $this->redirect('/');
    }
}
