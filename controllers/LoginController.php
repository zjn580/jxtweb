<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class LoginController extends Controller
{
	public $layout = false;
	//登录
    public function actionLogin()
    {	
    	return $this->render('index');
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