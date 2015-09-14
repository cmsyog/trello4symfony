<?php

namespace Site\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Site\HomeBundle\Entity\User;
//use Symfony\Component\Security\Core\User\User;



class LoginController extends Controller
{

    /**
     * @Route("/login",name="user_login")
     *
     */
    public function index(){

        $user = new User();
        $form = $this->createFormBuilder($user)
            ->add('username','text',array(
                'label' => '姓名：'
            ))
            ->add('passwordHash','password',array(
                'label' => '密码：'
            ))
            ->getForm();

        return $this->render('SiteHomeBundle:Login:index.html.twig',array(
            'form' => $form->createView()
        ));
    }

    public function login(){

        $uname = $_POST['username'];
        $pwd = $_POST['password'];

        if(empty($uname)||empty($pwd)){
            $this->error('参数不能为空！');
        }
        $user_model = M('user');
        $where = array(
            'username' => $uname,
        );
        $res = $user_model -> where($where)->find();

        if($res){
            //密码验证
            $check = think_ucenter_decrypt($res['password_hash'],13);
            if($check == $pwd){
                $login_info = array(
                    'uname' => $uname,
                    'id' => $res['id'],
                );
                session('user_info',$login_info);
                cookie('user_info',$login_info);
                $this ->redirect('/admin.php/Index');
            }else{
                $this->error('密码验证错误！','/admin.php/Login');
            }
        }else{
            $this->error('用户不存在！','/admin.php/Login');
        }
    }

    function logout(){

        session('user_info',null);
        cookie('user_info',null);
        $this-> redirect('/admin.php/Login');
    }

}
