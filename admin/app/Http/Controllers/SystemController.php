<?php

namespace App\Http\Controllers;

class SystemController extends Controller {

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
    /*管理员列表*/
    public function admin()
    {
        return view('System/admin');
    }

    /*添加管理员*/
    public function adminadd()
    {
        return view('System/adminadd');
    }

    /*权限列表*/
    public function jurisdiction()
    {
        return view('System/jurisdiction');
    }

    /*添加权限*/
    public function jurisdictionadd()
    {
        return view('System/jurisdictionadd');
    }



}
