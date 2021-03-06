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
    public function advertises($id=1)
    {	
		$num = DB::table('jx_position')
		->leftjoin('jx_company','jx_company.c_id','=','jx_position.c_id')
		->leftjoin('jx_user','jx_user.u_id','=','jx_company.u_id')
		->select('jx_position.p_id','jx_position.p_name','jx_position.p_status','jx_position.p_names','jx_position.p_time','jx_position.p_uptime','jx_user.u_name')
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
	      $list = DB::table('jx_position')
	      ->leftjoin('jx_company','jx_company.c_id','=','jx_position.c_id')
		  ->leftjoin('jx_user','jx_user.u_id','=','jx_company.u_id')
		  ->select('jx_position.p_id','jx_position.p_name','jx_position.p_status','jx_position.p_names','jx_position.p_time','jx_position.p_uptime','jx_user.u_name')
	      ->orderBy('jx_position.p_id', 'desc')
	      ->skip($offset)->take($length)
	      ->get();
          return view("Company/company",['arr' => $list,'up'=>$up,'next'=>$next,'page'=>$p,'pages'=>$pages]);
    }


    //删除职位
    public function delads(){
    	$c_id = Input::get('did');
    	$ids = explode(',',$c_id);
    	$lastid = Input::get('lastid');
    	$length = Input::get('length')?Input::get('length'):1;
    	$re = DB::table('jx_position')->whereIn('p_id',$ids)->delete();
    	if($re){
    		 $arr = DB::table('jx_position')
	         ->leftjoin('jx_company','jx_company.c_id','=','jx_position.c_id')
		     ->leftjoin('jx_user','jx_user.u_id','=','jx_company.u_id')
		     ->select('jx_position.p_id as c_id','jx_position.p_name as u_name','jx_position.p_status as c_status','jx_position.p_names as c_linkman','jx_position.p_time as u_time','jx_position.p_uptime as c_uptime','jx_user.u_name as n_name')
	         ->where('jx_position.p_id','<',$lastid)
	         ->orderBy('jx_position.p_id', 'desc')
	         ->skip(0)->take($length)
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

    //更新职位
    public function updads(){
    	$c_id = Input::get('u_ids');
    	$ids = explode(',',$c_id);
    	$time = time();
    	$re = DB::table('jx_position')
	            ->whereIn('p_id', $ids)
	            ->update(['p_uptime' => $time]);
    	if($re){
    		echo json_encode(['success'=>1,'time'=>date('Y-m-d H:i:s',$time)]);
    	}else{
    		echo json_encode(['success'=>0,'error'=>'更新失败']);
    	}
    }


    //审核职位
    public function auditads(){
    	$c_id = Input::get('c_id');
    	$audit = Input::get('audit');
    	$re = DB::table('jx_position')
	            ->where('p_id','=',$c_id)
	            ->update(['p_status' => $audit]);
	    if($re){
	    	echo json_encode(['success'=>1,'msg'=>'成功审核']);
	    }else{
	    	echo json_encode(['success'=>0,'error'=>'审核失败']);
	    }
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

    //更新企业
    public function updcompany(){
    	$c_id = Input::get('u_ids');
    	$ids = explode(',',$c_id);
    	$time = time();
    	$re = DB::table('jx_company')
	            ->whereIn('c_id', $ids)
	            ->update(['c_uptime' => $time]);
    	if($re){
    		echo json_encode(['success'=>1,'time'=>date('Y-m-d H:i:s',$time)]);
    	}else{
    		echo json_encode(['success'=>0,'error'=>'更新失败']);
    	}
    }


    //审核企业
    public function auditcompany(){
    	$c_id = Input::get('c_id');
    	$audit = Input::get('audit');
    	$re = DB::table('jx_company')
	            ->where('c_id','=',$c_id)
	            ->update(['c_status' => $audit]);
	    if($re){
	    	echo json_encode(['success'=>1,'msg'=>'成功审核']);
	    }else{
	    	echo json_encode(['success'=>0,'error'=>'审核失败']);
	    }
    }
    /*添加企业信息*/
    public function insert()
    {

        return view("Company/coradd");
    }


}
