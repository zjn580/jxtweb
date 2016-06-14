<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class IndexController extends Controller
{
	public $layout = 'common';
	//主页
    public function actionIndex()
    {
    	return $this->render('index');
    }
    //账号设置
    public function actionAccount()
    {
    	return $this->render('accountBind');
    }

    //联系我们
    public function actionAbout()
    {
        return $this->render('about');
    }

    //主页前端开发搜索结果
    public function actionSearch()
    {
        return $this->render('list');
    }

}