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

class SchoolController extends Controller {

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

    /*学校信息*/
    public function school($id = 1)
    {   
        $num = DB::table('jx_school')->count();
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
        $list = DB::table('jx_school')
        ->leftJoin('jx_user', 'jx_user.u_id', '=', 'jx_school.u_id')
        ->leftJoin('jx_nature','jx_nature.n_id','=','jx_school.n_id')
        ->select('s_id','s_status','s_linkman','s_uptime','jx_user.u_time','jx_user.u_name','jx_nature.n_name')
        ->orderBy('jx_school.s_id', 'desc')
        ->skip($offset)->take($length)
        ->get();

       return view('School/school',['arr' => $list,'up'=>$up,'next'=>$next,'page'=>$p,'pages'=>$pages]);
    }

    //删除学校
    public function delschool(){
        $c_id = Input::get('did');
        $ids = explode(',',$c_id);
        $lastid = Input::get('lastid');
        $length = Input::get('length')?Input::get('length'):1;
        $re = DB::table('jx_school')->whereIn('s_id',$ids)->delete();
        if($re){
            $arr = DB::table('jx_school')
            ->leftJoin('jx_user', 'jx_user.u_id', '=', 'jx_school.u_id')
            ->leftJoin('jx_nature','jx_nature.n_id','=','jx_school.n_id')
            ->select('s_id as c_id ','s_status as c_status','s_linkman as c_linkman','s_uptime as c_uptime','jx_user.u_time','jx_user.u_name','jx_nature.n_name')
            ->where('jx_school.s_id','<',$lastid)
            ->orderBy('jx_school.s_id', 'desc')
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

    //更新企业
    public function updschool(){
        $c_id = Input::get('u_ids');
        $ids = explode(',',$c_id);
        $time = time();
        $re = DB::table('jx_school')
                ->whereIn('s_id', $ids)
                ->update(['s_uptime' => $time]);
        if($re){
            echo json_encode(['success'=>1,'time'=>date('Y-m-d H:i:s',$time)]);
        }else{
            echo json_encode(['success'=>0,'error'=>'更新失败']);
        }
    }


    //审核企业
    public function auditschool(){
        $c_id = Input::get('c_id');
        $audit = Input::get('audit');
        $re = DB::table('jx_school')
                ->where('s_id','=',$c_id)
                ->update(['s_status' => $audit]);
        if($re){
            echo json_encode(['success'=>1,'msg'=>'成功审核']);
        }else{
            echo json_encode(['success'=>0,'error'=>'审核失败']);
        }
    }




    /*新增学校信息*/
    public function tian()
    {
        return view("School/insert");
    }

    /*专业信息*/
    public function professionals()
    {
        return view("School/professionals");
    }

    /*添加专业信息*/
    public function flavoured()
    {
        return view("School/flavoured");
    }


}
