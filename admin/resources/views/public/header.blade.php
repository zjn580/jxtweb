<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="css/common.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <script type="text/javascript" src="js/libs/modernizr.min.js"></script>
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