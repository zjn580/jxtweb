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
use app\models\Major;
use app\models\Schoolmajor;

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

    //基本信息添加
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
            $this->redirect('?r=school/info01');
        }


    }

    //机构信息标签  2
     public function actionInfo02()
    {   
        return $this->render('tag');
    }

    //机构标签添加
    public function actionDo_tags_insert(){

        //接值
        $schoolId = !empty($_POST['companyId'])?$_POST['companyId']:'';

        $s_id = School::findBySql("select s_id from jx_school WHERE u_id=".$schoolId)->asArray()->one();

        $model = School::findOne($s_id['s_id']);

        if(empty($_POST['labels'])){
            echo '';die;
        }
        $model->s_tags = !empty($_POST['labels'])?$_POST['labels']:'';
        if($model->save()){
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    //机构信息联系人 3
     public function actionInfo03()
    {   
        return $this->render('founder');
    }

    //添加联系人的
    public function actionInsert_founder(){

//        print_r($_POST);die;
        if(empty($_POST['leaderInfos'][0])){

            echo "<script> alert('请正确填写数据') ,window.location.href='?r=school/info03';</script>";die;
        }
//
        //接值
        $schoolId = !empty($_POST['companyId'])?$_POST['companyId']:'';

        $s_id = School::findBySql("select s_id from jx_school WHERE u_id=".$schoolId)->asArray()->one();

        $model = School::findOne($s_id['s_id']);


        $model->s_linkman = !empty($_POST['leaderInfos'][0])?$_POST['leaderInfos'][0]:'';
        $model->s_phone = !empty($_POST['leaderInfos'][2])?$_POST['leaderInfos'][2]:'';

        if($model->save()){
//            echo 'success';die;
            $this->redirect('?r=school/info04');
        }else{
//            echo  'fail';die;
            echo "<script> alert('保存失败,请重新填写数据'),window.location.href='?r=school/info03';</script>";
//            $this->redirect('?r=school/info03');
        }

    }

    //机构专业
     public function actionInfo04()
    {   
        return $this->render('index02');
    }

    public function actionInsert_major(){

//        print_r($_POST);die;

        if(empty($_POST['productInfos'][0])){

            echo "<script> alert('请正确填写数据') ,window.location.href='?r=school/info04';</script>";die;
        }
        //接值
        $schoolId = !empty($_POST['companyId'])?$_POST['companyId']:'';

        $s_id = School::findBySql("select s_id from jx_school WHERE u_id=".$schoolId)->asArray()->one();

        $model = new  Major;
        $model->m_name = !empty($_POST['productInfos'][0])?$_POST['productInfos'][0]:'';
        $model->m_nums = !empty($_POST['productInfos'][1])?$_POST['productInfos'][1]:'';
        $model->m_intro = !empty($_POST['productInfos'][2])?$_POST['productInfos'][2]:'';
        $majors = $model->save();

        $m_id = Major::findBySql("select m_id from jx_major WHERE m_name = '".$_POST['productInfos'][0]."'")->asArray()->one();

        $modelm = new  Schoolmajor();
        $modelm->m_id = $m_id['m_id'];
        $modelm->s_id = $s_id['s_id'];
        $school_major = $modelm->insert();
        if($majors&&$school_major){
//            echo 'success';die;
            $this->redirect('?r=school/info04');
        }else{
//            echo  'fail';die;
            echo "<script> alert('保存失败,请重新填写数据'),window.location.href='?r=school/info04';</script>";
        }
    }

    //公司介绍 5
     public function actionInfo05()
    {   
        return $this->render('index03');
    }

    //公司介绍添加
    public function actionInsertintro()
    {

        if(empty($_POST['companyProfile'])){

            echo "<script> alert('请正确填写数据') ,window.location.href='?r=school/info04';</script>";die;
        }
//        print_r($_POST);die;
        //接值
        $schoolId = !empty($_POST['companyId'])?$_POST['companyId']:'';

        $s_id = School::findBySql("select s_id from jx_school WHERE u_id=".$schoolId)->asArray()->one();

        $model = School::findOne($s_id['s_id']);

        $model->s_intro = !empty($_POST['companyProfile'])?$_POST['companyProfile']:'';
        if($model->save()){
//            echo 'success';die;
            $this->redirect('?r=school/myhome');
        }else{
//            echo  'fail';die;
            echo "<script> alert('保存失败,请重新填写数据'),window.location.href='?r=school/info05';</script>";
        }
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