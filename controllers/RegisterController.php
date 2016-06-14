<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class RegisterController extends Controller
{
	public $layout = false;
	//注册
    public function actionRegister()
    {	
    	return $this->render('index');
    }
}