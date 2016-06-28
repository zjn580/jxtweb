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
    public function school()
    {
        return view('School/school');
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
