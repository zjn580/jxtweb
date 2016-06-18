<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use Session;
use Cookie;


class LoginController extends Controller
{
	public $layout = false;
    public $enableCsrfValidation=false;
	//登录
    public function actionLogin()
    {
    	return $this->render('index');
    }


    public function actionGoBack(){
        setcookie("u_account","");
        setcookie("u_id","");
        Session::flush();
        return redirect("index");
    }
    /*
     * 登陆判断页面
     * 记住密码
     * 七天免登陆
     * 密码输入三次，锁定用户
     */


    public function actionDeng()
    {
        //设置session
        $session = Yii::$app->session;
        $session->open();

        $email=$_POST['email'];
        $pwd=$_POST['password'];
        $time=$_POST['autoLogin'];
        $pwds=urlencode($pwd);
        $connection= \Yii::$app->db;
        $command =$connection->createCommand("select * from jx_user where u_account='$email'");
        if($command)
        {
        }
        else
        {
        }
    }

    //修改密码
    public function actionUpdate()
    {	
    	return $this->render('updatePwd');
    }
    //找回密码
    public function actionRetrieve()
    {	
    	return $this->render('reset');
    }

    //注册
     public function actionRegister()
    {   
        return $this->render('register');
    }
}