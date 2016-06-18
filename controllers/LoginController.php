<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use Session;
use Cookie;


class LoginController extends Controller
{
	public $layout = false;
    public $enableCsrfValidation=false;
	//登录
    public function actionLogin()
    {
    	return $this->render('index');
    }
    /*
     * 登陆判断页面
     * 记住密码
     * 七天免登陆
     * 密码输入三次，锁定用户
     */

    public function actionDeng()
    {
        //设置session
        $session = Yii::$app->session;
        $session->open();

        $email=$_POST['email'];
        $pwd=$_POST['password'];
        $time=$_POST['autoLogin'];
        $pwds=urlencode($pwd);
        $connection= \Yii::$app->db;
        $command =$connection->createCommand("select * from jx_user where u_account='$email'");
    }

        //修改密码
    public function actionUpdate()
    {	
    	return $this->render('updatePwd');
    }
    //找回密码
    public function actionRetrieve()
    {	
    	return $this->render('reset');
    }

    //注册
     public function actionRegister()
    {
        return $this->render('register');
    }
    public function actionZhu()
    {
        $connection = \Yii::$app->db;
        $email = $_POST['email'];
        $pwd = $_POST['password'];
        $type = $_POST['type'];
        $time = date('Y-m-d:H:i:s', time());
        //print_r($time);die;
        $pwds = md5(md5($pwd));
        //判断唯一性
        $sql = $connection->createCommand("select * from jx_user where u_account='$email'");
        $er = $sql->queryAll();
        if ($er) {
            echo "<script>alert('该账号已注册，请重新输入或登录');location.href='?r=login/register'</script>";
        } else {
            //添加语句
            $flag = $connection->createCommand()->insert('jx_user', [
                'u_account' => $email,
                'u_password' => $pwds,
                'u_status' => $type,
                'u_time' => $time,
            ])->execute();
            if ($flag) {
                //设置session
                $session = Yii::$app->session;
                $session->open();
                $session['u_status'] = "$type";
                $status = $session['u_status'];
                //判断身份
                if ($type == 0) {
                    echo "<script>location.href='?r=company/info01'</script>";
                } else if ($type == 1) {
                    echo "<script>location.href='?r=school/school'</script>";
                } else if ($type == 2) {
                    echo "<script>location.href='?r=resume/person1'</script>";
                }
            } else {
                echo "<script>alert('注册失败，请重新注册');location.href='?r=register/register'</script>";
            }
        }

    }
}