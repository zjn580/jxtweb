<?php

namespace App\Http\Controllers;
use DB;
use Request;
use Session;
use Cookie;
use Input;
use Response;
use Paginate;

class OneController extends Controller {

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

    /**
     * 个人信息
     * @param  integer $id [当前页数]
     * @return [type]      [description]
     */
    public function one($id=1)
    {
        $num = DB::table('jx_person')
            ->join('jx_user', 'jx_person.u_id', '=', 'jx_user.u_id')
            ->select('jx_person.pe_id', 'jx_person.pe_status', 'jx_user.u_name','jx_person.pe_phone','jx_person.pe_img','jx_person.email')
            ->where('u_status','2')
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

        $list = DB::table('jx_person')
            ->join('jx_user', 'jx_person.u_id', '=', 'jx_user.u_id')
            ->select('jx_person.pe_id', 'jx_person.pe_status', 'jx_user.u_name','jx_person.pe_phone','jx_person.pe_img','jx_person.email')
            ->where('u_status','2')
            ->orderBy('pe_id', 'desc')
            ->skip($offset)->take($length)
            ->get();
        return view("One/one",['person' => $list,'up'=>$up,'next'=>$next,'page'=>$p,'pages'=>$pages]);
    }

    /*添加个人信息*/
    public function tianjia()
    {
        return view("One/oneadd");
    }

}
