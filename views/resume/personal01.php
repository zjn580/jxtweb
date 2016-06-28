<!DOCTYPE html>
<!-- saved from url=(0038)http://www.lagou.com/resume/basic.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=10;IE=9;IE=8;IE=7;IE=EDGE">
<meta http-equiv="Cache-Control" content="no-siteapp">
<link rel="alternate" media="handheld" href="http://www.lagou.com/resume/basic.html#">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>基本信息-我的简历-拉勾网-最专业的互联网招聘平台</title>
<meta property="qc:admins" content="23635710066417756375">
<meta content="拉勾网是3W旗下的互联网领域垂直招聘网站,互联网职业机会尽在拉勾网" name="description">
<meta content="拉勾,拉勾网,拉勾招聘,拉钩, 拉钩网 ,互联网招聘,拉勾互联网招聘, 移动互联网招聘, 垂直互联网招聘, 微信招聘, 微博招聘, 拉勾官网, 拉勾百科,跳槽, 高薪职位, 互联网圈子, IT招聘, 职场招聘, 猎头招聘,O2O招聘, LBS招聘, 社交招聘, 校园招聘, 校招,社会招聘,社招" name="keywords">
<meta name="baidu-site-verification" content="QIQ6KC1oZ6">


<!-- <div class="web_root"  style="display:none">http://www.lagou.com</div> -->
<script charset="utf-8" src="personal01/v.js"></script><script async="" src="personal01/analytics.js"></script><script async="" src="personal01/a.js"></script><script type="text/javascript">
var ctx = "http://www.lagou.com";
var rctx = "http://hr.lagou.com";
var pctx = "http://passport.lagou.com";
var crctx = "http://www.lagou.com";
var sctx = "http://suggest.lagou.com";
var chrctx = "http://c.hr.lagou.com";
var paictx = "http://pai.lagou.com";

var frontLogin = "http://www.lagou.com/frontLogin.do";
var frontLogout = "http://www.lagou.com/frontLogout.do";
var frontRegister = "http://www.lagou.com/frontRegister.do";

</script>
<link rel="Shortcut Icon" href="http://www.lagou.com/images/favicon.ico">
<link rel="stylesheet" type="text/css" href="personal01/style.css">
<link rel="stylesheet" type="text/css" href="personal01/external.min.css">
<link rel="stylesheet" type="text/css" href="personal01/myresume.css">
<link rel="stylesheet" type="text/css" href="personal01/tailoring.css">
<link rel="stylesheet" type="text/css" href="personal01/popup.css">
<script src="personal01/jquery.1.10.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="personal01/jquery.lib.min.js"></script>
<script src="personal01/ajaxfileupload.js" type="text/javascript"></script>

<script type="text/javascript" src="personal01/additional-methods.js"></script>
<!--[if lte IE 8]>
    <script type="text/javascript" src="http://www.lagou.com/js/assets/excanvas.js?v=1.5.6_2016061316"></script>
<![endif]-->
<style>
.ui-widget-content {
	width:inherit;
	background:#eee;
	COLOR: #383838; 
	border:none;
}
.ui-widget-content .ui-state-default {
	margin-top:-2px;
	FONT-WEIGHT: bold; 
	BACKGROUND: url(../../images/myresume/mr_headimage.png) #00c195  -50px -3px ; 
	COLOR: #4c3000; 
	outline: none
}
.ui-state-hover {
	FONT-WEIGHT: bold; 
	BACKGROUND: url(images/ui-bg_gloss-wave_70_ffdd57_500x100.png) #ffdd57 repeat-x 50% 50%; 
	COLOR: #381f00; 
	outline: none
}
input{color:#333;}
</style>
</head>
<body style="background: rgb(0, 179, 138);"> 
<div id="mr_wrapper">
	<div id="mrHeader">
		<dl class="collapsible_menu">
		   	<dt>
		  		<span id="nowrap">操作</span> 
		   		<i></i>
		   	</dt>                
		       <dd class="logout  dn"><a href="?r=login/login" rel="nofollow">退出</a></dd>
	   </dl> 
	</div>
</div>

<div class="mr_container">
    <div class="mr_basic">
        <dl class="mr_head">
            <dt>
            	<img src="personal01/default_headpic.png" width="117" height="117" alt="头像" class="mr_headimg">
                <!-- <div></div> -->
                <img src="personal01/mr_head.png" width="137" height="140" alt="头像" class="mr_headbg">
                <!-- accept="image/*" -->
                <img src="personal01/mr_headhover.png" width="119" height="118" class="mr_headhover">
                <input type="file" class="mr_headfile" id="headPic" name="headPic" onchange="myresumeCommon.utils.imageUpload(this,myresumeCommon.requestTargets.photoUpload,uploadPhoto.upSucc,uploadPhoto.upFail);" title="支持jpg、jpeg、gif、png格式，文件小于10M">
            </dt>
            <dd><h2>基本信息</h2></dd>
        </dl>  
<form class="mr_basicform" action="?r=resume/basicadd" method="post">
            <div class="mr_basicname">
            	            	<input type="text" name="u_name" placeholder="姓名">
            	           	</div>
           	<div class="endWork clearfixs">
	            <div class="mr_topdegree degree sel">
	            	 <input type="hidden" name="e_id">
	                 <input type="button" value="学历" id="mrTopDegree">
	                 	                <em></em>
	                <ul class="reset dn selUl" >
	                <?php
	                	foreach ($arr1 as $key => $value){
	                ?>
	        			<li ><?php echo $value['e_name']?></li>
	        		<?php
	        			}
	        		?>
		        	</ul>
	            </div>
	            <div class="mr_workyear nextSel">
             	                  <input type="hidden" name="ex_id" value="">
                 <input type="button" value="工作年限" id="mrWokrYear">
                                  <em></em>
                 <ul class="reset dn selUl" >
                    <?php
	                	foreach ($arr as $key => $value){
	                ?>
	        			<li><?php echo $value['ex_experience']?></li>
	        		<?php
	        			}
	        		?>
	        	</ul>
            </div>
           	</div>
           	<div class="mr_phone">
           		           		<input type="text" name="pe_phone" id="mrPhone" placeholder="手机号">
           		           		<div class="tips dn">
	        		<i></i>未经你的授权，企业不会看到你的联系方式，请放心填写：）
	        	</div>
        	</div>
        	<div class="mr_phone">
           		           		<input type="text" name="email" id="mrEmail" value="328894061@qq.com" placeholder="邮箱">
           		           		<div class="tips dn">
	        		<i></i>未经你的授权，企业不会看到你的联系方式，请放心填写：）
	        	</div>
        	</div>
            

            <label><input type="submit" id="mrSaveThree" value="注    册" data-val="0"></label>
            <!--此处需要判断是学生还是工人-->
            <label><a id="mrSaveBasic" data-val="1">保存以上信息，但暂不继续完善信息</a></label>
        </form>
        <div class="mr_btm">&nbsp;</div> 
        <input type="hidden" value="" id="resumeId"> 
    </div>
    <input type="hidden" value="0" id="pageType">
    <input type="hidden" value="dda1cb8e62744618bfcb8cac7ea36b98" id="resubmitToken">
</div>  
<div style="display:none">
	 <div class="popup" id="uploadImages" style="overflow:hidden;width:360px;height:470px;">
		<div class="crop">
		   <div id="cropzoom_container" style="overflow:hidden;"></div>
		   <div class="page_btn">
		      <input type="button" class="btn" id="crop" value="确定">
		      <input type="button" class="cancel" id="restore" value="取消">
		   </div>
		   <div class="clear"></div>
		</div>
	</div> 
</div>

<script type="text/javascript" src="personal01/analytics(1).js"></script><script src="personal01/h.js" type="text/javascript"></script>
<script type="text/javascript" src="personal01/core.min.js"></script>
<script type="text/javascript" src="personal01/popup.min.js"></script>
<script type="text/javascript" src="personal01/common.js"></script>
<script type="text/javascript" src="personal01/jquery-migrate-1.1.1.js"></script>
<script type="text/javascript" src="personal01/jquery-ui-1.8.custom.min.js"></script>
<script type="text/javascript" src="personal01/jquery.cropzoom.js"></script>
<script type="text/javascript" src="personal01/stringifyJSON.min.js"></script>
<!-- <script type="text/javascript" src="http://www.lagou.com/js/mycenter/city.js?v=1.5.6_2016061316"></script> -->
<script type="text/javascript" src="personal01/components.js"></script>
<script type="text/javascript" src="personal01/myresume.min.js"></script>
<!-- <script type="text/javascript" src="http://www.lagou.com/js/mycenter/myresume.js?v=1.5.6_2016061316"></script> -->



<div id="cboxOverlay" style="display: none;"></div><div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;"><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left;"></div><div id="cboxTopCenter" style="float: left;"></div><div id="cboxTopRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxMiddleLeft" style="float: left;"></div><div id="cboxContent" style="float: left;"><div id="cboxTitle" style="float: left;"></div><div id="cboxCurrent" style="float: left;"></div><button type="button" id="cboxPrevious"></button><button type="button" id="cboxNext"></button><button id="cboxSlideshow"></button><div id="cboxLoadingOverlay" style="float: left;"></div><div id="cboxLoadingGraphic" style="float: left;"></div></div><div id="cboxMiddleRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div></body></html>