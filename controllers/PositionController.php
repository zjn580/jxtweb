<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessController;
use yii\web\Controller;
use app\models\Industry;
use app\models\Experience;
use app\models\Edu;
use app\models\Salary;
use app\models\City;
use app\models\Position;
class PositionController extends Controller
{
	public $layout = 'common';
    public $enableCsrfValidation=false;
	//发布职位首页
    public function actionPosition()
    {	

        $industry = new Industry;
        $ids = $industry->showIndustry();
        $experience = new Experience;
        $year = $experience->showExperience();
        $edu = new Edu;
        $edus = $edu->showEdu();
        $salary = new Salary;
        $sly = $salary->showSalary();
        
        return $this->render('index',['ids'=>$ids,'year'=>$year,'edus'=>$edus,'sly'=>$sly]);
    }

    //添加职位
    public function actionAddpt(){
        //print_R($_POST);die;
        $data['l_id'] =  Industry::findBySql("select l_id from jx_industry where l_name = '$_POST[i_id]' limit 1")->asArray()->one()['l_id'];
        $data['p_name'] = !empty($_POST['p_name'])?$_POST['p_name']:"";
        $data['p_type'] = !empty($_POST['p_type'])?$_POST['p_type']:"";
        $data['salary_id'] = $_POST['salary_id'];
        $data['city_id'] = City::findBySql("select city_id from jx_City where city_name like '%$_POST[city_id]%' limit 1")->asArray()->one()['city_id'];
        $data['experience_id'] =  Experience::findBySql("select ex_id from jx_experience where ex_experience = '$_POST[ex_id]' limit 1")->asArray()->one()['ex_id'];
        $data['e_id'] =  Edu::findBySql("select e_id from jx_edu where e_name= '$_POST[edu]' limit 1")->asArray()->one()['e_id'];
        $data['p_content'] = $_POST['p_content'];
        $data['p_Lng'] = !empty($_POST['p_Lng'])?$_POST['p_Lng']:"";
        $data['p_Lat'] = !empty($_POST['p_Lat'])?$_POST['p_Lat']:"";
        $data['p_email'] = !empty($_POST['p_email'])?$_POST['p_email']:$_POST['email'];
        $data['p_address'] = !empty($_POST['p_address'])?$_POST['p_address']:'';
        $data['p_sex'] = !empty($_POST['p_sex'])?$_POST['p_sex']:1;
        $data['p_names'] = !empty($_POST['p_names'])?$_POST['p_names']:'';
        $data['p_phone'] = !empty($_POST['p_phone'])?$_POST['p_phone']:'';
        $data['is_name'] = !empty($_POST['is_name'])?$_POST['is_name']:0;
        $data['is_phone'] = !empty($_POST['is_phone'])?$_POST['is_phone']:0;
        $data['p_nums'] = !empty($_POST['p_nums'])?$_POST['p_nums']:0;
        $data['p_time'] = time();
        $position = new Position;
        foreach ($data as $key => $value) {
           $position -> $key  = $value;
        }
        if($position ->save()){
               echo json_encode(['success'=>1,'p_id'=>Yii::$app->db->getLastInsertID()]);
        }else{
            echo 0;
        }
        
    }
    //发布职位成功
    public function actionSuccess()
    {   
        $p_id  = \Yii::$app->request->get('p_id');
        return $this->render('index06');
    }

    public function actionPreview(){
        $request = Yii::$app->request;
        $arr['data'] = $request->post();
        foreach ($arr['data'] as $key => $value) {
            if($key == 'salary_id'){
                $arr['data']['salary_id'] = Salary::find()->select('sa_salary')->where(['sa_id'=>$value])->asArray()->one()['sa_salary'];
            }
        }
        return $this->render('toudi',$arr);
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