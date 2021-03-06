﻿<!--我的机构主页-->
<div id="container">
    <script src="style/js/swfobject_modified.js" type="text/javascript"></script>
    <div class="clearfix">
        <div class="content_l">
            <div class="c_detail">
                <div style="background-color:#fff;" class="c_logo">
                    <a title="上传机构LOGO" id="logoShow" class="inline cboxElement" href="#logoUploader">
                        <img width="190" height="190" alt="机构logo" src="./company/<?php echo $company['c_logo'];?>">

                        <span>更换机构图片<br>190px*190px 小于5M</span>
                    </a>
                </div>

                <div class="c_logo" style="background-color:#fff;">
                    <div id="logoShow">
                        <img src="./company/<?php echo $company['c_logo'];?>" width="190" height="190" alt="机构logo" />
                        <span>更换机构图片<br />190px*190px 小于5M</span>
                    </div>
                    <input onchange="img_check(this,'?r=company/img',25927,'logo');" type="file" id="logo" name="logo" title="支持jpg、jpeg、gif、png格式，文件小于5M" />

                </div>
                <span class="error" id="logo_error" style="display:none;"></span>


                <div class="c_box companyName">
                    <h2 title="<?php echo $company['u_name'];?>"><?php echo $company['u_name'];?></h2>

                    <em class="unvalid"></em>
                    <span class="va dn">拉勾未认证企业</span>
                    <a class="applyC" href="?r=company/apply">申请认证</a>
                    <div class="clear"></div>

                    <h1 title="<?php echo $company['u_name'];?>" class="fullname"></h1>

                    <form class="clear editDetail dn" id="editDetailForm">
                        <input type="text" placeholder="请输入机构简称" maxlength="15" value="<?php echo $company['u_name'];?>" name="companyShortName" id="companyShortName">
                        <input type="text" placeholder="一句话描述机构优势" maxlength="50" value="<?php echo $company['c_intro'];?>" name="companyFeatures" id="companyFeatures">
                        <input type="hidden" value="" id="companyId" name="companyId">
                        <input type="submit" value="保存" id="saveDetail" class="btn_small">
                        <a id="cancelDetail" class="btn_cancel_s" >取消</a>
                    </form>

                    <div class="clear oneword"><img width="17" height="15" src="./company/<?php echo $company['c_logo'];?>">&nbsp; <span><?php echo $company['c_intro'];?></span> &nbsp;<img width="17" height="15" src="./company/<?php echo $company['c_logo'];?>"></div>
                    <h3 class="dn">已选择标签</h3>
                    <ul style="overflow:auto" id="hasLabels" class="reset clearfix">
                        <?php
                            $tags = explode(',',$company['c_tags']) ;
                            foreach($tags as $tag){?>
                                <li><span><?php echo $tag?></span></li>
                        <?php }?>
                        
                        <li class="link">编辑</li>
                    </ul>
                    <div class="dn" id="addLabels">
                        <input type="hidden" value="1" id="labelPageNo">
                        <input type="submit" value="贴上" class="fr" id="add_label">
                        <input type="text" placeholder="添加自定义标签" name="label" id="label" class="label_form fr">
                        <div class="clear"></div>
                        <ul class="reset clearfix"> </ul>
                        <a id="saveLabels" class="btn_small" href="javascript:void(0)">保存</a>
                        <a id="cancelLabels" class="btn_cancel_s" href="javascript:void(0)">取消</a>
                    </div>
                </div>
                <a title="编辑基本信息" class="c_edit" id="editCompanyDetail" href="javascript:void(0);"></a>
                <div class="clear"></div>
            </div>

            <div class="c_breakline"></div>

            <div id="Product">

                <div class="product_wrap">

                  <!--   <!--无产品 -->
                    <dl class="c_section dn">
                        <dt>
                        <h2><em></em>机构产品</h2>
                        </dt>
                        <dd>
                            <div class="addnew">
                                酒香不怕巷子深已经过时啦！<br>
                                把自己优秀的产品展示出来吸引人才围观吧！<br>
                                <a class="product_edit" href="javascript:void(0)">+添加机构产品</a>
                            </div>
                        </dd>
                    </dl>

                    <!--产品编辑-->
                    <dl id="newProduct" class="newProduct dn">
                        <dt>
                        <h2><em></em>机构产品</h2>
                        </dt>
                        <dd>
                            <form method="post" class="productForm">
                                <div class="new_product">

                                    <div class="product_upload dn productNo">
                                        <div>
                                            <span>上传产品图片</span>
                                            <br>
                                            尺寸：380*220px  	大小：小于5M
                                        </div>
                                    </div>
                                    <div class="product_upload productShow">
                                        <img width="380" height="220" src="./company/<?php echo $company['c_license'];?>">
                                        <span>更换产品图片<br>380*220px 小于5M</span>
                                    </div>

                                    <input type="file" title="支持jpg、jpeg、gif、png格式，文件小于5M" onchange="product_check(this,'http://www.lagou.com/c/upload.json','productNo','productShow','type','productInfos');" name="myfiles" id="myfiles0">
                                    <input type="hidden" value="3" name="type" class="type">
                                    <input type="hidden" value="images/product_default.png" name="productPicUrl" class="productInfos">
                                </div>

                                <div class="cp_intro">
                                    <input type="text" placeholder="请输入产品名称" value="发大发" name="product">
                                    <input type="text" placeholder="请输入产品网址" value="http://www.weimob.com" name="productUrl">
                                    <textarea placeholder="请简短描述该产品定位、产品特色、用户群体等" maxlength="500" value="发达发生的faf发达发生的faf发达发生的faf发达发生的faf发达发生的faf发达发生的faf发达发生的faf发达发生的faf发达发生的faf发达发生的faf发达发生的faf发达发生的faf发达发生的faf" class="c_textarea" name="productProfile">发达发生的faf发达发生的faf发达发生的faf发达发生的faf发达发生的faf发达发生的faf发达发生的faf发达发生的faf发达发生的faf发达发生的faf发达发生的faf发达发生的faf发达发生的faf</textarea>
                                    <div class="word_count fr">你还可以输入 <span>500</span> 字</div>
                                    <div class="clear"></div>
                                    <input type="submit" value="保存" class="btn_small">
                                    <a class="btn_cancel_s product_delete" href="javascript:void(0)">删除</a>
                                    <input type="hidden" value="11867" class="product_id">
                                </div>
                            </form>
                        </dd>
                    </dl>
                    <!--有产品-->
                    <dl class="c_product">
                        <dt>
                        <h2><em></em>公司产品</h2>
                        </dt>
                        <dd>
                            <img width="380" height="220" alt="<?php echo $company['u_name']; ?>" src="./company/<?php echo $company['c_license'];?>">
                            <div class="cp_intro">
                                <h3><a target="_blank" href="http://www.weimob.com"><?php echo $company['u_name']; ?></a></h3>
                                <div class="scroll-pane" style="overflow: hidden; padding: 0px; width: 260px;">

                                    <div class="jspContainer" style="width: 260px; height: 140px;"><div class="jspPane" style="padding: 0px; top: 0px; width: 260px;"><div><?php echo $company['c_intro']; ?></div></div></div></div>
                            </div>
                            <a title="编辑机构产品" class="c_edit product_edit" href="javascript:void(0)"></a>
                            <a title="新增机构产品" class="c_add product_add" href="javascript:void(0)"></a>
                        </dd>
                    </dl>

                </div>
            </div>   <!-- end #Product --> -->

            <div id="Profile">
                <div class="profile_wrap">
                    <!--无介绍 -->
                    <dl class="c_section dn">
                        <dt>
                        <h2><em></em>机构介绍</h2>
                        </dt>
                        <dd>
                            <div class="addnew">
                                详细机构的发展历程、让求职者更加了解你!<br>
                                <a id="addIntro" href="javascript:void(0)">+添加机构介绍</a>
                            </div>
                        </dd>
                    </dl>
                    <!--编辑介绍-->
                    <dl class="c_section newIntro dn">
                        <dt>
                        <h2><em></em>机构介绍</h2>
                        </dt>
                        <dd>
                            <form id="companyDesForm">
                                <textarea placeholder="请分段详细描述机构简介、企业文化等" name="companyProfile" id="companyProfile"><?php echo $company['c_intro'];?></textarea>
                                <div class="word_count fr">你还可以输入 <span>1000</span> 字</div>
                                <div class="clear"></div>
                                <input type="submit" value="保存" id="submitProfile" class="btn_small">
                                <a id="delProfile" class="btn_cancel_s" href="javascript:void(0)">取消</a>
                            </form>
                        </dd>
                    </dl>

                    <!--有介绍-->
                    <dl class="c_section">
                        <dt>
                        <h2><em></em>机构介绍</h2>
                        </dt>
                        <dd>
                            <div class="c_intro"><?php echo $company['c_intro'];?></div>
                            <a title="编辑机构介绍" id="editIntro" class="c_edit" href="javascript:void(0)"></a>
                        </dd>
                    </dl>
                </div>

            </div><!-- end #Profile -->

            <!--[if IE 7]> <br /> <![endif]-->

            <!--无招聘职位-->
            <dl id="noJobs" class="c_section">
                <dt>
                <h2><em></em>招聘职位</h2>
                </dt>
                <dd>
                    <div class="addnew">
                        发布需要的人才信息，让伯乐和千里马尽快相遇……<br>
                        <a href="?r=position/position">+添加招聘职位</a>
                    </div>
                </dd>
            </dl>

            <input type="hidden" value="" name="hasNextPage" id="hasNextPage">
            <input type="hidden" value="" name="pageNo" id="pageNo">
            <input type="hidden" value="" name="pageSize" id="pageSize">
            <div id="flag"></div>
        </div>	<!-- end .content_l -->

        <div class="content_r">
            <div id="Tags">
                <div id="c_tags_show" class="c_tags solveWrap">
                    <table>
                        <tbody><tr>
                            <td width="45">地点</td>
                            <td><?php echo $company['city_name'];?></td>
                        </tr>
                        <tr>
                            <td>领域</td><!-- 支持多选 -->
                            <td title="移动互联网">移动互联网</td>
                        </tr>
                        <tr>
                            <td>规模</td>
                            <td><?php echo $company['scale_size'];?></td>
                        </tr>
                        <tr>
                            <td>主页</td>
                            <td>
                                <a rel="nofollow" title="http://www.weimob.com" target="_blank" href="http://www.weimob.com">http://www.weim...</a>
                            </td>
                        </tr>
                        </tbody></table>
                    <a id="editTags" class="c_edit" href="javascript:void(0)"></a>
                </div>
                <div id="c_tags_edit" class="c_tags editTags dn">
                    <form id="tagForms">
                        <table>
                            <tbody><tr>
                                <td>地点</td>
                                <td>
                                    <input type="text" placeholder="请输入地点" value="上海" name="city" id="city">
                                </td>
                            </tr>
                            <tr>
                                <td>领域</td><!-- 支持多选 -->
                                <td>
                                    <input type="hidden" value="移动互联网" id="industryField" name="industryField">
                                    <input type="button" style="background:none;cursor:default;border:none !important;" disable="disable" value="移动互联网" id="select_ind" class="select_tags">
                                    <!-- <div id="box_ind" class="selectBox dn">
                                        <ul class="reset">
                                                                                                                                                        <li class="current">移动互联网</li>
                                                                                                                                            </ul>
                                    </div>	 -->
                                </td>
                            </tr>
                            <tr>
                                <td>规模</td>
                                <td>
                                    <input type="hidden" value="150-500人" id="companySize" name="companySize">
                                    <input type="button" value="150-500人" id="select_sca" class="select_tags">
                                    <div class="selectBox dn" id="box_sca" style="display: none;">
                                        <ul class="reset">
                                            <li>少于15人</li>
                                            <li>15-50人</li>
                                            <li>50-150人</li>
                                            <li class="current">150-500人</li>
                                            <li>500-2000人</li>
                                            <li>2000人以上</li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>主页</td>
                                <td>
                                    <input type="text" placeholder="请输入网址" value="http://www.weimob.com" name="companyUrl" id="companyUrl">
                                </td>
                            </tr>
                            </tbody></table>
                        <input type="hidden" id="comCity" value="上海">
                        <input type="hidden" id="comInd" value="移动互联网">
                        <input type="hidden" id="comSize" value="150-500人">
                        <input type="hidden" id="comUrl" value="http://www.zmtpost.com">
                        <input type="submit" value="保存" id="submitFeatures" class="btn_small">
                        <a id="cancelFeatures" class="btn_cancel_s" href="javascript:void(0)">取消</a>
                        <div class="clear"></div>
                    </form>
                </div>
            </div><!-- end #Tags -->

            <dl class="c_section c_stages">
                <dt>
                <h2><em></em>融资阶段</h2>
                <a title="编辑融资阶段" class="c_edit" href="javascript:void(0)"></a>
                </dt>
                <dd>
                    <ul class="reset stageshow">
                        <li>目前阶段：<span class="c5">天使轮</span></li>
                    </ul>
                    <form class="dn" id="stageform">
                        <div class="stageSelect">
                            <label>目前阶段</label>
                            <input type="hidden" value="天使轮" id="financeStage" name="financeStage">
                            <input type="button" value="天使轮" id="select_fin" class="select_tags_short fl">
                            <div class="selectBoxShort dn" id="box_fin" style="display: none;">
                                <ul class="reset">

                                    <li>未融资</li>


                                    <li class="current">天使轮</li>


                                    <li>A轮</li>


                                    <li>B轮</li>


                                    <li>C轮</li>


                                    <li>D轮及以上</li>


                                    <li>上市机构</li>

                                </ul>
                            </div>
                        </div>
                        <ul id="stagesList" class="reset">
                            <li>
                                <label>融资阶段</label>
                                <input type="hidden" class="select_invest_hidden" name="select_invest_hidden">
                                <input type="button" value="融资阶段" class="select_tags_short select_invest">
                                <div class="selectBoxShort dn" style="display: none;">
                                    <ul class="reset">
                                        <li>天使轮</li>
                                        <li>A轮</li>
                                        <li>B轮</li>
                                        <li>C轮</li>
                                        <li>D轮及以上</li>
                                        <li>上市机构</li>
                                    </ul>
                                </div>
                                <label>投资机构</label>
                                <input type="text" placeholder="如真格基金" name="stageorg" value="">
                            </li>
                        </ul>
                        <input type="submit" value="保存" class="btn_small">
                        <a id="cancelStages" class="btn_cancel_s" href="javascript:void(0)">取消</a>
                        <div class="clear"></div>

                        <div class="dn" id="cloneInvest">
                            <label>融资阶段</label>
                            <input type="hidden" class="select_invest_hidden" name="select_invest_hidden">
                            <input type="button" value="发展阶段" class="select_tags_short select_invest">
                            <div class="selectBoxShort dn" style="display: none;">
                                <ul class="reset">
                                    <li>天使轮</li>
                                    <li>A轮</li>
                                    <li>B轮</li>
                                    <li>C轮</li>
                                    <li>D轮及以上</li>
                                    <li>上市机构</li>
                                </ul>
                            </div>
                            <label>投资机构</label>
                            <input type="text" placeholder="如真格基金" name="stageorg">
                        </div>
                    </form>
                </dd>
            </dl><!-- end .c_stages -->


            <div id="Member">
                <!--有创始团队-->
                <dl class="c_section c_member">
                    <dt>
                    <h2><em></em>创始团队</h2>
                    <a title="添加创始人" class="c_add" href="javascript:void(0)"></a>
                    </dt>
                    <dd>

                        <div class="member_wrap">

                            <!-- 无创始人 -->
                            <div class="member_info addnew_right dn">
                                展示机构的领导班子，<br>提升诱人指数！<br>
                                <a class="member_edit" href="javascript:void(0)">+添加成员</a>
                            </div>

                            <!-- 编辑创始人 -->
                            <div class="member_info newMember dn">
                                <form class="memberForm">
                                    <div class="new_portrait">
                                        <div class="portrait_upload dn portraitNo">
                                            <span>上传创始人头像</span>
                                        </div>
                                        <div class="portraitShow">
                                            <img width="120" height="120" src="./images/leader_default.png">
                                            <span>更换头像</span>
                                        </div>
                                        <input type="file" value="" title="支持jpg、jpeg、gif、png格式，文件小于5M" onchange="member_check(this,'http://www.lagou.com/c/upload.json','portraitNo','portraitShow','type','leaderInfos');" name="myfiles" id="profiles0">
                                        <input type="hidden" value="7" name="type" class="type">
                                        <input type="hidden" value="images/leader_default.png" name="photo" class="leaderInfos">
                                        <em>
                                            尺寸：120*120px <br>
                                            大小：小于5M
                                        </em>
                                    </div>
                                    <input type="text" placeholder="请输入创始人姓名" value="孙泰英" name="name">
                                    <input type="text" placeholder="请输入创始人当前职位" value="ceo" name="position">
                                    <input type="text" placeholder="请输入创始人新浪微博地址" value="http://weimob.weibo.com" name="weibo">
                                    <textarea placeholder="请输入创始人个人简介" maxlength="500" class="c_textarea" name="remark">发放的发达范德萨范德萨范德萨发的复大发大水发生的</textarea>
                                    <div class="word_count fr">你还可以输入 <span>500</span> 字</div>
                                    <div class="clear"></div>
                                    <input type="submit" value="保存" class="btn_small">
                                    <a class="btn_cancel_s member_delete" href="javascript:void(0)">删除</a>
                                    <input type="hidden" value="11493" class="leader_id">
                                </form>
                            </div>

                            <!-- 显示创始人 -->
                            <div class="member_info">
                                <a title="编辑创始人" class="c_edit member_edit" href="javascript:void(0)"></a>
                                <div class="m_portrait">
                                    <div></div>
                                    <img width="120" height="120" alt="./company/<?php echo $company['c_linkman'];?>" src="./company/<?php echo $company['c_logo'];?>">
                                </div>
                                <div class="m_name">
                                    <?php echo $company['c_linkman'];?>
                                    <a target="_blank" class="weibo" href="http://weimob.weibo.com"></a>
                                </div>
                                <div class="m_position">ceo</div>
                                <div class="m_intro"></div>
                            </div>

                        </div><!-- end .member_wrap -->
                    </dd>
                </dl>
            </div> <!-- end #Member -->


            <!--机构深度报道-->
            <div id="Reported">
                <!--无报道-->
                <dl class="c_section c_reported">
                    <dt>
                    <h2><em></em>机构深度报道</h2>
                    <a title="添加报道" class="c_add" href="javascript:void(0)"></a>
                    </dt>
                    <dd>
                        <!-- 编辑报道 -->
                        <ul class="reset"><li>
                                <a style="" class="article" title="随便写" target="_blank" href="http://www.baidu.com">随便写</a>
                                <a title="编辑报道" class="c_edit dn" href="javascript:;" style="display: inline;"></a>
                                <form class="reportForm dn">
                                    <input type="text" placeholder="请输入文章标题" value="" name="articleTitle" class="valid">
                                    <input type="text" placeholder="请输入文章链接" value="" name="articleUrl" class="valid"><span for="articleUrl" generated="true" class="error" style="display: none;">请输入有效的文章链接</span>
                                    <input type="submit" value="保存" class="btn_small">
                                    <a class="btn_cancel_s report_delete" href="javascript:;">删除</a>
                                    <input type="hidden" value="5235" class="article_id">
                                </form>
                            </li><li>
                                <a style="" class="article" title="随便写" target="_blank" href="http://www.baidu.com">随便写</a>
                                <a title="编辑报道" class="c_edit dn" href="javascript:;" style="display: inline;"></a>
                                <form class="reportForm dn">
                                    <input type="text" placeholder="请输入文章标题" value="" name="articleTitle" class="valid">
                                    <input type="text" placeholder="请输入文章链接" value="" name="articleUrl" class="valid">
                                    <input type="submit" value="保存" class="btn_small">
                                    <a class="btn_cancel_s report_delete" href="javascript:;">删除</a>
                                    <input type="hidden" value="5236" class="article_id">
                                </form>
                            </li></ul>

                        <!-- 无报道 -->
                        <div class="addnew_right reported_info dn">
                            展示外界对机构的深度报道，<br>便于求职者了解机构！<br>
                            <a class="report_edit" href="javascript:void(0)">+添加报道</a>
                        </div>

                        <ul class="newReport dn">
                            <li>
                                <a style="display:none;" class="article" title="" target="_blank" ></a>
                                <a title="编辑报道" class="c_edit dn" href="javascript:;"></a>
                                <form class="reportForm">
                                    <input type="text" placeholder="请输入文章标题" value="" name="articleTitle">
                                    <input type="text" placeholder="请输入文章链接" value="" name="articleUrl">
                                    <input type="submit" value="保存" class="btn_small">
                                    <a class="btn_cancel_s report_cancel" href="javascript:;">取消</a>
                                    <input type="hidden" value="" class="article_id">
                                </form>
                            </li>
                        </ul>
                    </dd>
                </dl><!-- end .c_reported -->
            </div><!-- end #Reported -->

        </div>
    </div>

    <!-------------------------------------弹窗lightbox  ----------------------------------------->
    <div style="display:none;">
        <div style="width:650px;height:470px;" class="popup" id="logoUploader">
            <object width="650" height="470" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" id="FlashID">
                <param value="../../flash/avatar.swf?url=http://www.lagou.com/cd/saveProfileLogo.json" name="movie">
                <param value="high" name="quality">
                <param value="opaque" name="wmode">
                <param value="111.0.0.0" name="swfversion">
                <!-- 此 param 标签提示使用 Flash Player 6.0 r65 和更高版本的用户下载最新版本的 Flash Player。如果您不想让用户看到该提示，请将其删除。 -->
                <param value="../../Scripts/expressInstall.swf" name="expressinstall">
                <!-- 下一个对象标签用于非 IE 浏览器。所以使用 IECC 将其从 IE 隐藏。 -->
                <!--[if !IE]>-->
                <object width="650" height="470" data="../../flash/avatar.swf?url=http://www.lagou.com/cd/saveProfileLogo.json" type="application/x-shockwave-flash">
                    <!--<![endif]-->
                    <param value="high" name="quality">
                    <param value="opaque" name="wmode">
                    <param value="111.0.0.0" name="swfversion">
                    <param value="../../Scripts/expressInstall.swf" name="expressinstall">
                    <!-- 浏览器将以下替代内容显示给使用 Flash Player 6.0 和更低版本的用户。 -->
                    <div>
                        <h4>此页面上的内容需要较新版本的 Adobe Flash Player。</h4>
                        <p><a href="http://www.adobe.com/go/getflashplayer"><img width="112" height="33" src="./images/get_flash_player.gif" alt="获取 Adobe Flash Player"></a></p>
                    </div>
                    <!--[if !IE]>-->
                </object>
                <!--<![endif]-->
            </object>
        </div><!-- #logoUploader -->
    </div>
    <!------------------------------------- end ----------------------------------------->

    <script src="style/js/company.min.js" type="text/javascript"></script>
    <script>
        var avatar = {};
        avatar.uploadComplate = function( data ){
            var result = eval('('+ data +')');
            if(result.success){
                jQuery('#logoShow img').attr("src",ctx+ '/'+result.content);
                jQuery.colorbox.close();
            }
        };
    </script>
    <div class="clear"></div>
    <input type="hidden" value="d1035b6caa514d869727cff29a1c2e0c" id="resubmitToken">
    <a rel="nofollow" title="回到顶部" id="backtop" style="display: inline;"></a>
</div><!-- end #container -->


<script src="style/js/core.min.js" type="text/javascript"></script>
<script src="style/js/popup.min.js" type="text/javascript"></script>

<!--  -->


<div id="cboxOverlay" style="display: none;"></div><div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;"><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left;"></div><div id="cboxTopCenter" style="float: left;"></div><div id="cboxTopRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxMiddleLeft" style="float: left;"></div><div id="cboxContent" style="float: left;"><div id="cboxTitle" style="float: left;"></div><div id="cboxCurrent" style="float: left;"></div><button type="button" id="cboxPrevious"></button><button type="button" id="cboxNext"></button><button id="cboxSlideshow"></button><div id="cboxLoadingOverlay" style="float: left;"></div><div id="cboxLoadingGraphic" style="float: left;"></div></div><div id="cboxMiddleRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div></body></html>