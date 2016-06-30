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
Route::any('advertises/{id}','CompanyController@advertises');


//删除职位
Route::any('delads','CompanyController@delads');
//更新职位
Route::any('updads','CompanyController@updads');
//审核企业
Route::any('auditads','CompanyController@auditads');
/*新增信息*/
Route::any('add','CompanyController@add');




/*企业信息*/
Route::any('corporate','CompanyController@corporate');
Route::any('corporate/{id}','CompanyController@corporate');




//删除企业
Route::any('delcompany','CompanyController@delcompany');
//更新企业
Route::any('updcompany','CompanyController@updcompany');
//审核企业
Route::any('auditcompany','CompanyController@auditcompany');

/*添加企业信息*/
Route::any('insert','CompanyController@insert');







/*学校*/

/*学校信息*/
Route::any('school','SchoolController@school');

//删除学校
Route::any('delschool','SchoolController@delschool');
//更新学校
Route::any('updschool','SchoolController@updschool');
//审核学校
Route::any('auditschool','SchoolController@auditschool');


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

/*删除*/
Route::any('delperson','OneController@delperson');

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


































