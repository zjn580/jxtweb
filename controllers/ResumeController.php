<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use Session;

class ResumeController extends Controller
{   
    
	public $layout = 'common';
    public $enableCsrfValidation=false;
    
	//简历主页
    public function actionResume()
    {
        $u_id = Yii::$app->session['u_id'];
        $connection = \Yii::$app->db;
        //简历姓名
        $result['resume_name'] = $connection->createCommand("select u_name from jx_user where u_id='$u_id'")->queryOne();
        $result['resume_name'] = implode('',$result['resume_name']);
        //工作年限
        $result['arr'] =  $connection->createCommand("select * from jx_experience")->queryAll();
        //学历
        $result['arr1'] = $connection->createCommand("select * from jx_edu")->queryAll();
        //目前状态
        $result['status'] = $connection->createCommand("select * from jx_status")->queryAll();
        //期望城市
        $result['city'] = $connection->createCommand("select * from jx_city")->queryAll();
        //期望月薪
        $result['monthly'] = $connection->createCommand("select * from jx_salary")->queryAll();
        //查询基本信息
        $result['basic'] = $connection->createCommand("select * from jx_person INNER JOIN jx_user on jx_person.u_id=jx_user.u_id
                       INNER JOIN jx_edu on jx_person.e_id=jx_edu.e_id
                       INNER JOIN jx_experience on jx_person.ex_id=jx_experience.ex_id
                       LEFT JOIN jx_status on jx_person.status_id=jx_status.status_id  where jx_person.u_id='$u_id'")->queryAll();
        //查询期望工作
        $result['expect'] = $connection->createCommand("select * from jx_person INNER JOIN jx_city on jx_person.future_city_id=jx_city.city_id
                                              INNER JOIN jx_salary on jx_person.pe_salary=jx_salary.sa_id where u_id='$u_id'")->queryAll();
        //查询工作经历
        $result['exper'] = $connection->createCommand("select * from jx_work_history INNER JOIN jx_person on jx_work_history.pe_id=jx_person.pe_id where jx_person.u_id='$u_id'")->queryAll();
        //查询项目经验
        $pe_id = \Yii::$app->db->createCommand("select pe_id from jx_person where u_id='$u_id'")->queryOne();
        $pe_id = implode('',$pe_id);
        $result['project'] = $connection->createCommand("select * from jx_project where pe_id='$pe_id'")->queryAll();
        //查询教育背景
        $result['education'] = $connection->createCommand("select * from jx_edu_history INNER JOIN jx_edu on jx_edu_history.eh_id=jx_edu.e_id
                                                                                       INNER JOIN jx_person on jx_edu_history.pe_id=jx_person.pe_id where jx_person.u_id='$u_id'")->queryAll();
    	//查询自我描述
        $result['desc'] = $connection->createCommand("select pe_intro from jx_person where u_id='$u_id'")->queryOne();
        //作品展示查询
        $result['works'] = $connection->createCommand("select * from jx_works where u_id='$u_id'")->queryAll();
        //头像查询
        $portrait= $connection->createCommand("select pe_img from jx_person where u_id='$u_id'")->queryOne();
        $portrait = implode('',$portrait);
        $result['portrait'] = $portrait;

        return $this->render('index',$result);
    }

    //基本信息
    public function actionBasicinsert(){
        $request = \Yii::$app->request;
        $connection = \Yii::$app->db;
        $u_name = $request->post('u_name');
        $pe_sex = $request->post('pe_sex');
        $e_id = $request->post('e_id');
        $ex_id = $request->post('ex_id');
        $pe_phone = $request->post('pe_phone');
        $email = $request->post('email');
        $status_id = $request->post('status_id');
        $y_year = \Yii::$app->db->createCommand("select ex_id from jx_experience where ex_experience='$ex_id'")->queryOne();
        $e_name = \Yii::$app->db->createCommand("select e_id from jx_edu where e_name='$e_id'")->queryOne();
        $status_id = \Yii::$app->db->createCommand("select status_id from jx_status where status_name='$status_id'")->queryOne();
        $e_name = implode('', $e_name);
        $y_year = implode('', $y_year);
        $status_id = implode('', $status_id);
        //session取值
        $u_id = Yii::$app->session['u_id'];
        //修改个人信息
        $res = $connection->createCommand()->update('jx_person', ['e_id'=>"$e_name",'ex_id'=>"$y_year",'email'=>"$email",'pe_sex'=>"$pe_sex",'pe_phone'=>"$pe_phone",'status_id'=>"$status_id"], "u_id='$u_id'")->execute();
        $result = $connection->createCommand()->update('jx_user',['u_name'=>"$u_name",'u_id'=>$u_id])->execute();
        if($result&$res){
           echo '1';
        }
    }

    //期望工作添加
    public function actionExpect()
    {
        $request = \Yii::$app->request;
        $future_city_id = $request->post('future_city_id');
        $pe_work_nature = $request->post('pe_work_nature');
        $pe_position = $request->post('pe_position');
        $pe_salary = $request->post('pe_salary');
        if($pe_salary=='2k以下'){
            $pe_salary=1;
        }
        if($pe_salary=='2k-5k'){
          $pe_salary=2;
        }
        if($pe_salary=='5k-10k'){
            $pe_salary=3;
        }
        if($pe_salary=='10k-15k'){
            $pe_salary=4;
        }
        if($pe_salary=='15k-25k'){
            $pe_salary=5;
        }
        if($pe_salary=='25k-50k'){
            $pe_salary=6;
        }
        if($pe_salary=='50k以上'){
            $pe_salary=7;
        }
        $future_city_id = \Yii::$app->db->createCommand("select city_id from jx_city where city_name='$future_city_id'")->queryOne();
        $future_city_id = implode('', $future_city_id);
        $connection = \Yii::$app->db;
        //session取值
        $u_id = Yii::$app->session['u_id'];
        //修改期望工作
        $res = $connection->createCommand()->update('jx_person',['future_city_id'=>"$future_city_id",'pe_work_nature'=>"$pe_work_nature",'pe_position'=>"$pe_position",'pe_salary'=>"$pe_salary"],"u_id=$u_id")->execute();
        if($res){
            echo '1';
        }
    }

    //工作经历添加
    public  function actionExperience()
    {
        //session取值
        $u_id = Yii::$app->session['u_id'];
        $pe_id = \Yii::$app->db->createCommand("select pe_id from jx_person where u_id='$u_id'")->queryOne();
        $pe_id = implode('',$pe_id);
        $request = \Yii::$app->request;
        $w_company = $request->post('w_company');
        $w_position = $request->post('w_position');
        $w_start_time = $request->post('w_start_time');
        $w_start_time1 = $request->post('w_start_time1');
        $w_end_time = $request->post('w_end_time');
        $w_end_time1 = $request->post('w_end_time1');
        $time_now = date('Y-m-d H:i:s',time()); //添加时间
        $start_time = $w_start_time.$w_start_time1;  //开始时间
        $end_time = $w_end_time.$w_end_time1;   //结束时间
        if($end_time=='至今至今'){
            $end_time = $time_now;
        }
        $db = \Yii::$app->db->createCommand();
        //添加工作经历
        $result = $db->insert('jx_work_history',['w_company'=>"$w_company",'w_position'=>"$w_position",'w_start_time'=>"$start_time",'w_end_time'=>"$end_time",'w_time'=>"$time_now",'pe_id'=>"$pe_id"])->execute();
        if($result){
            echo "1";
        }

    }

    //项目经验添加
    public function actionProject(){
        $request = \Yii::$app->request;
        $p_name = $request->post('p_name');
        $p_duties = $request->post('p_duties');  //担任职务
        $p_start_time = $request->post('p_start_time');
        $p_start_time1 = $request->post('p_start_time1');
        $p_end_time = $request->post('p_end_time');
        $p_end_time1 = $request->post('p_end_time1');
        $p_describe = $request->post('p_describe'); //项目描述
        $start_time = $p_start_time.$p_start_time1;
        $end_time = $p_end_time.$p_end_time1;
        if($end_time=="至今至今"){
            $end_time = date('Y-m-d H:i:s',time());
        }
        //session取值
        $u_id = Yii::$app->session['u_id'];
        $pe_id = \Yii::$app->db->createCommand("select pe_id from jx_person where u_id='$u_id'")->queryOne();
        $pe_id = implode('',$pe_id);
        //项目经验添加
        $db = \Yii::$app->db->createCommand();
        $result = $db->insert('jx_project',['p_name'=>"$p_name",'p_duties'=>"$p_duties",'p_start_time'=>"$start_time",'p_end_time'=>"$end_time",'p_describe'=>"$p_describe",'pe_id'=>"$pe_id"])->execute();
        if($result){
            echo "1";
        }
    }

    //教育背景添加
    public function actionEducation(){
        $request = \Yii::$app->request;
        $e_school = $request->post('e_school');
        $edu_id = $request->post('edu_id');
        $e_major = $request->post('e_major');
        $e_start_time = $request->post('e_start_time');
        $e_end_time = $request->post('e_end_time');
        if($edu_id=='大专'){
            $edu_id = '1';
        }
        if($edu_id=='本科'){
            $edu_id = '2';
        }
        if($edu_id=='硕士'){
            $edu_id = '3';
        }
        if($edu_id=='博士'){
            $edu_id = '4';
        }
        if($edu_id=='其他'){
            $edu_id = '5';
        }
        $e_time = date('Y-m-d H:i:s',time());
        $db = \Yii::$app->db->createCommand();
        $u_id = Yii::$app->session['u_id'];
        $pe_id = \Yii::$app->db->createCommand("select pe_id from jx_person where u_id='$u_id'")->queryOne();
        $pe_id = implode('',$pe_id);
        //教育背景添加
        $result = $db->insert('jx_edu_history',['e_school'=>"$e_school",'edu_id'=>"$edu_id",'e_major'=>"$e_major",'e_start_time'=>"$e_start_time",'e_end_time'=>"$e_end_time",'e_time'=>"$e_time",'pe_id'=>"$pe_id"])->execute();
        if($result){
            echo '1';
        }
    }

    //自我描述添加
    public function actionDescribe(){
        $u_id = Yii::$app->session['u_id'];
        $request = \Yii::$app->request;
        $pe_intro = $request->post('pe_intro');
        $db = \Yii::$app->db->createCommand();
        $result = $db->update('jx_person',['pe_intro'=>"$pe_intro"],"u_id='$u_id'")->execute();
        if($result){
            echo "1";
        }
    }

    //作品展示添加
    public function actionWorks(){
        $request = \Yii::$app->request;
        $w_link = $request->post('w_link');
        $w_explain = $request->post('w_explain');
        $db = \Yii::$app->db->createCommand();
        $u_id = Yii::$app->session['u_id'];
        $result = $db->insert('jx_works',['w_link'=>"$w_link",'w_explain'=>"$w_explain",'u_id'=>"$u_id"])->execute();
        if($result){
            echo "1";
        }
    }

    //简历预览
     public function actionPreview()
    {
        $u_id = Yii::$app->session['u_id'];
        $connection = \Yii::$app->db;
        //简历姓名
        $result['resume_name'] = $connection->createCommand("select u_name from jx_user where u_id='$u_id'")->queryOne();
        $result['resume_name'] = implode('',$result['resume_name']);
        //查询基本信息
        $result['basic'] = $connection->createCommand("select * from jx_person INNER JOIN jx_user on jx_person.u_id=jx_user.u_id
                       INNER JOIN jx_edu on jx_person.e_id=jx_edu.e_id
                       INNER JOIN jx_experience on jx_person.ex_id=jx_experience.ex_id
                       LEFT JOIN jx_status on jx_person.status_id=jx_status.status_id  where jx_person.u_id='$u_id'")->queryAll();
        //查询期望工作
        $result['expect'] = $connection->createCommand("select * from jx_person INNER JOIN jx_city on jx_person.future_city_id=jx_city.city_id
                                              INNER JOIN jx_salary on jx_person.pe_salary=jx_salary.sa_id where u_id='$u_id'")->queryAll();
        //查询工作经历
        $result['exper'] = $connection->createCommand("select * from jx_work_history INNER JOIN jx_person on jx_work_history.pe_id=jx_person.pe_id where jx_person.u_id='$u_id'")->queryAll();
        //查询项目经验
        $pe_id = \Yii::$app->db->createCommand("select pe_id from jx_person where u_id='$u_id'")->queryOne();
        $pe_id = implode('',$pe_id);
        $result['project'] = $connection->createCommand("select * from jx_project where pe_id='$pe_id'")->queryAll();
        //查询教育背景
        $result['education'] = $connection->createCommand("select * from jx_edu_history INNER JOIN jx_edu on jx_edu_history.eh_id=jx_edu.e_id
                                                                                       INNER JOIN jx_person on jx_edu_history.pe_id=jx_person.pe_id where jx_person.u_id='$u_id'")->queryAll();
        //查询自我描述
        $result['desc'] = $connection->createCommand("select pe_intro from jx_person where u_id='$u_id'")->queryAll();
        //作品展示查询
        $result['works'] = $connection->createCommand("select * from jx_works where u_id='$u_id'")->queryAll();
        //头像查询
        $portrait= $connection->createCommand("select pe_img from jx_person where u_id='$u_id'")->queryOne();
        $portrait = implode('',$portrait);
        $result['portrait'] = $portrait;

        return $this->render('preview',$result);
    }

    //个人登陆 基本信息 1
    public function actionPerson1()
    {   
        $this->layout=false;
        $connection = \Yii::$app->db;
        //工作年限
        $result['arr'] =  $connection->createCommand("select * from jx_experience")->queryAll();
        //学历
        $result['arr1'] = $connection->createCommand("select * from jx_edu")->queryAll();
        // print_r($result);die;
        return $this->render('personal01',$result);
    }

    //基本信息接值
    public function actionBasicadd(){
        //session取值
        $u_id = Yii::$app->session['u_id'];
        $request = \Yii::$app->request;
        $u_name = $request->post('u_name'); //姓名
        $e_id = $request->post('e_id');
        $ex_id = $request->post('ex_id');
        $email = $request->post('email');
        $y_year = \Yii::$app->db->createCommand("select ex_id from jx_experience where ex_experience='$ex_id'")->queryOne();
        $e_name = \Yii::$app->db->createCommand("select e_id from jx_edu where e_name='$e_id'")->queryOne();
        $y_year = implode('', $y_year);
        $e_name = implode('', $e_name);
        $db=\Yii::$app->db->createCommand();
        //添加姓名
        \Yii::$app->db->createCommand("update jx_user set u_name='$u_name'")->execute();
        //添加个人信息
        $res = $db->insert('jx_person',['u_id'=>"$u_id",'e_id'=>"$e_name",'ex_id'=>"$y_year",'email'=>"$email"])->execute();
        if($res){
            echo "<script>location.href='?r=resume/resume'</script>";
        }

    }

    //头像上传
    public function actionUpload(){
        $u_id = Yii::$app->session['u_id'];
        $pe_id = \Yii::$app->db->createCommand("select pe_id from jx_person where u_id='$u_id'")->queryOne();
        $pe_id = implode('',$pe_id);
        $uploads_dir = './resume';
        $tmp_name = $_FILES["headPic"]["tmp_name"];
        $name = rand(12222,99999).$_FILES["headPic"]["name"];
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
        $new_name = $uploads_dir.'/'.$name;
        $res = \Yii::$app->db->createCommand("update jx_person set pe_img ='$new_name' where pe_id='$pe_id' ")->execute();
        if($res){
            $arr = array();
            $arr['success']=1;
            $arr['content']=$new_name;
            return json_encode($arr);
        }


    }


    //我收藏的职位
    public function actionCollect()
    {
        $u_id = Yii::$app->session['u_id'];
        $connection = \Yii::$app->db;
        //头像查询
        $portrait= $connection->createCommand("select pe_img from jx_person where u_id='$u_id'")->queryOne();
        $portrait = implode('',$portrait);
        $result['portrait'] = $portrait;
        //收藏的职位
        $result['rows'] = (new \yii\db\Query())
            ->select([
                '(jx_position.p_name)',
                '(jx_salary.sa_salary)',
                '(jx_user.u_name)',
                '(jx_company.c_logo)',
                '(jx_city.city_name)',
                '(jx_experience.ex_experience)',
                '(jx_edu.e_name)',
                '(jx_position.p_content)',
                '(jx_position.p_time)',
            ])
            ->from('jx_position')
            ->innerJoin('jx_po_per','jx_position.p_id = jx_po_per.p_id')
            ->innerJoin('jx_person','jx_person.pe_id = jx_po_per.pe_id')
            ->innerJoin('jx_salary','jx_position.salary_id = jx_salary.sa_id')
            ->innerJoin('jx_company','jx_position.c_id = jx_company.c_id')
            ->innerJoin('jx_user','jx_company.u_id = jx_user.u_id')
            ->innerJoin('jx_city','jx_position.city_id = jx_city.city_id')
            ->innerJoin('jx_experience','jx_position.experience_id = jx_experience.ex_id')
            ->innerJoin('jx_edu','jx_position.e_id = jx_edu.e_id')
            ->where(['jx_person.u_id'=>$u_id])
            ->all();
        foreach($result['rows'] as $k=>$v){
            $result['rows'][$k]['p_time'] = date('Y-m-d H:i:s',$v['p_time']);
        }
        return $this->render('collections',$result);
    }

    //我投递的职位
    public function actionDelivery()
    {
        $u_id = Yii::$app->session['u_id'];
        $pe_id = \Yii::$app->db->createCommand("select pe_id from jx_person where u_id='$u_id'")->queryOne();
        $pe_id = implode('',$pe_id);
        $result['rows'] = (new \yii\db\Query())
            ->select([
            '(jx_po_pe.p_id)',
            '(jx_po_pe.td_stasus)',
            '(jx_po_pe.td_time)',
            '(jx_po_pe.type)',
            '(jx_user.u_name)',
            '(jx_position.p_name)',
            '(jx_city.city_name)',
            '(jx_salary.sa_salary)',
            '(jx_experience.ex_experience)'
            ])
            ->from('jx_po_pe')
            ->innerJoin('jx_position','jx_position.p_id = jx_po_pe.p_id')
            ->innerJoin('jx_company','jx_company.c_id = jx_position.c_id')
            ->leftJoin('jx_user','jx_user.u_id = jx_company.u_id')
            ->leftJoin('jx_city','jx_city.city_id = jx_position.city_id')
            ->leftJoin('jx_salary','jx_salary.sa_id = jx_position.salary_id')
            ->leftJoin('jx_experience','jx_experience.ex_id = jx_position.experience_id')
            ->where(['jx_po_pe.pe_id'=>$pe_id])
            ->all();
        foreach($result['rows'] as $k=>$v){
            $result['rows'][$k]['td_time'] = date('Y-m-d H:i:s',$v['td_time']);
        }

        return $this->render('delivery',$result);
    }

    //搜索简历
    public function actionSearch(){
        $this->layout = false;
        $request=Yii::$app->request;
        $u_id = Yii::$app->session['u_id'];
        $pe_id = \Yii::$app->db->createCommand("select pe_id from jx_person where u_id='$u_id'")->queryOne();
        $pe_id = implode('',$pe_id);
       // print_r($pe_id);
        $type = $request->post('type');
        $rows = (new \yii\db\Query())
            ->select([
                '(jx_po_pe.p_id)',
                '(jx_po_pe.td_stasus)',
                '(jx_po_pe.td_time)',
                '(jx_po_pe.type)',
                '(jx_user.u_name)',
                '(jx_position.p_name)',
                '(jx_city.city_name)',
                '(jx_salary.sa_salary)',
                '(jx_experience.ex_experience)'
            ])
            ->from('jx_po_pe')
            ->innerJoin('jx_position','jx_position.p_id = jx_po_pe.p_id')
            ->innerJoin('jx_company','jx_company.c_id = jx_position.c_id')
            ->leftJoin('jx_user','jx_user.u_id = jx_company.u_id')
            ->leftJoin('jx_city','jx_city.city_id = jx_position.city_id')
            ->leftJoin('jx_salary','jx_salary.sa_id = jx_position.salary_id')
            ->leftJoin('jx_experience','jx_experience.ex_id = jx_position.experience_id')
            ->where(['jx_po_pe.pe_id'=>$pe_id]);
            if($type != 5){
                $rows->andWhere(['jx_po_pe.td_stasus'=>$type]);
            }
            $arr = $rows->all();
       return $this->render('ajaxdly',['arr'=>$arr]);
    }
}