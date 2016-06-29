<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::any('/', 'LoginController@index');



Route::any('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::any('users', function()
{
    return 'Users!';
});

/*登录*/
Route::any('login','LoginController@login');

/*登录操作*/
Route::any('dologin','LoginController@dologin');

/*退出登录*/
Route::any('quit','LoginController@quit');

/*企业*/

/*招聘信息*/
Route::any('advertises','CompanyController@advertises');

/*新增信息*/
Route::any('add','CompanyController@add');

/*企业信息*/
Route::any('corporate','CompanyController@corporate');
//更新企业
Route::any('updcompany','CompanyController@updcompany');
//审核企业
Route::any('auditcompany','CompanyController@auditcompany');



/*添加企业信息*/
Route::any('insert','CompanyController@insert');

/*学校*/

/*学校信息*/
Route::any('school','SchoolController@school');

/*添加学校信息*/
Route::any('schadd','SchoolController@tian');

/*专业信息*/
Route::any('professionals','SchoolController@professionals');

/*添加专业信息*/
Route::any('flavoured','SchoolController@flavoured');

/*个人*/

/*个人信息*/
Route::any('one','OneController@one');

/*添加个人信息*/
Route::any('tianjia','OneController@tianjia');

/*系统设置*/

/*管理员列表*/
Route::any('admin','SystemController@admin');

/*添加管理员*/
Route::any('admin','SystemController@admin');

/*权限列表*/
Route::any('jurisdiction','SystemController@jurisdiction');

/*添加权限*/
Route::any('jurisdictionadd','SystemController@jurisdictionadd');


/**/


































