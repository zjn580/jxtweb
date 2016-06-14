<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SchoolController extends Controller
{
	public $layout = 'common';
	//培训机构
    public function actionSchool()
    {	
    	return $this->render('index');
    }
}