<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Industry;
use app\models\Scale;


header('content-type:text/html;charset=utf8');
class SchoolController extends Controller
{
	public $layout = 'common';
    public $enableCsrfValidation=false;
	//培训机构
    public function actionSchool()
    {	
    	return $this->render('index');
    }
    //我的机构主页
    public function actionMyhome()
    {	
    	return $this->render('myhome');
    }

     //申请认证(上传)
    public function actionApply()
    {   
        return $this->render('auth');
    }
    
    //申请机构认证中
    public function actionAuth()
    {   
        return $this->render('authSuccess');
    }
   	//添加学员信息
    public function actionAdd_member()
    {
    	return $this->render('add_member');
    }

    //填写机构基本 1
     public function actionInfo01()
    {

        //行业
        $industry = new Industry;
        $ids = $industry->showIndustry();
        //规模
        $customer = Scale::find()->asArray()->all();
//        print_r($customer);die;
        return $this->render('index01',['ids'=>$ids,'scale']);
    }

    //机构信息标签  2
     public function actionInfo02()
    {   
        return $this->render('tag');
    }

    //机构信息创始团队 3
     public function actionInfo03()
    {   
        return $this->render('founder');
    }

    //机构专业
     public function actionInfo04()
    {   
        return $this->render('index02');
    }

    //公司介绍 5
     public function actionInfo05()
    {   
        return $this->render('index03');
    }

    //填写机构信息完成
     public function actionSuccess()
    {   
        return $this->render('success');
    }

    //开通招聘服务 1
    public function actionOpen()
    {   
        return $this->render('bindstep1');
    }

     //开通招聘服务 2
    public function actionOpen2()
    {   
        return $this->render('bindstep2');
    }

     //开通招聘服务 3
    public function actionOpen3()
    {   
        return $this->render('bindstep3');
    }
}