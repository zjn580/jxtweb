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
                <li><a href="http://www.jscss.me">管理员</a></li>
                <li><a href="{{URL('quit')}}">退出</a></li>
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
            </ul>        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">招聘信息</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="/jscss/admin/design/index" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="">全部</option>
                                    <option value="19">精品界面</option><option value="20">推荐界面</option>
                                </select>
                            </td>
                            <th width="70">关键字:</th>
                            <td>
                                <select name="sal">
                                    <option value="1" selected>有效职位
                                    <option value="2">无效职位
                                </select>
                            </td>
                            <td>
                                <select name="sal">
                                    <option value="1" selected>公司名字
                                    <option value="2">公司名字
                                </select>
                            </td>
                            <td>
                                <select name="sal">
                                    <option value="1" selected>月薪1-15k
                                    <option value="2">月薪15-30k
                                </select>
                            </td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="{{URL('add')}}"><i class="icon-font"></i>新增信息</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th>排序</th>
                            <th>ID</th>
                            <th>标题</th>
                            <th>审核状态</th>
                            <th>点击</th>
                            <th>发布人</th>
                            <th>更新时间</th>
                            <th>评论</th>
                            <th>操作</th>
                        </tr>
                        <tr>
                            <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
                            <td>
                                <input name="ids[]" value="59" type="hidden">
                                <input class="common-input sort-input" name="ord[]" value="0" type="text">
                            </td>
                            <td>59</td>
                            <td title="发哥经典"><a target="_blank" href="#" title="发哥经典">发哥经典</a> …
                            </td>
                            <td>0</td>
                            <td>2</td>
                            <td>admin</td>
                            <td>2014-03-15 21:11:01</td>
                            <td></td>
                            <td>
                                <a class="link-update" href="#">修改</a>
                                <a class="link-del" href="#">删除</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="tc"><input name="id[]" value="58" type="checkbox"></td>
                            <td>
                                <input name="ids[]" value="58" type="hidden">
                                <input class="common-input sort-input" name="ord[]" value="0" type="text">
                            </td>
                            <td>58</td>
                            <td title="黑色经典"><a target="_blank" href="#" title="黑色经典">黑色经典</a> …
                            </td>
                            <td>0</td>
                            <td>35</td>
                            <td>admin</td>
                            <td>2013-12-30 22:34:00</td>
                            <td></td>
                            <td>
                                <a class="link-del" href="#">详情</a>
                                <a class="link-update" href="#">修改</a>
                                <a class="link-del" href="#">删除</a>
                            </td>
                        </tr>
                    </table>
                    <div class="list-page"> 2 条 1/1 页</div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>