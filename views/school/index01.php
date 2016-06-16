<!--机构基本信息-->
<div id="container">

    <div style="" id="stepTip">

    </div>
    <div class="content_mid">
        <dl class="c_section c_section_mid">
            <dt>
            <h2><em></em>填写机构信息</h2>
            </dt>
            <dd>
                <form id="stepForm" action="?r=index/index">
                    <div class="c_text_1">基本信息为必填项，是公司加速了解机构的窗口，认真填写吧！</div>
                    <img width="668" height="56" class="c_steps" alt="第一步" src="images/step1.png">

                    <h3>机构全称 </h3>
                    <input type="text" placeholder="请输入机构名称，如:拉勾" value="" name="name" id="name" class="valid">
                    <h3>机构简称</h3> <!--非必填-->
                    <input type="text" placeholder="请输入机构简称，如:拉勾" value="" name="name" id="name" class="valid">

                    <h3>机构LOGO</h3> <!--非必填改必填-->
                    <div class="c_logo c_logo_pos">
                        <a title="上传机构LOGO" class="inline cboxElement" href="#logoUploader">
                            <div id="logoNo">
                                <span>上传机构LOGO</span> <br>
                                尺寸：190*190px  <br>
                                大小：小于5M
                            </div>
                            <div class="dn" id="logoShow">
                                <img width="190" height="190" alt="机构logo" src="">
                                <span>更换机构LOGO<br>190px*190px 小于5M</span>
                            </div>
                        </a>
                    </div>

                    <h3>机构网址</h3>
                    <input type="text" placeholder="请输入机构网址" value="" name="website" id="website">

                    <h3>所在城市</h3>
                    <input type="text" placeholder="请输入工作城市，如：北京" name="city" id="city">

                    <h3>行业领域</h3>
                    <div>
                        <input type="hidden" value="" name="select_industry_hidden" id="select_industry_hidden">
                        <input type="button" value="请选择行业领域" name="select_industry" id="select_industry" class="select">
                        <div class="dn" id="box_industry" style="display: none;">
                            <?php
                            foreach($ids as $industry){ ?>
                                <ul class="reset">
                                    <li><?= $industry['l_name']?></li>
                                </ul>
                            <?php
                            }
                            ?>

                        </div>
                    </div>

                    <h3>机构规模</h3>
                    <div>
                        <input type="hidden" value="" name="select_scale_hidden" id="select_scale_hidden">
                        <input type="button" value="请选择机构规模" id="select_scale" class="select">
                        <div class="dn" id="box_scale" style="display: none;">
                            <ul class="reset"><?php

                                foreach($scales as $scale){ ?>

                                    <li id="<?= $scale['scale_id']?>"><?= $scale['scale_size']?></li>

                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>

                    <h3>机构性质</h3>
                    <div>
                        <input type="hidden" id="s_radio_hidden" name="s_radio_hidden" value="">
                        <ul class="s_radio clearfix s_radio_ex">
                            <li>私营</li>
                            <li>个人</li>

                        </ul>
                    </div>


                    <h3>一句话介绍</h3>
                    <input type="text" placeholder="一句话概括机构亮点，如机构愿景、领导团队等，限50字" maxlength="50" name="temptation" id="temptation">
                    <span style="display:none;" class="error" id="beError"></span>
                    <input type="hidden" id="companyId" name="companyId" value="25927">
                    <input type="hidden" id="companyName" name="companyName" value="福建平潭协创进出口贸易有限机构">
                    <input type="submit" value="保存，下一步" id="stepBtn" class="btn_big fr">
                </form>
            </dd>
        </dl>
    </div>

    <!-- -----------------------------------弹窗lightbox  --------------------------------------- -->
    <div style="display:none;">
        <!--图片上传-->
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
                        <p><a href="http://www.adobe.com/go/getflashplayer"><img width="112" height="33" src="style/images/get_flash_player.gif" alt="获取 Adobe Flash Player"></a></p>
                    </div>
                    <!--[if !IE]>-->
                </object>
                <!--<![endif]-->
            </object>
        </div><!-- #logoUploader -->
    </div>
    <!-- ----------------------------------- end --------------------------------------- -->

    <script src="style/js/step1.min.js" type="text/javascript"></script>
    <script>
        var avatar = {};
        avatar.uploadComplate = function( data ){
            var result = eval('('+ data +')');
            if(result.success){
                jQuery('#logoShow img').attr("src",ctx+ '/'+result.content);
                jQuery.colorbox.close();
                jQuery('#logoNo').hide();
                jQuery('#logoShow').show();
            }
        };
    </script>
    <div class="clear"></div>
    <input type="hidden" value="13ae35fedd9e45cdb66fb712318d7369" id="resubmitToken">
    <a rel="nofollow" title="回到顶部" id="backtop" style="display: none;"></a>
</div><!-- end #container -->
</div><!-- end #body -->


<script src="style/js/core.min.js" type="text/javascript"></script>
<script src="style/js/popup.min.js" type="text/javascript"></script>

<!--  -->


<div id="cboxOverlay" style="display: none;"></div><div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;"><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left;"></div><div id="cboxTopCenter" style="float: left;"></div><div id="cboxTopRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxMiddleLeft" style="float: left;"></div><div id="cboxContent" style="float: left;"><div id="cboxTitle" style="float: left;"></div><div id="cboxCurrent" style="float: left;"></div><button type="button" id="cboxPrevious"></button><button type="button" id="cboxNext"></button><button id="cboxSlideshow"></button><div id="cboxLoadingOverlay" style="float: left;"></div><div id="cboxLoadingGraphic" style="float: left;"></div></div><div id="cboxMiddleRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div></body></html>