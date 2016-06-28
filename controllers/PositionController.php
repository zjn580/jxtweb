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
        $session = \YII::$app->session;
        $session->open();
        $data['c_id'] = $session->get('company');
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
        $data['p_temptation'] = !empty($_POST['p_temptation'])?$_POST['p_temptation']:'';
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


    //预览职位内容
    public function actionPreview(){
        $session = \YII::$app->session;
        $session->open();

        $request = Yii::$app->request;
        $arr['data'] = $request->post();
        foreach ($arr['data'] as $key => $value) {
            if($key == 'salary_id'){
                $arr['data']['salary_id'] = Salary::find()->select('sa_salary')->where(['sa_id'=>$value])->asArray()->one()['sa_salary'];
            }
        }
        $arr['data']['c_id'] = $session->get('company');
        $arr['data']['u_name'] = $session->get('u_name');
        print_R($arr);
        return $this->render('toudi',$arr);
    }
    //待处理简历
    public function actionWait()
    {   
        $arr = $this->showResume(0);
        //print_r($arr);
        return $this->render('waitresume',['arr'=>$arr]);
    }
     //待定简历
    public function actionUndeter()
    {   
        $arr = $this->showResume(1);
        return $this->render('canInterviewResumes',['arr'=>$arr]);
    }
    //已通知面试
    public function actionInterview()
    {   
        $arr = $this->showResume(2);
        return $this->render('interview',['arr'=>$arr]);
    }
    //不合适简历
    public function actionInapp()
    {   
        $arr = $this->showResume(3);
        return $this->render('haveRefuseResumes',['arr'=>$arr]);
    }
    //自动过滤简历
    public function actionAuto()
    {   
        $arr = $this->showResume(4);
        return $this->render('autoFilterResumes',['arr'=>$arr]);
    }

    /**
     * 搜索简历
     * @return [type] [description]
     */
    public function actionSearch()
    {   
        $this->layout = false;
        $request = Yii::$app->request;
        $status = $request->post('status');
        $resumeStatus = $request->post('resumeStatus');
        $workExp = $request->post('workExp');
        $eduExp = $request->post('eduExp');
        $arr= $this->showResume($status,$resumeStatus,$workExp,$eduExp);
        return $this->render('ajaxshow',['arr'=>$arr,'status'=>$status]);

    }

    /**
     * ajax删除简历
     */
    public function actionSingle(){

         $request = Yii::$app->request;
         $po_id = $request->post('po_id');
         $connection = \Yii::$app->db;
         $query = $connection->createCommand()->delete('jx_po_pe', "po_id=$po_id")->execute();
         if($query){
            echo 1;
         }else{
            echo 0;
         }
    }

    /**
     * ajax批量删除
     * @return [type] [description]
     */
    public function actionBatch(){
         $request = Yii::$app->request;
         $po_id = $request->post('po_id');
         $connection = \Yii::$app->db;
         $query = $connection->createCommand()->delete('jx_po_pe', "po_id in ($po_id)")->execute();
         if($query){
            echo 1;
         }else{
            echo 0;
         }
    }


    /**
     * 不合适简历
     * @return [type] [description]
     */
    public function actionNoresumes(){
          $request = Yii::$app->request;
          $po_id = $request->post('po_id');
          $content = $request->post('content');
          //发送邮件
          

          //修改为不合适简历
          $connection = \Yii::$app->db;
          $query = $connection->createCommand()->update('jx_po_pe',['td_stasus'=>2],"po_id = $po_id")->execute();
          if($query){
            echo 1;
          }else{
            echo 0;
          }
    }


    /**
     * 通知面试
     * @return [type] [description]
     */
    public function actionCallback(){
        $request = Yii::$app->request;
        $email = $request->post('email');
        $interAdd = $request->post('interAdd');
        $interTime = $request->post('interTime');
        $linkMan = $request->post('linkMan');
        $linkPhone = $request->post('linkPhone');
        $name = $request->post('name');
        $subject = $request->post('subject');
        $po_id = $request->post('po_id');
        //发送邮件
        

        //修改为通知过简历
        $connection = \Yii::$app->db;
        $query = $connection->createCommand()->update('jx_po_pe',['td_stasus'=>3],"po_id = $po_id")->execute();
        if($query){
            echo 1;
        }else{ 
            echo 0;
        }

    }

    //我发布的职位
    public function actionPosit()
    {   
        $session = \YII::$app->session;
        $session->open();
        $c_id = $session->get('company');
        $query = (new \yii\db\Query())
        ->select([
                'p_id',
                'p_name',
                'p_type',
                'sa_salary',
                'ex_experience',
                'city_name',
                'e_name',
                'p_time',
                'p_resumes',
                ])
        ->from('jx_position')
        ->leftJoin('jx_salary','jx_salary.sa_id = jx_position.salary_id')
        ->leftJoin('jx_experience', 'jx_experience.ex_id = jx_position.experience_id')
        ->leftJoin('jx_city', 'jx_city.city_id = jx_position.city_id')
        ->leftJoin('jx_edu', 'jx_edu.e_id = jx_position.e_id')
        ->where(['c_id'=>$c_id,'is_up'=>0])
        ->all();
    
        return $this->render('positions',['arr'=>$query,'is_up'=>0]);
    }

     //下线的职位
    public function actionDown()
    {   
        $session = \YII::$app->session;
        $session->open();
        $c_id = $session->get('company');
        $query = (new \yii\db\Query())
        ->select([
                'p_id',
                'p_name',
                'p_type',
                'sa_salary',
                'ex_experience',
                'city_name',
                'e_name',
                'p_time',
                'p_resumes',
                ])
        ->from('jx_position')
        ->leftJoin('jx_salary','jx_salary.sa_id = jx_position.salary_id')
        ->leftJoin('jx_experience', 'jx_experience.ex_id = jx_position.experience_id')
        ->leftJoin('jx_city', 'jx_city.city_id = jx_position.city_id')
        ->leftJoin('jx_edu', 'jx_edu.e_id = jx_position.e_id')
        ->where(['c_id'=>$c_id,'is_up'=>1])
        ->all();
        //print_r($query);
        return $this->render('positions',['arr'=>$query,'is_up'=>1]);
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

    public function  showResume($status,$type="",$ex_id="",$e_id=""){
        $session = \YII::$app->session;
        $session->open();
        $c_id = $session->get('company');

        $where['td_stasus'] = $status;
        if(!empty($type)&&($type!=(-1))){
            $where['type'] = $type;
        }
        $where['jx_position.c_id'] = $c_id;
        if(!empty($ex_id)&&($ex_id!=(-1))){
            $where['jx_experience.ex_id'] = $ex_id;
        }
       $query = (new \yii\db\Query())
       ->select(['
                   (jx_person.pe_id),
                   (jx_position.p_id),
                   (jx_po_pe.po_id),
                   (jx_person.email),
                   (jx_user.u_name),
                   (jx_person.pe_status),
                   (jx_edu.e_name),
                   (jx_po_pe.td_time),
                   (jx_position.p_name),
                   (jx_edu.e_name),
                   (jx_experience.ex_experience),
                   (jx_person.pe_phone),
                   (jx_person.pe_img),
                   (jx_person.pe_intro),
                   (jx_person.pe_sex),
                   (jx_person.pe_born),
                   (jx_person.pe_marry),
                   (jx_status.status_name),
                   (jx_industry.l_name),
                   (jx_person.pe_position),
                   (jx_person.pe_work_nature),
                   (jx_person.pe_salary),
                   (jx_edu_history.eh_school),
                   (jx_work_history.w_company),
                   (jx_work_history.w_position),
                   (c.city_name) as pass_city,
                   (b.city_name) as now_city,
                   (a.city_name) as future_city
                   '])
        ->from('jx_po_pe')
        ->innerJoin('jx_person', 'jx_person.pe_id = jx_po_pe.pe_id')
        ->innerJoin('jx_position', 'jx_position.p_id = jx_po_pe.p_id')
        ->leftJoin('jx_edu', 'jx_edu.e_id = jx_person.e_id')
        ->leftJoin('jx_experience', 'jx_experience.ex_id = jx_person.ex_id')
        ->leftJoin('jx_status', 'jx_status.status_id = jx_person.status_id')
        ->leftJoin('jx_industry', 'jx_industry.l_id = jx_person.l_id')
        ->leftJoin('jx_user', 'jx_user.u_id = jx_person.u_id')
        ->leftJoin('jx_edu_history', 'jx_edu_history.pe_id = jx_person.pe_id')
        ->leftJoin('jx_work_history', 'jx_work_history.pe_id = jx_person.pe_id')
        ->leftJoin('jx_city as c', 'c.city_id = jx_person.pass_city_id')
        ->leftJoin('jx_city as b', 'b.city_id = jx_person.now_city_id')
        ->leftJoin('jx_city as a', 'a.city_id = jx_person.future_city_id')
        ->where($where);
        if(!empty($e_id&&$e_id!=(-1))){
            $query->andWhere(['>=', 'jx_edu.e_id', $e_id]);
        }
        $arr = $query->all();
        return $arr; 
    }
}