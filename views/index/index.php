﻿<div id="container">
    <div id="sidebar">
        <div class="mainNavs">
        <?php foreach ($newarr as $k => $v) { ?>
            <div class="menu_box">
                <div class="menu_main">
                    <h2>
                        <?php echo $v['l_name']; ?>
                        <span>
                        </span>
                    </h2>
                    <?php foreach ($v['son'] as $kk => $vv) { ?>
                    <a href="">
                        <?php echo $vv['l_name']; ?>
                    </a>
                    <?php }?>
                </div>
                <div class="menu_sub dn">
                    <?php foreach ($v['son'] as $kk => $vv) { ?>
                    <dl class="reset">
                        <dt>
                            <a href="h/jobs/list_后端开发?labelWords=label">
                                <?php echo $vv['l_name']; ?>
                            </a>
                        </dt>
                        <dd>
                        <?php foreach ($vv['son'] as $kkk => $vvv) { ?>
                            <a href="h/jobs/list_Java?labelWords=label" class="curr">
                                <?php echo $vvv['l_name']; ?>
                            </a>
                        <?php }?>
                        </dd>
                    </dl>
                    <?php }?>
                </div>
            </div>
        <?php }?>
        </div>
        <a class="subscribe" href="subscribe.html" target="_blank">
            订阅职位
        </a>
    </div>
    <div class="content">
        <div id="search_box">
            <form id="searchForm" name="searchForm" action="list.html" method="get">
                <ul id="searchType">
                    <li data-searchtype="1" class="type_selected">
                        职位
                    </li>
                    <li data-searchtype="4">
                        公司
                    </li>
                </ul>
                <div class="searchtype_arrow">
                </div>
                <input type="text" id="search_input" name="kd" tabindex="1" value="" placeholder="请输入职位名称，如：产品经理"
                />
                <input type="hidden" name="spc" id="spcInput" value="" />
                <input type="hidden" name="pl" id="plInput" value="" />
                <input type="hidden" name="gj" id="gjInput" value="" />
                <input type="hidden" name="xl" id="xlInput" value="" />
                <input type="hidden" name="yx" id="yxInput" value="" />
                <input type="hidden" name="gx" id="gxInput" value="" />
                <input type="hidden" name="st" id="stInput" value="" />
                <input type="hidden" name="labelWords" id="labelWords" value="" />
                <input type="hidden" name="lc" id="lc" value="" />
                <input type="hidden" name="workAddress" id="workAddress" value="" />
                <input type="hidden" name="city" id="cityInput" value="" />
                <input type="submit" id="search_button" value="搜索" />
            </form>
        </div>
        <style>
            .ui-autocomplete{width:488px;background:#fafafa !important;position: relative;z-index:10;border:
            2px solid #91cebe;} .ui-autocomplete-category{font-size:16px;color:#999;width:50px;position:
            absolute;z-index:11; right: 0px;/*top: 6px; */text-align:center;border-top:
            1px dashed #e5e5e5;padding:5px 0;} .ui-menu-item{ *width:439px;vertical-align:
            middle;position: relative;margin: 0px;margin-right: 50px !important;background:#fff;border-right:
            1px dashed #ededed;} .ui-menu-item a{display:block;overflow:hidden;}
        </style>
        <script type="text/javascript" src="style/js/search.min.js">
        </script>
        <dl class="hotSearch">
            <dt>
                热门搜索：
            </dt>
            <dd>
                <a href="list.htmlJava?labelWords=label&city=">
                    Java
                </a>
            </dd>
            <dd>
                <a href="list.htmlPHP?labelWords=label&city=">
                    PHP
                </a>
            </dd>
            <dd>
                <a href="list.htmlAndroid?labelWords=label&city=">
                    Android
                </a>
            </dd>
            <dd>
                <a href="list.htmliOS?labelWords=label&city=">
                    iOS
                </a>
            </dd>
            <dd>
                <a href="list.html前端?labelWords=label&city=">
                    前端
                </a>
            </dd>
            <dd>
                <a href="list.html产品经理?labelWords=label&city=">
                    产品经理
                </a>
            </dd>
            <dd>
                <a href="list.htmlUI?labelWords=label&city=">
                    UI
                </a>
            </dd>
            <dd>
                <a href="list.html运营?labelWords=label&city=">
                    运营
                </a>
            </dd>
            <dd>
                <a href="list.htmlBD?labelWords=label&city=">
                    BD
                </a>
            </dd>
            <dd>
                <a href="list.html?gx=实习&city=">
                    实习
                </a>
            </dd>
        </dl>
        <div id="home_banner">
            <ul class="banner_bg">
                <li class="banner_bg_1 current">
                    <a href="h/subject/s_buyfundation.html?utm_source=DH__lagou&utm_medium=banner&utm_campaign=haomai"
                    target="_blank">
                        <img src="images/d05a2cc6e6c94bdd80e074eb05e37ebd.jpg" width="612" height="160"
                        alt="好买基金——来了就给100万" />
                    </a>
                </li>
                <li class="banner_bg_2">
                    <a href="h/subject/s_worldcup.html?utm_source=DH__lagou&utm_medium=home&utm_campaign=wc"
                    target="_blank">
                        <img src="images/c9d8a0756d1442caa328adcf28a38857.jpg" width="612" height="160"
                        alt="世界杯放假看球，老板我也要！" />
                    </a>
                </li>
                <li class="banner_bg_3">
                    <a href="h/subject/s_xiamen.html?utm_source=DH__lagou&utm_medium=home&utm_campaign=xiamen"
                    target="_blank">
                        <img src="images/d03110162390422bb97cebc7fd2ab586.jpg" width="612" height="160"
                        alt="出北京记——第一站厦门" />
                    </a>
                </li>
            </ul>
            <div class="banner_control">
                <em>
                </em>
                <ul class="thumbs">
                    <li class="thumbs_1 current">
                        <i>
                        </i>
                        <img src="images/4469b1b83b1f46c7adec255c4b1e4802.jpg" width="113" height="42"
                        />
                    </li>
                    <li class="thumbs_2">
                        <i>
                        </i>
                        <img src="images/381b343557774270a508206b3a725f39.jpg" width="113" height="42"
                        />
                    </li>
                    <li class="thumbs_3">
                        <i>
                        </i>
                        <img src="images/354d445c5fd84f1990b91eb559677eb5.jpg" width="113" height="42"
                        />
                    </li>
                </ul>
            </div>
        </div>
        <!--/#main_banner-->
        <ul id="da-thumbs" class="da-thumbs">
            <li>
                <a href="h/c/1650.html" target="_blank">
                    <img src="images/a254b11ecead45bda166afa8aaa9c8bc.jpg" width="113" height="113"
                    alt="联想" />
                    <div class="hot_info">
                        <h2 title="联想">
                            联想
                        </h2>
                        <em>
                        </em>
                        <p title="世界因联想更美好">
                            世界因联想更美好
                        </p>
                    </div>
                </a>
            </li>
            <li>
                <a href="h/c/9725.html" target="_blank">
                    <img src="images/c75654bc2ab141df8218983cfe5c89f9.jpg" width="113" height="113"
                    alt="淘米" />
                    <div class="hot_info">
                        <h2 title="淘米">
                            淘米
                        </h2>
                        <em>
                        </em>
                        <p title="将心注入 追求极致">
                            将心注入 追求极致
                        </p>
                    </div>
                </a>
            </li>
            <li>
                <a href="h/c/1914.html" target="_blank">
                    <img src="images/2bba2b71d0b0443eaea1774f7ee17c9f.png" width="113" height="113"
                    alt="优酷土豆" />
                    <div class="hot_info">
                        <h2 title="优酷土豆">
                            优酷土豆
                        </h2>
                        <em>
                        </em>
                        <p title="专注于视频领域，是中国网络视频行业领军企业">
                            专注于视频领域，是中国网络视频行业领军企业
                        </p>
                    </div>
                </a>
            </li>
            <li>
                <a href="h/c/6630.html" target="_blank">
                    <img src="images/f4822a445a8b495ebad81fcfad3e40e2.jpg" width="113" height="113"
                    alt="思特沃克" />
                    <div class="hot_info">
                        <h2 title="思特沃克">
                            思特沃克
                        </h2>
                        <em>
                        </em>
                        <p title="一家全球信息技术服务公司">
                            一家全球信息技术服务公司
                        </p>
                    </div>
                </a>
            </li>
            <li>
                <a href="h/c/2700.html" target="_blank">
                    <img src="images/5caf8f9631114bf990f87bb11360653e.png" width="113" height="113"
                    alt="奇猫" />
                    <div class="hot_info">
                        <h2 title="奇猫">
                            奇猫
                        </h2>
                        <em>
                        </em>
                        <p title="专注于移动互联网、互联网产品研发">
                            专注于移动互联网、互联网产品研发
                        </p>
                    </div>
                </a>
            </li>
            <li class="last">
                <a href="h/c/1335.html" target="_blank">
                    <img src="images/c0052c69ef4546c3b7d08366d0744974.jpg" width="113" height="113"
                    alt="堆糖网" />
                    <div class="hot_info">
                        <h2 title="堆糖网">
                            堆糖网
                        </h2>
                        <em>
                        </em>
                        <p title="分享收集生活中的美好，遇见世界上的另外一个你">
                            分享收集生活中的美好，遇见世界上的另外一个你
                        </p>
                    </div>
                </a>
            </li>
        </ul>
        <ul class="reset hotabbing">
            <li class="current">
                热门职位
            </li>
            <li>
                最新职位
            </li>
        </ul>
        <div id="hotList">
            <ul class="hot_pos reset">
                <?php foreach($arr as $k=>
                    $v){?>
                    <li class="clearfix">
                        <div class="hot_pos_l">
                            <div class="mb10">
                                <a href="?r=
                                " target="_blank">
                                    <?php echo $v[ 'p_name']; ?>
                                </a>
                                &nbsp;
                                <span class="c9">
                                    [
                                    <?php echo $v[ 'p_address']; ?>
                                        ]
                                </span>
                            </div>
                            <span>
                                <em class="c7">
                                    月薪：
                                </em>
                                <?php echo $v[ 'sa_salary']; ?>
                            </span>
                            <span>
                                <em class="c7">
                                    经验：
                                </em>
                                <?php echo $v[ 'ex_experience']; ?>
                            </span>
                            <span>
                                <em class="c7">
                                    最低学历：
                                </em>
                                <?php echo $v[ 'e_name']; ?>
                            </span>
                            <br />
                            <span>
                                <em class="c7">
                                    职位诱惑：
                                </em>
                                <?php echo $v[ 'p_temptation']; ?>
                            </span>
                            <br />
                            <span>
                                <?php $now=time(); $guonian=ceil(($now-$v[ 'p_time'])/86400); //60s*60min*24h
                                echo "已发布<strong>$guonian</strong>天！"; ?>
                            </span>
                            <!-- <a class="wb">分享到微博</a> -->
                        </div>
                        <div class="hot_pos_r">
                            <div class="mb10 recompany">
                                <a href="h/c/399.html" target="_blank">
                                    <?php echo $v[ 'p_email']; ?>
                                </a>
                            </div>
                            <span>
                                <em class="c7">
                                    领域：
                                </em>
                                <?php echo $v[ 'p_name']; ?>
                            </span>
                            <span>
                                <em class="c7">
                                    创始人：
                                </em>
                                <?php echo $v[ 'c_linkman']; ?>
                            </span>
                            <br />
                            <span>
                                <em class="c7">
                                    电话：
                                </em>
                                <?php echo $v[ 'c_phone']; ?>
                            </span>
                            <span>
                                <em class="c7">
                                    公司地址：
                                </em>
                                <?php echo $v[ 'city_name']; ?>
                            </span>
                            <ul class="companyTags reset">
                                <li>
                                    <?php echo $v[ 'c_tags']; ?>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <?php } ?>
                        <a href="?r=index/indexlist" class="btn fr" target="_blank">
                            查看更多
                        </a>
            </ul> 
            <ul class="hot_pos reset" style="display:none">
                <?php foreach($arr1 as $k=>
                    $v){?>
                    <li class="clearfix">
                        <div class="hot_pos_l">
                            <div class="mb10">
                                <a href="?r=
                                " target="_blank">
                                    <?php echo $v[ 'p_name']; ?>
                                </a>
                                &nbsp;
                                <span class="c9">
                                    [
                                    <?php echo $v[ 'p_address']; ?>
                                        ]
                                </span>
                            </div>
                            <span>
                                <em class="c7">
                                    月薪：
                                </em>
                                <?php echo $v[ 'sa_salary']; ?>
                            </span>
                            <span>
                                <em class="c7">
                                    经验：
                                </em>
                                <?php echo $v[ 'ex_experience']; ?>
                            </span>
                            <span>
                                <em class="c7">
                                    最低学历：
                                </em>
                                <?php echo $v[ 'e_name']; ?>
                            </span>
                            <br />
                            <span>
                                <em class="c7">
                                    职位诱惑：
                                </em>
                                <?php echo $v[ 'p_temptation']; ?>
                            </span>
                            <br />
                            <span>
                                <?php $now=time(); $guonian=ceil(($now-$v[ 'p_time'])/86400); //60s*60min*24h
                                echo "已发布<strong>$guonian</strong>天！"; ?>
                            </span>
                            <!-- <a class="wb">分享到微博</a> -->
                        </div>
                        <div class="hot_pos_r">
                            <div class="mb10 recompany">
                                <a href="h/c/399.html" target="_blank">
                                    <?php echo $v[ 'p_email']; ?>
                                </a>
                            </div>
                            <span>
                                <em class="c7">
                                    领域：
                                </em>
                                <?php echo $v[ 'p_name']; ?>
                            </span>
                            <span>
                                <em class="c7">
                                    创始人：
                                </em>
                                <?php echo $v[ 'c_linkman']; ?>
                            </span>
                            <br />
                            <span>
                                <em class="c7">
                                    电话：
                                </em>
                                <?php echo $v[ 'c_phone']; ?>
                            </span>
                            <span>
                                <em class="c7">
                                    公司地址：
                                </em>
                                <?php echo $v[ 'city_name']; ?>
                            </span>
                            <ul class="companyTags reset">
                                <li>
                                    <?php echo $v[ 'c_tags']; ?>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <?php } ?>
                        <a href="?r=index/indexlist" class="btn fr" target="_blank">
                            查看更多
                        </a>
            </ul>
        </div>
        <div class="clear">

        </div>
        <div id="linkbox">
            <dl>
                <dt>
                    友情链接
                </dt>
                <dd>
                    <a href="http://www.zhuqu.com/" target="_blank">
                        住趣家居网
                    </a>
                    <span>
                        |
                    </span>
                    <a href="http://www.woshipm.com/" target="_blank">
                        人人都是产品经理
                    </a>
                    <span>
                        |
                    </span>
                    <a href="http://zaodula.com/" target="_blank">
                        互联网er的早读课
                    </a>
                    <span>
                        |
                    </span>
                    <a href="http://lieyunwang.com/" target="_blank">
                        猎云网
                    </a>
                    <span>
                        |
                    </span>
                    <a href="http://www.ucloud.cn/" target="_blank">
                        UCloud
                    </a>
                    <span>
                        |
                    </span>
                    <a href="http://www.iconfans.com/" target="_blank">
                        iconfans
                    </a>
                    <span>
                        |
                    </span>
                    <a href="http://www.html5dw.com/" target="_blank">
                        html5梦工厂
                    </a>
                    <span>
                        |
                    </span>
                    <a href="http://www.sykong.com/" target="_blank">
                        手游那点事
                    </a>
                    <a href="http://www.php100.com/" target="_blank">
                        php100
                    </a>
                    <span>
                        |
                    </span>
                    <a href="http://www.uehtml.com/" target="_blank">
                        uehtml
                    </a>
                    <span>
                        |
                    </span>
                    <a href="http://www.w3cplus.com/" target="_blank">
                        W3CPlus
                    </a>
                    <span>
                        |
                    </span>
                    <a href="http://www.boxui.com/" target="_blank">
                        盒子UI
                    </a>
                    <span>
                        |
                    </span>
                    <a href="http://www.uimaker.com/" target="_blank">
                        uimaker
                    </a>
                    <span>
                        |
                    </span>
                    <a href="http://www.yixieshi.com/" target="_blank">
                        互联网的一些事
                    </a>
                    <span>
                        |
                    </span>
                    <a href="http://www.chuanke.com/" target="_blank">
                        传课网
                    </a>
                    <span>
                        |
                    </span>
                    <a href="http://www.eoe.cn/" target="_blank">
                        安卓开发
                    </a>
                    <span>
                        |
                    </span>
                    <a href="http://www.eoeandroid.com/" target="_blank">
                        安卓开发论坛
                    </a>
                    <a href="http://hao.360.cn/" target="_blank">
                        360安全网址导航
                    </a>
                    <span>
                        |
                    </span>
                    <a href="http://se.360.cn/" target="_blank">
                        360安全浏览器
                    </a>
                    <span>
                        |
                    </span>
                    <a href="http://www.hao123.com/" target="_blank">
                        hao123上网导航
                    </a>
                    <span>
                        |
                    </span>
                    <a href="http://www.ycpai.com" target="_blank">
                        互联网创业
                    </a>
                    <span>
                        |
                    </span>
                    <a href="http://www.zhongchou.cn" target="_blank">
                        众筹网
                    </a>
                    <span>
                        |
                    </span>
                    <a href="http://www.marklol.com/" target="_blank">
                        马克互联网
                    </a>
                    <span>
                        |
                    </span>
                    <a href="http://www.chaohuhr.com/" target="_blank">
                        巢湖英才网
                    </a>
                    <a href="http://www.zhubajie.com/" target="_blank">
                        创意服务外包
                    </a>
                    <span>
                        |
                    </span>
                    <a href="http://www.thinkphp.cn/" target="_blank">
                        thinkphp
                    </a>
                    <span>
                        |
                    </span>
                    <a href="http://www.chuangxinpai.com/" target="_blank">
                        创新派
                    </a>
                    <span>
                        |
                    </span>
                    <a href="http://w3cshare.com/" target="_blank">
                        W3Cshare
                    </a>
                    <span>
                        |
                    </span>
                    <a href="http://www.518lunwen.cn/" target="_blank">
                        论文发表网
                    </a>
                    <span>
                        |
                    </span>
                    <a href="http://www.199it.com" target="_blank">
                        199it
                    </a>
                    <span>
                        |
                    </span>
                    <a href="http://www.shichangbu.com" target="_blank">
                        市场部网
                    </a>
                    <span>
                        |
                    </span>
                    <a href="http://www.meitu.com/" target="_blank">
                        美图公司
                    </a>
                    <span>
                        |
                    </span>
                    <a href="https://www.teambition.com/" target="_blank">
                        Teambition
                    </a>
                    <a href="http://oupeng.com/" target="_blank">
                        欧朋浏览器
                    </a>
                    <span>
                        |
                    </span>
                    <a href="http://iwebad.com/" target="_blank">
                        网络广告人社区
                    </a>
                    <a href="h/af/flink.html" target="_blank" class="more">
                        更多
                    </a>
                </dd>
            </dl>
        </div>
    </div>
    <input type="hidden" value="" name="userid" id="userid" />
    <!-- <div id="qrSide"><a></a></div> -->
    <!-- -->
    <!-- <div id="loginToolBar">
    <div>
    <em></em>
    <img src="style/images/footbar_logo.png" width="138" height="45" />
    <span class="companycount"></span>
    <span class="positioncount"></span>
    <a href="#loginPop" class="bar_login inline" title="登录"><i></i></a>
    <div class="right">
    <a href="register.html?from=index_footerbar" onclick="_hmt.push(['_trackEvent', 'button', 'click', 'register'])" class="bar_register" id="bar_register" target="_blank"><i></i></a>
    </div>
    <input type="hidden" id="cc" value="16002" />
    <input type="hidden" id="cp" value="96531" />
    </div>
    </div>
    -->
    <!-------------------------------------弹窗lightbox ----------------------------------------->
    <div style="display:none;">
        <!-- 登录框 -->
        <div id="loginPop" class="popup" style="height:240px;">
            <form id="loginForm">
                <input type="text" id="email" name="email" tabindex="1" placeholder="请输入登录邮箱地址"
                />
                <input type="password" id="password" name="password" tabindex="2" placeholder="请输入密码"
                />
                <span class="error" style="display:none;" id="beError">
                </span>
                <label class="fl" for="remember">
                    <input type="checkbox" id="remember" value="" checked="checked" name="autoLogin"
                    />
                    记住我
                </label>
                <a href="h/reset.html" class="fr">
                    忘记密码？
                </a>
                <input type="submit" id="submitLogin" value="登 &nbsp; &nbsp; 录" />
            </form>
            <div class="login_right">
                <div>
                    还没有拉勾帐号？
                </div>
                <a href="register.html" class="registor_now">
                    立即注册
                </a>
                <div class="login_others">
                    使用以下帐号直接登录:
                </div>
                <a href="h/ologin/auth/sina.html" target="_blank" id="icon_wb" class="icon_wb"
                title="使用新浪微博帐号登录">
                </a>
                <a href="h/ologin/auth/qq.html" class="icon_qq" id="icon_qq" target="_blank"
                title="使用腾讯QQ帐号登录">
                </a>
            </div>
        </div>
        <!--/#loginPop-->
    </div>
    <!------------------------------------- end ----------------------------------------->
    <script type="text/javascript" src="style/js/Chart.min.js">
    </script>
    <script type="text/javascript" src="style/js/home.min.js">
    </script>
    <script type="text/javascript" src="style/js/count.js">
    </script>
    <div class="clear">
    </div>
    <input type="hidden" id="resubmitToken" value="" />
    <a id="backtop" title="回到顶部" rel="nofollow">
    </a>
</div>
<!-- end #container -->