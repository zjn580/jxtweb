<?php
session_start();
?>
<!DOCTYPE HTML>
<html xmlns:wb="http://open.weibo.com/wb">
<head>
<script id="allmobilize" charset="utf-8" src="style/js/allmobilize.min.js"></script>
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="alternate" media="handheld"  />
<!-- end 云适配 -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>拉勾网-最专业的互联网招聘平台</title>
<meta property="qc:admins" content="23635710066417756375" />
<meta content="拉勾网是3W旗下的互联网领域垂直招聘网站,互联网职业机会尽在拉勾网" name="description">
<meta content="拉勾,拉勾网,拉勾招聘,拉钩, 拉钩网 ,互联网招聘,拉勾互联网招聘, 移动互联网招聘, 垂直互联网招聘, 微信招聘, 微博招聘, 拉勾官网, 拉勾百科,跳槽, 高薪职位, 互联网圈子, IT招聘, 职场招聘, 猎头招聘,O2O招聘, LBS招聘, 社交招聘, 校园招聘, 校招,社会招聘,社招" name="keywords">
<meta name="baidu-site-verification" content="QIQ6KC1oZ6" />

<!-- <div class="web_root"  style="display:none">h</div> -->
<script type="text/javascript">
var ctx = "h";
</script>
<link rel="Shortcut Icon" href="h/images/favicon.ico">
<link rel="stylesheet" type="text/css" href="style/css/style.css"/>
<link rel="stylesheet" type="text/css" href="style/css/external.min.css"/>
<link rel="stylesheet" type="text/css" href="style/css/popup.css"/>
<script src="style/js/jquery.1.10.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="style/js/jquery.lib.min.js"></script>
<script src="style/js/ajaxfileupload.js" type="text/javascript"></script>
<script type="text/javascript" src="style/js/additional-methods.js"></script>
<!--[if lte IE 8]>
    <script type="text/javascript" src="style/js/excanvas.js"></script>
<![endif]-->
<script type="text/javascript">

</script> 
<!--<script type="text/javascript" src="style/js/conv.js"></script>-->
</head>
<body>
<div id="body">
	<div id="header">
    	<div class="wrapper">
    		<a href="?r=index/index" class="logo">
    			<img src="images/logo.png" width="229" height="43" alt="拉勾招聘-专注互联网招聘" />
    		</a>
    		<ul class="reset" id="navheader">
    			<li ><a href="?r=index/index">首页</a></li>
    			<li ><a href="?r=company/company" >公司</a></li>
                <li ><a href="?r=school/school" rel="nofollow">培训机构</a></li>

                 <?php
                if(isset($_SESSION['u_status'])){
                  if($_SESSION['u_status'] == 2){ ?>
                }
    			<li ><a href="?r=resume/resume" >我的简历</a></li>
                <?php }?>
    			
                <?php if($_SESSION['u_status'] == 0){?>
	    		<li ><a href="?r=position/position" rel="nofollow">发布职位</a></li>
                <?php } }?>
	    	</ul>

            <?php if(!isset($_SESSION['u_id'])){?>
        	<ul class="loginTop">
            	<li><a href="?r=login/login" rel="nofollow">登录</a></li> 
            	<li>|</li>
            	<li><a href="?r=login/register" rel="nofollow">注册</a></li>
            </ul>
            <?php }else{?>
            <dl class="collapsible_menu">
                <dt>
                    <span><?=$_SESSION['u_account'] ?></span> 
                    <span class="red dn" id="noticeDot-0"></span>
                    <i></i>
                </dt>

                <?php     
                if($_SESSION['u_status'] == 2){ 
                ?>
                <dd>
                    <a href="?r=resume/resume">我要找工作</a>
                </dd>
                <dd>
                    <a rel="nofollow" href="?r=resume/resume">我的简历</a>
                </dd>
                <dd>
                    <a href="?r=position/collect">我收藏的职位</a>
                </dd>
                <dd class="btm">
                    <a href="?r=position/subscribe">我的订阅</a>
                </dd>
                <dd class="btm">
                    <a href="?r=position/delivery">我投递的职位 <span id="noticeNo" class="red">(1)</span></a>
                </dd>
                <?php }elseif($_SESSION['u_status'] == 0){ ?>

                <dd>
                    <a href="?r=position/position">我要招人</a>
                </dd>
                <dd>
                    <a href="?r=company/myhome">我的公司主页</a>
                </dd>
                <dd>
                    <a href="?r=position/posit">我发布的职位</a>
                </dd>
                <dd class="btm" >
                    <a href="?r=position/posit">我收到的简历</a>
                </dd>
                <?php }elseif($_SESSION['u_status'] == 1){ ?>
                 <dd>
                     <a href="?r=school/myhome">我的学校主页</a>
                </dd>
                <dd class="btm">
                    <a href="?r=school/add_member">增加专业</a>
                </dd>
                <?php }?>


                <dd >
                    <a href="?r=index/account">帐号设置</a>
                </dd>
                <dd class="logout">
                    <a rel="nofollow" href="?r=login/quit">退出</a>
                </dd>

            </dl>
        <?php }?>
    </div>
    </div><!-- end #header -->
    <?= $content?>
    </div><!-- end #body -->
	<div id="footer">
		<div class="wrapper">
			<a href="?r=index/about" target="_blank" rel="nofollow">联系我们</a>
		    <a href="h/af/zhaopin.html" target="_blank">互联网公司导航</a>
		    <a href="http://e.weibo.com/lagou720" target="_blank" rel="nofollow">拉勾微博</a>
		    <a class="footer_qr" href="javascript:void(0)" rel="nofollow">拉勾微信<i></i></a>
			<div class="copyright">&copy;2013-2014 Lagou <a target="_blank" href="http://www.miitbeian.gov.cn/state/outPortal/loginPortal.action">京ICP备14023790号-2</a></div>
		</div>
	</div>

<script type="text/javascript" src="style/js/core.min.js"></script>
<script type="text/javascript" src="style/js/popup.min.js"></script>

<!-- <script src="style/js/wb.js" type="text/javascript" charset="utf-8"></script>
 -->

</body>
</html>	