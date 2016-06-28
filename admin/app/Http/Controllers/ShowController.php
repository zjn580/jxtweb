<?php

namespace App\Http\Controllers;
use DB;
use Request;
use Session;
use Cookie;
use Response;
use Paginate;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;


class ShowController extends Controller {

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

    /*首页显示*/
    public function index()
    {
        return view('Login/index');
    }

    /*企业*/
    public function company()
    {
        return view('company/company');
    }

    /*学校*/
    public function school()
    {
        return view('school/school');
    }

    /*个人*/
    public function one()
    {
        return view('one/one');
    }

    /*系统管理*/
    public function system()
    {
        return view('system/system');
    }
}
