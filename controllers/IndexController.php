<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Industry;
header('content-type:text/html;charset=utf8');

class IndexController extends Controller
{
	public $layout = 'common';
	//主页
    public function actionIndex()
    {   
        $Industry = new Industry;
        $newarr = $Industry->showIndustry();
        $query = (new \yii\db\Query())
        ->select('*')
        ->from('jx_position')
        ->leftJoin('jx_salary','jx_salary.sa_id = jx_position.salary_id')
        ->leftJoin('jx_experience', 'jx_experience.ex_id = jx_position.experience_id')
        ->leftJoin('jx_city', 'jx_city.city_id = jx_position.city_id')
        ->leftJoin('jx_edu', 'jx_edu.e_id = jx_position.e_id')
        ->leftJoin('jx_company', 'jx_company.c_id = jx_position.c_id')
        ->where(['is_up'=>0])
        ->limit('10')
        ->all();

        $query1 = (new \yii\db\Query())
        ->select('*')
        ->from('jx_position')
        ->leftJoin('jx_salary','jx_salary.sa_id = jx_position.salary_id')
        ->leftJoin('jx_experience', 'jx_experience.ex_id = jx_position.experience_id')
        ->leftJoin('jx_city', 'jx_city.city_id = jx_position.city_id')
        ->leftJoin('jx_edu', 'jx_edu.e_id = jx_position.e_id')
        ->leftJoin('jx_company', 'jx_company.c_id = jx_position.c_id')
        ->where(['is_up'=>0])
        ->orderby('p_time desc')
        ->limit('10')
        ->all();
    	return $this->render('index',['arr'=>$query,'arr1'=>$query1,'newarr'=>$newarr]);
    }

    //更多职位
    public function actionIndexlist(){
        $query = (new \yii\db\Query())
        ->select('*')
        ->from('jx_position')
        ->leftJoin('jx_salary','jx_salary.sa_id = jx_position.salary_id')
        ->leftJoin('jx_experience', 'jx_experience.ex_id = jx_position.experience_id')
        ->leftJoin('jx_city', 'jx_city.city_id = jx_position.city_id')
        ->leftJoin('jx_edu', 'jx_edu.e_id = jx_position.e_id')
        ->leftJoin('jx_company', 'jx_company.c_id = jx_position.c_id')
        ->where(['is_up'=>0])
        ->all();

        return $this->render('indexlist',['arr'=>$query]);
    }

    //账号设置
    public function actionAccount()
    {
    	return $this->render('accountBind');
    }

    //联系我们
    public function actionAbout()
    {
        return $this->render('about');
    }

    //主页前端开发搜索结果
    public function actionSearch()
    {
        return $this->render('list');
    }

}