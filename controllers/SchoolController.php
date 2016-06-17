<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Industry;
use app\models\Scale;
use app\models\Nature;
use app\models\School;



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
        $scale = Scale::find()->asArray()->all();

        //企业
        $nature = Nature::find()->asArray()->all();

        return $this->render('index01',['ids'=>$ids,'scales'=>$scale,'natures'=>$nature]);
    }
    //信息添加
    public function actionDo_basic_insert(){

        $model = new School();

        $model->u_id =!empty($_POST['companyId'])?$_POST['companyId']:'';
        $model->n_id = !empty($_POST['s_radio_hidden'])?$_POST['s_radio_hidden']:'';;
        $model->scale_id = !empty($_POST['select_scale_hidden'])?$_POST['select_scale_hidden']:'';
        $model->city_id = !empty($_POST['city'])?$_POST['city']:'北京';
        //$model->s_intro = !empty($_POST['temptation'])?$_POST['temptation']:'';
        $model->s_website = !empty($_POST['website'])?$_POST['website']:'';
        $schooladd = $model->save();

        $user = new User();
        $user->u_name = !empty($_POST['name'])?$_POST['name']:'';
        $user->u_id =!empty($_POST['companyId'])?$_POST['companyId']:'';
        $useradd = $user->save();

        if($schooladd&&$useradd){
            $this->redirect('?r=school/info02');
        }else{
            echo 'fail';
        }


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