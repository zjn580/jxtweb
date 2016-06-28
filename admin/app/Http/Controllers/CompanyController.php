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
    public function corporate()
    {
        return view("Company/corporate");
    }

    /*添加企业信息*/
    public function insert()
    {
        return view("Company/coradd");
    }


}
