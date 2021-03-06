<div id="container">
    <div class="clearfix">
        <div class="content_l">
            <form id="companyListForm" name="companyListForm" method="get" action="h/c/companylist.html">
                <input type="hidden" id="city" name="city" value="全国" />
                <input type="hidden" id="fs" name="fs" value="" />
                <input type="hidden" id="ifs" name="ifs" value="" />
                <input type="hidden" id="ol" name="ol" value="" />
                <dl class="hc_tag">
                    </dt>
                    <dd>
                        <dl>
                            <dt>公司性质：</dt>
                            <dd>
                                <?php foreach($natures as $nature){?>
                                    <a href="javascript:void(0)" sid="<?php echo $nature['n_id']?>"><?php echo $nature['n_name']?></a>
                                <?php }?>
                            </dd>
                        </dl>
                        <dl>
                            <dt>行业领域：</dt>
                            <dd>
                                <?php foreach($industry as $id){?>
                                    <a href="javascript:void(0)" sid="<?php echo $id['l_id']?>"><?php echo $id['l_name']?></a>
                                <?php }?>
                            </dd>
                        </dl>
                    </dd>
                </dl>
                <ul class="hc_list reset">
                    <?php foreach($companys as $company){?>
                        <li >
                            <a href="?r=company/detail&id=<?php echo $company['c_id']?>" target="_blank">
                                <h3 title="<?php echo $company['u_name']?>"><?php echo $company['u_name']?></h3>
                                <div class="comLogo">
                                    <img src="./company/<?php echo $company['c_logo']?>" width="190" height="190" alt="<?php echo $company['u_name']?>" />
                                    <ul>
                                        <li><?php echo $company['u_name']?></li>
                                        <li><?php echo $company['city_name']?>，<?php echo $company['n_name']?></li>
                                    </ul>
                                </div>
                            </a>
                            <ul class="reset ctags">
                                <?php
                                $tags = explode(',',$company['c_tags']) ;
                                foreach($tags as $tag){?>
                                    <li><?php echo $tag?></li>
                                <?php }?>
                            </ul>
                        </li>
                    <?php }?>
                </ul>

                <a href="?r=company/company_list" style="color:green">更多》》</a>
            </form>
        </div>
        <div class="content_r">
            <div class="subscribe_side">
                <a href="subscribe.html" target="_blank">
                    <div class="subpos"><span>订阅</span> 职位</div>
                    <div class="c7">拉勾网会根据你的筛选条件，定期将符合你要求的职位信息发给你
                    </div>
                    <div class="count">已有
                        <em>3</em>
                        <em>4</em>
                        <em>2</em>
                        <em>1</em>
                        <em>0</em>
                        人订阅
                    </div>
                    <i>我也要订阅职位</i>
                </a>
            </div>
            <div class="greybg qrcode mt20">
                <img src="./images/companylist_qr.png" width="242" height="242" alt="拉勾微信公众号二维码" />
                <span class="c7">扫描拉勾二维码，微信轻松搜工作</span>
            </div>
            <!-- <a href="h/speed/speed3.html" target="_blank" class="adSpeed"></a> -->
            <a href="h/subject/jobguide.html" target="_blank" class="eventAd">
                <img src="./images/subject280.jpg" width="280" height="135" />
            </a>
            <a href="h/subject/risingPrice.html" target="_blank" class="eventAd">
                <img src="./images/rising280.png" width="280" height="135" />
            </a>
        </div>
    </div>

    <input type="hidden" value="" name="userid" id="userid" />

    <script type="text/javascript" src="style/js/company_list.min.js"></script>
    <script>
        $(function(){
            /*分页 */
            $('.Pagination').pager({
                currPage: 1,
                pageNOName: "pn",
                form: "companyListForm",
                pageCount: 20,
                pageSize: 5
            });
        })
    </script>
    <div class="clear"></div>
    <input type="hidden" id="resubmitToken" value="" />
    <a id="backtop" title="回到顶部" rel="nofollow"></a>
</div><!-- end #container -->
</div><!-- end #body -->


<script type="text/javascript" src="style/js/core.min.js"></script>
<script type="text/javascript" src="style/js/popup.min.js"></script>

<!--  -->

</body>
</html>