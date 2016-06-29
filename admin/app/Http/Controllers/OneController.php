<?php

namespace App\Http\Controllers;
use DB;

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

    /*个人信息*/
    public function one()
    {
        $data = DB::table('jx_person')
            ->join('jx_user', 'jx_person.u_id', '=', 'jx_user.u_id')
            ->select('jx_person.pe_id', 'jx_person.pe_status', 'jx_user.u_name','jx_person.pe_phone','jx_person.pe_img','jx_person.email')
            ->where('u_status','2')
            ->get();
            print_r($data);
            return view('One/one');
    }

    /*添加个人信息*/
    public function tianjia()
    {
        return view("One/oneadd");
    }

}
