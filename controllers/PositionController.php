<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Industry;
use app\models\Working;
use app\models\Edu;
class PositionController extends Controller
{
	public $layout = 'common';
    public $enableCsrfValidation=false;
	//发布职位首页
    public function actionPosition()
    {	

        $industry = new Industry;
        $ids = $industry->showIndustry();
        $working = new Working;
        $year = $working->showWorking();
        $edu = new Edu;
        $edus = $edu->showEdu();
        return $this->render('index',['ids'=>$ids,'year'=>$year,'edus'=>$edus]);
    }

    public function actionAbc(){
        echo 111;
    }
    //我收藏的职位
     public function actionCollect()
    {	
    	return $this->render('collections');
    }
    //我的订阅
      public function actionSubscribe()
    {	
    	// echo 111;die;
    	return $this->render('subscribe');
    }
    //我发布的职位
      public function actionPosit()
    {   
        // echo 111;die;
        return $this->render('positions');
    }

    //我投递的职位
    public function actionDelivery()
    {
        return $this->render('delivery');
    }

    //推荐职位
     public function actionRecommend()
    {
        return $this->render('mList');
    }
    
     //招聘职位的介绍
     public function actionIntroduce()
    {
        return $this->render('toudi');
    }

    //发布职位成功
     public function actionSuccess()
    {
        return $this->render('index06');
    }

    //招聘内容运营的介绍
     public function actionContent()
    {
        return $this->render('jobdetail');
    }

    //招聘web前端的介绍
     public function actionContent2()
    {
        return $this->render('jobdetail1');
    }

}