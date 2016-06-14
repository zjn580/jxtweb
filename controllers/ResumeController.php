<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class ResumeController extends Controller
{
	public $layout = 'common';
	//简历主页
    public function actionResume()
    {	
    	return $this->render('index');
    }

    //简历预览
     public function actionPreview()
    {
        return $this->render('preview');
    }

    //待定简历
    public function actionUndeter()
    {   
        // echo 111;die;
        return $this->render('canInterviewResumes');
    }

    //不合适简历
    public function actionInapp()
    {   
        // echo 111;die;
        return $this->render('haveRefuseResumes');
    }

    //自动过滤简历
    public function actionAuto()
    {   
        // echo 111;die;
        return $this->render('autoFilterResumes');
    }


   

}