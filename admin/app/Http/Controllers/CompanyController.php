<?php

namespace App\Http\Controllers;

use DB;
use Request;
use Session;
use Cookie;
use Input;
use Response;
use Paginate;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

class CompanyController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */

    /*招聘信息*/
    public function advertises()
    {	
        return view('Company/company');
    }

    /*新增信息*/
    public function add()
    {
        return view("Company/insert");
    }

    /*企业信息*/
    public function corporate($id=1)
    {

      	$num = DB::table('jx_company')
    	->leftJoin('jx_user', 'jx_user.u_id', '=', 'jx_company.u_id')
    	->leftJoin('jx_nature','jx_nature.n_id','=','jx_company.n_id')
		->select('jx_company.c_id','jx_company.n_id','jx_company.c_linkman','jx_company.c_license','jx_company.c_status','jx_company.c_uptime','jx_nature.n_name','jx_user.u_name','jx_user.u_time')
        ->count();

	  	  //每页显示条数
	      $length=5;
	      //总页数
	      $pages=ceil($num/$length);
	      //当前页
	      $p=$id;
	      //上一页
	      $up=$p-1<=1?1:$p-1;
	      //下一页
	      $next=$p+1>=$pages?$pages:$p+1;
	      //偏移量
	      $offset=($p-1)*$length;
	      $list = DB::table('jx_company')
	    	->leftJoin('jx_user', 'jx_user.u_id', '=', 'jx_company.u_id')
	    	->leftJoin('jx_nature','jx_nature.n_id','=','jx_company.n_id')
			->select('jx_company.c_id','jx_company.n_id','jx_company.c_linkman','jx_company.c_license','jx_company.c_status','jx_company.c_uptime','jx_nature.n_name','jx_user.u_name','jx_user.u_time')
			->orderBy('jx_company.c_id', 'desc')
	        ->skip($offset)->take($length)
	        ->get();
         return view("Company/corporate",['arr' => $list,'up'=>$up,'next'=>$next,'page'=>$p,'pages'=>$pages]);
    }

    //删除企业
    public function delcompany(){
    	$c_id = Input::get('did');
    	$ids = explode(',',$c_id);
    	$lastid = Input::get('lastid');
    	$length = Input::get('length')?Input::get('length'):1;
    	$re = DB::table('jx_company')->whereIn('c_id',$ids)->delete();
    	if($re){
    		$arr = DB::table('jx_company')
	    	->leftJoin('jx_user', 'jx_user.u_id', '=', 'jx_company.u_id')
	    	->leftJoin('jx_nature','jx_nature.n_id','=','jx_company.n_id')
			->select('jx_company.c_id','jx_company.n_id','jx_company.c_linkman','jx_company.c_license','jx_company.c_status','jx_company.c_uptime','jx_nature.n_name','jx_user.u_name','jx_user.u_time')
			->where('jx_company.c_id','<',$lastid)
			->skip(0)->take($length)
			->orderBy('jx_company.c_id', 'desc')
	        ->get();
	        foreach ($arr as $key => $value) {
	        	$arr[$key]['c_uptime'] = date('Y-m-d H:i:s',$value['c_uptime']);
	        	$arr[$key]['u_time'] = date('Y-m-d H:i:s',$value['u_time']);
	        }
           if(!empty($arr)){

           		echo json_encode(['success'=>1,'msg'=>$arr]);
           }else{
           		echo json_encode(['success'=>2,'msg'=>'数据不足']);
           }
    	}else{
    		echo json_encode(['success'=>0,'error'=>'删除失败']);
    	}
    }


    /*添加企业信息*/
    public function insert()
    {

        return view("Company/coradd");
    }


}
