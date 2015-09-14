<?php
/**
 * Created by PhpStorm.
 * User: guopj
 * Date: 2015/9/1
 * Time: 17:51
 */

namespace Site\HomeBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Site\HomeBundle\Entity\Lists;
use Site\HomeBundle\Entity\Cards;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;

class ListController extends Controller{

    /**
     * @Route("/list/{id}",defaults={"id": 1}, requirements={"id": "\d+"},name="listIndex")
     */
    public function indexAction(){

        $id = $this -> getRequest()->get('id');
        return $this ->render('SiteHomeBundle:List:index.html.twig',array(
            'id' => $id
        ));
    }

    /**
     *@Route("/list/getBoard")
     */
    public function getBoard(){

        $bid = $this ->getRequest() -> get('b');
        $em = $this ->getDoctrine()->getManager();
//        $list = $em -> getRepository('SiteHomeBundle:Lists') ->findByBoardId($id);

        $list = $em -> getRepository('SiteHomeBundle:Lists') ->findBy(array(
            'boardId' => $bid
        ));

        //处理结果
        $list_data = array();
        foreach($list as $key =>$v){
            $list_data[$key]['title'] = $v->getTitle();
            $list_data[$key]['id'] = $v->getId();
            $list_data[$key]['position'] = $v->getPosition();
        }

//        var_dump($list_data);
        foreach($list_data as &$d){
            $card = $em->getRepository('SiteHomeBundle:Cards') -> findBy(array(
                  'listId' => $d['id']
            ));
            $card_data = array();
            foreach($card as $key =>$c){
                $card_data[$key]['id']= $c->getId();
                $card_data[$key]['title']= $c->getTitle();
                $card_data[$key]['description']= $c->getDescription();
                $card_data[$key]['position']= $c->getPosition();
                $card_data[$key]['list_id']= $c->getListId();
                $card_data[$key]['color']= $c->getColor();
            }
            $d['cards']= $card_data;
        }

        $data['lists'] = $list_data;
//        var_dump($data);
//       return new Response(json_encode($data));
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($data));
        return $response;
    }

    /**
     * @Route("/list/addList")
     */

    public function addList(){

        //获取参数
        $bid = $this -> getRequest() -> get('b');
        $title = $this->getRequest()->get('t');

        $lists = new Lists();
        $em = $this -> getDoctrine()->getEntityManager();
        $count_query = $em->createQuery("Select count(l) from SiteHomeBundle:Lists l");
        $count_num = $count_query -> getSingleResult();
        //var_dump($count_num);
        $lists -> setTitle($title);
        $lists -> setBoardId($bid);
        $lists -> setPosition($count_num['1']);
        $lists->setCreatedAt(new \DateTime('now'));
        $lists->setUpdatedAt(new \DateTime('now'));


        $em -> persist($lists);
        $em -> flush();

        $data = '添加list,新id值为'.$lists->getId();

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($data));
        return $response;

    }


    /**
     * @Route("/list/addCard")
     */

    public function addCard(){

        //获取参数
        $lid = $this -> getRequest() -> get('l');
        $title = $this->getRequest()->get('t');

        $cards = new Cards();
        $em = $this -> getDoctrine()->getEntityManager();
        $count_query = $em->createQuery("Select count(c) from SiteHomeBundle:Cards c where c.listId = :list_id")->setParameter('list_id',$lid);
        $count_num = $count_query -> getSingleResult();
        //var_dump($count_num);
        $cards -> setTitle($title);
        $cards -> setDescription('');
        $cards -> setListId($lid);
        $cards -> setPosition($count_num['1']);
        $cards->setCreatedAt(new \DateTime('now'));
        $cards->setUpdatedAt(new \DateTime('now'));


        $em -> persist($cards);
        $em -> flush();

        $data = '添加Card,新id值为'.$cards->getId();

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent(json_encode($data));
        return $response;

    }


    /**
     * @Route("/list/listPosition")
     */
    public function listPosition(){

        //request
        $bid = $this->getRequest()->get('b');
        $lid = $this->getRequest()->get('lid');
        $np = $this->getRequest()->get('np');

        //Doctrine
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('SiteHomeBundle:Lists')->find($lid);
        if (!$list) {
            throw $this->createNotFoundException('No product found for id '.$lid);
        }

        $op = $list->getPosition();
//        $lists = $em ->getRepository('SiteHomeBundle:Lists')->findBy(array('position'>=$op,'board_id'=> $bid));
        $ems = $this -> getDoctrine()->getEntityManager();
        $query = $ems ->createQuery("update SiteHomeBundle:Lists l set l.position = l.position-1 WHERE l.position >:op AND l.boardId = :bid")->setParameters(array(
            'op'=> $op,
            'bid' => $bid
        ));
        $query_plus = $ems ->createQuery("update SiteHomeBundle:Lists l set l.position = l.position+1 WHERE l.position >=:np AND l.boardId = :bid")->setParameters(array(
            'np'=> $np,
            'bid' => $bid
        ));
        $res_plus = $query_plus -> getResult();
        $res = $query -> getResult();



        $list -> setPosition($np);
        $em ->persist($list);
        $em->flush();

        $data = $res&&$res_plus;
        $response = new Response();
        $response ->headers -> set('Content-Type','application/json');
        $response -> setContent(json_encode($data));
        return $response;
    }

    /**
     * @Route("/list/cardPosition")
     */
    public function cardPosition(){

        //request
        $cid = $this->getRequest()->get('cid');
        $nl = $this->getRequest()->get('nl');
        $np = $this->getRequest()->get('np');

        //Doctrine
        $em = $this->getDoctrine()->getManager();
        $card = $em->getRepository('SiteHomeBundle:Cards')->find($cid);
        if (!$card) {
            throw $this->createNotFoundException('No product found for id '.$cid);
        }

        $ol = $card -> getListId();
        $op = $card->getPosition();
//        $lists = $em ->getRepository('SiteHomeBundle:Lists')->findBy(array('position'>=$op,'board_id'=> $bid));
        $ems = $this -> getDoctrine()->getEntityManager();
        $query = $ems ->createQuery("update SiteHomeBundle:Cards l set l.position = l.position-1 WHERE l.position >:op AND l.listId = :cid")->setParameters(array(
            'op'=> $op,
            'cid' => $ol
        ));
        $query_plus = $ems ->createQuery("update SiteHomeBundle:Cards l set l.position = l.position+1 WHERE l.position >=:np AND l.listId = :cid")->setParameters(array(
            'np'=> $np,
            'cid' => $nl
        ));
        $res_plus = $query_plus -> getResult();
        $res = $query -> getResult();

        $card -> setPosition($np);
        $card -> setListId($nl);
        $em ->persist($card);
        $em->flush();


        $data = $res&&$res_plus;
        $response = new Response();
        $response ->headers -> set('Content-Type','application/json');
        $response -> setContent(json_encode($data));
        return $response;
    }


    /**
     * @Route("/list/deleteCard")
     */
    public function deleteCard(){

        $cid = $this->getRequest()->get('cid');

        if(!$cid){
            throw $this -> createNotFoundException('empty id'.$cid);
        }

        $em = $this -> getDoctrine()->getManager();
        $card = $em -> getRepository('SiteHomeBundle:Cards')->find($cid);

        if(!$card){
            throw $this -> createNotFoundException('No card found for id'.$cid);
        }
        $em -> remove($card);
        $em->flush();

        $response = new Response();
        $response ->headers -> set('Content-Type','application/json');
        $response -> setContent(json_encode(1));
        return $response;
    }

    /**
     *
     * @Route("/list/cardDescription")
     */
    public function cardDescription(){

        $cid = $this ->getRequest()->get('cid');
        $cardDesc = $this ->getRequest()->get('cardDesc');

        if(!$cid){
            throw $this -> createNotFoundException('empty id'.$cid);
        }

        $em = $this -> getDoctrine()->getManager();
        $card = $em -> getRepository('SiteHomeBundle:Cards')->find($cid);

        if(!$card){
            throw $this -> createNotFoundException('No card found for id'.$cid);
        }

        $card -> setDescription($cardDesc);
        $em->flush();

        $response = new Response();
        $response ->headers -> set('Content-Type','application/json');
        $response -> setContent(json_encode(1));
        return $response;

    }


    //PHP stdClass Object转array
    public function object_array($array) {
        if(is_object($array)) {
            $array = (array)$array;
        }
        if(is_array($array)) {
            foreach($array as $key=>$value) {
                $array[$key] = $this->object_array($value);
            }
        }
        return $array;
    }
} 