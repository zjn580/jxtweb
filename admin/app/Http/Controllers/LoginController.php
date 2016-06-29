<?php

namespace App\Http\Controllers;
use Request;
use DB;
use Session;
class LoginController extends Controller {


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

    /*登录*/
    public function login()
    {
        return view('login/login');
    }
    public function dologin(request $request)
    {
        $username = request::input('username');
        $pwd = request::input('pwd');
        $pwds=md5(md5($pwd));
        //echo $pwds;die;
        $results = DB::table('jx_admin')->where('username', "'".$username."'")->orWhere('pwd', $pwds)->get();
        if(!empty($results))
        {   
            session(['username' => $username]);
            return redirect('/');
        }
        else
        {
            return redirect('login');
        }
    }

    /*退出登录*/
    public function quit()
    {
        //var_dump(Session::flush());die;
        Session::forget('username');
        if(empty(session('username'))){
            return view("login/login");
        }
    }

    /**
     * 首页 
     */

    public function index(){
        return view("login/index");
    }
}
