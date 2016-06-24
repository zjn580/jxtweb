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
use yii\web\Session;
use yii\web\Cookie;


header('content-type:text/html;charset=utf8');
class SchoolController extends Controller
{
	public $layout = 'common';
    public $enableCsrfValidation=false;

	//培训机构
    public function actionSchool()
    {
        $industry = Industry::findBySql('select * from jx_industry WHERE pid=0')->asArray()->all();
        $natures = Nature::find()->asArray()->all();
        $connection = \Yii::$app->db;
        $command = $connection->createCommand('SELECT * FROM jx_school INNER JOIN jx_user ON jx_school.u_id=jx_user.u_id INNER JOIN jx_nature ON jx_school.n_id=jx_nature.n_id INNER JOIN jx_scale ON jx_school.scale_id=jx_scale.scale_id  INNER JOIN jx_sc_ma ON jx_school.s_id=jx_sc_ma.s_id');
        $posts = $command->queryAll();
//        print_r($posts);die;
        return $this->render('index',['industry'=>$industry,'natures'=>$natures,'schools'=>$posts]);
    }

    //我的机构主页
    public function actionMyhome()
    {
        $industry = Industry::findBySql('select * from jx_industry WHERE pid=0')->asArray()->all();
        $scale = Scale::findBySql('select * from jx_scale')->asArray()->all();
        $s_id = $_GET['id'];
        $connection = \Yii::$app->db;

        //获取sessionid 专业名称
        //$command = $connection->createCommand('SELECT m_name FROM jx_school INNER JOIN jx_sc_ma ON jx_school.s_id=jx_sc_ma.s_id INNER JOIN jx_major ON jx_sc_ma.m_id=jx_major.m_id WHERE u_id=25927');
        //$majors = $command->queryOne();
        // print_r($majors);die;

        $command = $connection->createCommand('SELECT * FROM jx_school INNER JOIN jx_user ON jx_school.u_id=jx_user.u_id INNER JOIN jx_nature ON jx_school.n_id=jx_nature.n_id INNER JOIN jx_scale ON jx_school.scale_id=jx_scale.scale_id inner join jx_industry on jx_industry.l_id=jx_school.l_id WHERE s_id='.$s_id);
        $posts = $command->queryOne();
        // print_r($posts);die;
        return $this->render('myhome',['industry'=>$industry,'scale'=>$scale,'school'=>$posts]);
    }

    //第一个修改的form
    public function actionSavename()
    {
    	// print_r($_POST);die;
    	$schoolId = $_POST['companyId'];
        $s_id = School::findBySql("select s_id,s_logo from jx_school WHERE u_id=".$schoolId)->asArray()->one();
        $model = School::findOne($s_id['s_id']);
        $model->s_intro = $_POST['companyFeatures'];
        $intro = $model->save();

        //修改user中的u_name
        $user = User::findOne($schoolId);
        $user->u_name = $_POST['companyShortName'];
        $name = $user->update();

        $arr=array();
        if ($intro&&$name) {
        	$arr['success'] = 1;
        	$arr['content']['companyShortName'] = $_POST['companyShortName'];
        	$arr['content']['companyFeatures'] = $_POST['companyFeatures'];
        	return  json_encode($arr);
        } else {
        	$arr['msg'] = "保存失败,请重新填写数据";
        	return  json_encode($arr);
        }
    }

    //修改公司标签
    public function actionUpdatetag()
    {
    	//print_r($_POST);die;
    	$schoolId = $_POST['companyId'];
        $s_id = School::findBySql("select s_id,s_logo from jx_school WHERE u_id=".$schoolId)->asArray()->one();
        $model = School::findOne($s_id['s_id']);
        $model->s_tags = $_POST['labels'];
        $tags = $model->save();
        $arr=array();
        if ($tags) {
        	$arr['success'] = 1;
        	return  json_encode($arr);
        } else {
        	$arr['msg'] = "保存失败,请重新填写数据";
        	return  json_encode($arr);
        }
    }


    //简介
    public function actionSaveprofile()
    {
        //echo json_encode($_POST);die;
        //print_r($_POST);die;
        $schoolId = $_POST['companyId'];
        $s_id = School::findBySql("select s_id,s_logo from jx_school WHERE u_id=".$schoolId)->asArray()->one();
        $model = School::findOne($s_id['s_id']);
        $model->s_intro = $_POST['companyProfile'];
        $tags = $model->save();
        $arr=array();
        if ($tags) {
            $arr['success'] = 1;
            $arr['content'] = $_POST['companyProfile'];
            return  json_encode($arr);
        } else {
            $arr['msg'] = "保存失败,请重新填写数据";
            return  json_encode($arr);
        }
    }

    /**
     * [actionSaveleader 修改联系人的方法]
     * @return [type] [description]
     */
    public function actionSaveleader()
    {
        //echo json_encode($_POST);die;
        //print_r($_POST);die;
        $schoolId = $_POST['companyId'];
        $s_id = School::findBySql("select s_id,s_logo from jx_school WHERE u_id=".$schoolId)->asArray()->one();
        $model = School::findOne($s_id['s_id']);
        $model->s_linkman = $_POST['name'];
        $model->s_phone = $_POST['position'];
        $tags = $model->save();
        $arr=array();
        if ($tags) {
            $arr['success'] = 1;
            $arr['content']['id'] = $_POST['id'];
            $arr['content']['weibo'] = $_POST['weibo'];
            $arr['content']['name'] = $_POST['name'];
            $arr['content']['position'] = $_POST['position'];
            $arr['content']['remark'] = $_POST['remark'];
            $arr['resubmitToken'] = $_POST['resubmitToken'];
            return  json_encode($arr);
        } else {
            $arr['msg'] = "保存失败,请重新填写数据";
            return  json_encode($arr);
        }
    }

    /**
     * [actionSavecity 城市 规模 网址]
     * @return [type] [description]
     */
    public function actionSavecity()
    {
        //echo json_encode($_POST);die;
        print_r($_POST);die;
        $schoolId = $_POST['companyId'];
        $s_id = School::findBySql("select s_id,s_logo from jx_school WHERE u_id=".$schoolId)->asArray()->one();
        $model = School::findOne($s_id['s_id']);
        $model->s_linkman = $_POST['name'];
        $model->s_phone = $_POST['position'];
        $tags = $model->save();
        $arr=array();
        if ($tags) {
            $arr['success'] = 1;
            $arr['content']['id'] = $_POST['id'];
            $arr['content']['weibo'] = $_POST['weibo'];
            $arr['content']['name'] = $_POST['name'];
            $arr['content']['position'] = $_POST['position'];
            $arr['content']['remark'] = $_POST['remark'];
            $arr['resubmitToken'] = $_POST['resubmitToken'];
            return  json_encode($arr);
        } else {
            $arr['msg'] = "保存失败,请重新填写数据";
            return  json_encode($arr);
        }
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

//        print_r($_POST);die;
        $model = new School();

        $model->u_id =!empty($_POST['companyId'])?$_POST['companyId']:'';
        $model->n_id = !empty($_POST['s_radio_hidden'])?$_POST['s_radio_hidden']:'';;
        $model->scale_id = !empty($_POST['select_scale_hidden'])?$_POST['select_scale_hidden']:'';
        $model->city_id = !empty($_POST['city'])?$_POST['city']:'北京';
        $model->l_id = !empty($_POST['select_industry_hidden'])?$_POST['select_industry_hidden']:'';
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
            $this->redirect('?r=school/info05');
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
            $this->redirect('?r=school/success');
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
        echo ($this->FindTags(1));die;

        return $this->render('bindstep3');
    }


    /*
     * 查询学校专业
     */
    public function FindMajor($s_id){
        $connection = \Yii::$app->db;
        $command = $connection->createCommand('SELECT m_id FROM jx_sc_ma WHERE `s_id`='.$s_id);
        $posts = $command->queryAll();
        $major_id='';
        foreach($posts as $id){
            $major_id .= $id['m_id'].',';
        }
        $major_id = substr($major_id,0,-1);
        return $major_id;
    }
    /*
     * 查询学校tags
     */
    public function FindTags($s_id){
        $connection = \Yii::$app->db;
        $command = $connection->createCommand('SELECT s_tags FROM jx_school WHERE `s_id`='.$s_id);
        $posts = $command->queryOne();
        $tags=explode(',',$posts['s_tags']);
        return $tags;
    }

    /**
     * 公司logo上传
     * @return [type] [description]
     */
    public function actionImg(){
        //print_r($_FILES);die;
        //设置session
        $session = Yii::$app->session;
        $session->open();

        $schoolId = $_POST['companyId'];
        $s_id = School::findBySql("select s_id,s_logo from jx_school WHERE u_id=".$schoolId)->asArray()->one();
        $model = School::findOne($s_id['s_id']);

        if (!empty($s_id['s_logo'])) {
        	unlink('./school/'.$s_id['s_logo']);
        }
        
        //文件上传
        $uploads_dir = './school';
        $tmp_name = $_FILES["logo"]["tmp_name"];
        $name = rand(10000,99999).$_FILES["logo"]["name"];
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
        $model->s_logo = $name;
		$arr = array();
        if($model->save())
        {
        	
        	$arr['success'] = 1;
        	$arr['content'] = $name;
        	return  json_encode($arr);
        }else
        {
        	
        	$arr['error'] = "上传文件失败,请重新上传";
        	return  json_encode($arr);
        }

    }

    /**
     * 认证上传的方法
     * @return [json] [返回值]
     */
    public function actionImgauth(){
        //print_r($_FILES);die;
        //设置session
        $session = Yii::$app->session;
        $session->open();

        $schoolId = $_POST['companyId'];
        $s_id = School::findBySql("select s_id,s_license from jx_school WHERE u_id=".$schoolId)->asArray()->one();
        $model = School::findOne($s_id['s_id']);

        if (!empty($s_id['s_license'])) {
        	unlink('./school/'.$s_id['s_license']);
        }
        
        //文件上传
        $uploads_dir = './school';
        $tmp_name = $_FILES["businessLicenes"]["tmp_name"];
        $name = 'auth'.rand(10000,99999).$_FILES["businessLicenes"]["name"];
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
        $model->s_license = $name;
		$arr = array();
        if($model->save())
        {
        	
        	$arr['success'] = 1;
        	return  json_encode($arr);
        }else
        {
        	
        	$arr['error'] = "上传文件失败,请重新上传";
        	return  json_encode($arr);
        }

    }

    public function actionImgproduct(){
        print_r($_FILES);die;
        //设置session
        $session = Yii::$app->session;
        $session->open();

        $schoolId = $_POST['companyId'];
        $s_id = School::findBySql("select s_id,s_license from jx_school WHERE u_id=".$schoolId)->asArray()->one();
        $model = School::findOne($s_id['s_id']);

        if (!empty($s_id['s_license'])) {
        	unlink('./school/'.$s_id['s_license']);
        }
        
        //文件上传
        $uploads_dir = './school';
        $tmp_name = $_FILES["businessLicenes"]["tmp_name"];
        $name = 'auth'.rand(10000,99999).$_FILES["businessLicenes"]["name"];
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
        $model->s_license = $name;
		$arr = array();
        if($model->save())
        {
        	
        	$arr['success'] = 1;
        	return  json_encode($arr);
        }else
        {
        	
        	$arr['error'] = "上传文件失败,请重新上传";
        	return  json_encode($arr);
        }

    }


}