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
use app\models\City;
use app\models\Nature;
use app\models\Company;


header('content-type:text/html;charset=utf8');
class CompanyController extends Controller
{
    public $layout = 'common';
    public $enableCsrfValidation=false;
    //培训机构
    public function actionCompany()
    {   
        $industry = Industry::findBySql('select * from jx_industry WHERE pid=0')->asArray()->all();
        $natures = Nature::find()->asArray()->all();
        $connection = \Yii::$app->db;
        $command = $connection->createCommand('SELECT * FROM jx_company INNER JOIN jx_user ON jx_company.u_id=jx_user.u_id INNER JOIN jx_nature ON jx_company.n_id=jx_nature.n_id INNER JOIN jx_scale ON jx_company.scale_id=jx_scale.scale_id INNER JOIN jx_city ON jx_company.city_id=jx_city.city_id');
        $posts = $command->queryAll();
//        print_r($posts);die;
        return $this->render('index',['industry'=>$industry,'natures'=>$natures,'companys'=>$posts]);
    
    }
    
    //我的机构主页
    public function actionMyhome()
    {   
        //从session中获取公司id
        $session = \YII::$app->session;
        $session->open();
        $c_id = $session->get('company');
        //echo $c_id;die;
        
        //根据id查询出公司的详细信息
        $connection = \Yii::$app->db;
        $command = $connection->createCommand("SELECT * FROM jx_company INNER JOIN jx_user ON jx_company.u_id=jx_user.u_id INNER JOIN jx_nature ON jx_company.n_id=jx_nature.n_id INNER JOIN jx_scale ON jx_company.scale_id=jx_scale.scale_id INNER JOIN jx_city ON jx_company.city_id=jx_city.city_id  WHERE c_id='$c_id'");
        $posts = $command->queryOne();
        //print_r($posts);die;
        return $this->render('myhome',['company'=>$posts]);
    }

    //公司详情页
    public function actionDetail(){
        //接值
        $c_id = $_GET['id'];
        //echo $c_id;die;

        //根据id查询出公司的详细信息
        $connection = \Yii::$app->db;
        $command = $connection->createCommand("SELECT * FROM jx_company INNER JOIN jx_user ON jx_company.u_id=jx_user.u_id INNER JOIN jx_nature ON jx_company.n_id=jx_nature.n_id INNER JOIN jx_scale ON jx_company.scale_id=jx_scale.scale_id INNER JOIN jx_city ON jx_company.city_id=jx_city.city_id  WHERE c_id='$c_id'");
        $posts = $command->queryOne();
        return $this->render('detail',['company'=>$posts]);
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

        //城市
        $city = City::find()->asArray()->all();

        return $this->render('index01',['ids'=>$ids,'scales'=>$scale,'natures'=>$nature,'citys'=>$city]);
    }
    
    //信息添加
    public function actionDo_basic_insert(){

        //$user = new User();
        $session = \YII::$app->session;
        $session->open();
        $companyId = $session->get('u_id');
        //echo $c_id['c_id'];die;
        $user = User::findOne($companyId);
        $user->u_name = !empty($_POST['name'])?$_POST['name']:'';
        
        //print_r($user);die;
        $useradd = $user->save();
        //echo $user->u_name;die;
        
        $model = new Company();

        $model->u_id = $companyId;
        $model->n_id = !empty($_POST['s_radio_hidden'])?$_POST['s_radio_hidden']:'';
        $model->l_id = !empty($_POST['select_industry_hidden'])?$_POST['select_industry_hidden']:'';
        $model->scale_id = !empty($_POST['select_scale_hidden'])?$_POST['select_scale_hidden']:'';
        $model->city_id = !empty($_POST['city'])?$_POST['city']:'1';
        //$model->s_intro = !empty($_POST['temptation'])?$_POST['temptation']:'';
        $model->c_website = !empty($_POST['website'])?$_POST['website']:'';
        $companyadd = $model->save();


        
        $u_id = $companyId;

        //将数据存入session
        $connection = \Yii::$app->db;
        $command = $connection->createCommand('SELECT c_id FROM jx_company WHERE u_id='.$u_id);
        $post = $command->queryOne();
        //print_r($post);die;
        $c_id = $post['c_id'];
        $session = \YII::$app->session;
        $session->open();
        $session->set('company',"$c_id");
        //echo $session->get('company');die;

        if($companyadd&&$useradd){
            $this->redirect('?r=company/info02');
        }else{
            echo 'fail';
            $this->redirect('?r=company/info01');
        }


    }

    //机构信息标签  2
     public function actionInfo02()
    {   
        return $this->render('tag');
    }

    //机构标签添加
    public function actionDo_tags_insert(){

        if(empty($_POST['labels'])){
            echo '';die;
        }
        //公司id
        $session = \YII::$app->session;
        $session->open();
        $companyId = $session->get('u_id');



        $c_id = Company::findBySql("select c_id from jx_company WHERE u_id=".$companyId)->asArray()->one();
        //echo $c_id['c_id'];die;
        $model = Company::findOne($c_id['c_id']);
        //echo $model;die;

        
        $model->c_tags = !empty($_POST['labels'])?$_POST['labels']:'';
        //var_dump($model->save());
        if($model->save()){
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    //机构信息创始团队 3
     public function actionInfo03()
    {   
        return $this->render('founder');
    }

    //添加公司领导的
    public function actionInsert_founder(){

        //print_r($_POST);die;
        if(empty($_POST['leaderInfos'][0])){

            echo "<script> alert('请正确填写数据') ,window.location.href='?r=company/info03';</script>";die;
        }

        //公司id
        $session = \YII::$app->session;
        $session->open();
        $companyId = $session->get('u_id');

        $c_id = Company::findBySql("select c_id from jx_company WHERE u_id=".$companyId)->asArray()->one();

        $model = Company::findOne($c_id['c_id']);


        $model->c_linkman = !empty($_POST['leaderInfos'][0])?$_POST['leaderInfos'][0]:'';
        $model->c_phone = !empty($_POST['leaderInfos'][2])?$_POST['leaderInfos'][2]:'';

        if($model->save()){
        //echo 'success';die;
            $this->redirect('?r=company/info05');
        }else{
        //echo  'fail';die;
            echo "<script> alert('保存失败,请重新填写数据'),window.location.href='?r=company/info03';</script>";
        //$this->redirect('?r=school/info03');
        }

    }

//     //公司产品
//      public function actionInfo04()
//     {   
//         return $this->render('index02');
//     }

//     //公司产品添加
//     public function actionInsert_major(){

// //        print_r($_POST);die;

//         if(empty($_POST['productInfos'][0])){

//             echo "<script> alert('请正确填写数据') ,window.location.href='?r=company/info04';</script>";die;
//         }
//         //接值
//         $companyId = !empty($_POST['companyId'])?$_POST['companyId']:'';

//         $s_id = Company::findBySql("select c_id from jx_company WHERE c_id=".$companyId)->asArray()->one();

//         $model = new  Major;
//         $model->m_name = !empty($_POST['productInfos'][0])?$_POST['productInfos'][0]:'';
//         $model->m_nums = !empty($_POST['productInfos'][1])?$_POST['productInfos'][1]:'';
//         $model->m_intro = !empty($_POST['productInfos'][2])?$_POST['productInfos'][2]:'';
//         $majors = $model->save();

//         if($majors){
// //            echo 'success';die;
//             $this->redirect('?r=company/info04');
//         }else{
// //            echo  'fail';die;
//             echo "<script> alert('保存失败,请重新填写数据'),window.location.href='?r=company/info04';</script>";
//         }
//     }

    //公司介绍 5
     public function actionInfo05()
    {   
        return $this->render('index03');
    }

     //公司介绍添加
    public function actionInsertintro()
    {

        if(empty($_POST['companyProfile'])){

            echo "<script> alert('请正确填写数据') ,window.location.href='?r=company/info05';</script>";die;
        }

        //公司id
        $session = \YII::$app->session;
        $session->open();
        $companyId = $session->get('u_id');


        $c_id = Company::findBySql("select c_id from jx_company WHERE u_id=".$companyId)->asArray()->one();

        $model = Company::findOne($c_id['c_id']);

        $model->c_intro = !empty($_POST['companyProfile'])?$_POST['companyProfile']:'';
        //echo $model->c_intro;die;
        $re = $model->save();
        if($re){
//            echo 'success';die;
            $this->redirect('?r=company/myhome');
        }else{
//            echo  'fail';die;
            echo "<script> alert('保存失败,请重新填写数据'),window.location.href='?r=company/info05';</script>";
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