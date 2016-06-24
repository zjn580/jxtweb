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
                <form id="stepForm" action="?r=school/do_basic_insert" method="post" enctype="multipart/form-data">
                    <div class="c_text_1">基本信息为必填项，是公司加速了解机构的窗口，认真填写吧！</div>
                    <img width="668" height="56" class="c_steps" alt="第一步" src="images/step1.png">

                    <h3>机构全称 </h3>
                    <input type="text" placeholder="请输入机构名称，如:拉勾" value="" name="name" id="name" class="valid">
                    <h3>机构简称</h3> <!--非必填-->
                    <input type="text" placeholder="请输入机构简称，如:拉勾" value="" name="name" id="name" class="valid">

                    <h3>机构网址</h3>
                    <input type="text" placeholder="请输入机构网址" value="" name="website" id="website">

                    <h3>所在城市</h3>
                    <input type="text" placeholder="请输入工作城市，如：北京" name="city" id="city">



                    <h3>机构规模</h3>
                    <div>
                        <input type="hidden" value="" name="select_scale_hidden" id="select_scale_hidden">
                        <input type="button" value="请选择机构规模" id="select_scale" class="select">
                        <div class="dn" id="box_scale" style="display: none;">
                            <ul class="reset">
                                <?php

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
                            <?php

                            foreach($natures as $nature){ ?>

                                <li style="width:90px;height: 40px" id="<?= $nature['n_id']?>"><?= $nature['n_name']?></li>

                            <?php
                            }
                            ?>
                        </ul>
                    </div>

                    <h3>行业领域</h3>
                    <div>
                        <input type="hidden" value="" name="select_industry_hidden" id="select_industry_hidden">
                        <input type="button" value="请选择行业领域" name="industry" id="select_industry" class="select">
                        <div class="dn" id="box_industry" style="display: none;">
                            <?php
                            foreach($ids as $industry){ ?>
                                <ul class="reset">
                                    <li id="<?= $industry['l_id']?>"><?= $industry['l_name']?></li>
                                </ul>
                            <?php
                            }
                            ?>

                        </div>
                    </div>

                    <input type="hidden" id="companyId" name="companyId" value="25927">


                    <input type="submit" value="保存，下一步" id="stepBtn" class="btn_big fr">
                </form>
            </dd>
        </dl>
    </div>

    <!-- -----------------------------------弹窗lightbox  --------------------------------------- -->

    <!-- ----------------------------------- end --------------------------------------- -->

    <script src="style/js/schoolstep1.min.js" type="text/javascript"></script>

    <div class="clear"></div>

    <a rel="nofollow" title="回到顶部" id="backtop" style="display: none;"></a>
</div><!-- end #container -->
</div><!-- end #body -->


<script src="style/js/core.min.js" type="text/javascript"></script>
<script src="style/js/popup.min.js" type="text/javascript"></script>

<!--  -->


<div id="cboxOverlay" style="display: none;"></div>
<div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;">
    <div id="cboxWrapper">
        <div>
            <div id="cboxTopLeft" style="float: left;"></div>
            <div id="cboxTopCenter" style="float: left;"></div>
            <div id="cboxTopRight" style="float: left;"></div>
        </div>
        <div style="clear: left;">
            <div id="cboxMiddleLeft" style="float: left;"></div>
            <div id="cboxContent" style="float: left;">
                <div id="cboxTitle" style="float: left;"></div>
                <div id="cboxCurrent" style="float: left;"></div>
                <button type="button" id="cboxPrevious"></button>
                <button type="button" id="cboxNext"></button>
                <button id="cboxSlideshow"></button>
                <div id="cboxLoadingOverlay" style="float: left;"></div>
                <div id="cboxLoadingGraphic" style="float: left;"></div>
            </div>
            <div id="cboxMiddleRight" style="float: left;"></div>
        </div>
        <div style="clear: left;">
            <div id="cboxBottomLeft" style="float: left;"></div>
            <div id="cboxBottomCenter" style="float: left;"></div>
            <div id="cboxBottomRight" style="float: left;"></div>
        </div>
    </div>
    <div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div>
</div>
</body>
</html>