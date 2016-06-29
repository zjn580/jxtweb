<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('')}}css/common.css"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('')}}css/main.css"/>
    <style>
        ul { list-style:none;}
        #pagelist {width:600px; margin:30px auto; padding:6px 0px; height:20px;}
        #pagelist ul li { float:left; border:1px solid #5d9cdf; height:20px; line-height:20px; margin:0px 2px;}
        #pagelist ul li a, .pageinfo { display:block; padding:0px 6px; background:#e6f2fe;}
        .pageinfo  { color:#555;}
        .current { background:#a9d2ff; display:block; padding:0px 6px; font-weight:bold;}
        #fullbg {
        background-color:gray;
        left:0;
        opacity:0.5;
        position:absolute;
        top:0;
        z-index:3;
        filter:alpha(opacity=50);
        -moz-opacity:0.5;
        -khtml-opacity:0.5;
        }
        #dialog {
        background-color:#fff;
        border:5px solid rgba(0,0,0, 0.4);
        height:150px;
        left:60%;
        margin:-200px 0 0 -200px;
        padding:1px;
        position:fixed !important; /* 浮动对话框 */
        position:absolute;
        top:60%;
        width:150px;
        z-index:5;
        border-radius:5px;
        display:none;
        }
        #dialog p {
        margin:0 0 12px;
        height:24px;
        line-height:24px;
        background:#CCCCCC;
        }
        #dialog p.close {
        text-align:right;
        padding-right:10px;
        }
        #dialog p.close a {
        color:#fff;
        text-decoration:none;
        } 
    </style>
    <script type="text/javascript" src="{{URL::asset('')}}js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="{{URL::asset('')}}js/lsbz.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="index.html">首页</a></li>
                <li><a href="#" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                @if(!empty(session('username')))
                    <li><a href="javascript:;">{{session('username')}} </a></li>
                    <li><a href="{{URL('quit')}}">退出</a></li>             
                @endif
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>企业</a>
                    <ul class="sub-menu">
                        <li><a href="{{URL('advertises')}}"><i class="icon-font">&#xe008;</i>招聘信息</a></li>
                        <li><a href="{{URL('corporate')}}"><i class="icon-font">&#xe006;</i>企业信息</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>学校</a>
                    <ul class="sub-menu">
                        <li><a href="{{URL('school')}}"><i class="icon-font">&#xe006;</i>学校信息</a></li>
                        <li><a href="{{URL('professionals')}}"><i class="icon-font">&#xe006;</i>专业信息</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>个人管理</a><ul class="sub-menu">
                        <li><a href="{{URL('one')}}"><i class="icon-font">&#xe006;</i>个人信息</a></li>
                        <li><a href="{{URL('position')}}"><i class="icon-font">&#xe012;</i>职位推荐</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                    <ul class="sub-menu">
                        <li><a href="{{URL('Administrator')}}"><i class="icon-font">&#xe045;</i>管理员列表</a></li>
                        <li><a href="{{URL('jurisdiction')}}"><i class="icon-font">&#xe045;</i>权限列表</a></li>
                    </ul>
                </li>
            </ul>       
        </div>
    </div>
    <!--/sidebar-->