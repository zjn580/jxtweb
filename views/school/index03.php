﻿<!--机构介绍-->
    <div id="container">
           
        <div class="content_mid">
            <dl class="c_section c_section_mid">
                <dt>
                    <h2><em></em>填写机构信息</h2>
                    <a class="c_addjob" href="?r=school/add_member"><i></i>添加学员信息</a>
                </dt>
                <dd>
                	<div class="c_text">资深大牛、实战项目、专业人才、…用优势吸引公司吧！</div>
                 	<img width="668" height="56" class="c_steps" alt="第五步" src="./images/step5.png">
                    <!-- action="http://www.lagou.com/c/saveProfile.json" -->
                    <form method="post" action="index.php?r=school/insertintro" id="infoForm">
                    	<input type="hidden" name="companyId" value="25927">
                        <h3>机构介绍</h3> 
                        <textarea placeholder="请分段详细描述机构简介、企业文化等" name="companyProfile" id="companyProfile"></textarea>	
                        <div class="word_count">你还可以输入 <span>1000</span> 字</div>
                    	<div class="clear"></div>
                    	<input type="button" id="step5Submit" value="保存，完成" class="btn_big fr">
                    </form>
                </dd>
            </dl>
       	</div>
<script src="style/js/schoolstep5.min.js" type="text/javascript"></script>

			<div class="clear"></div>
			<input type="hidden" value="" id="resubmitToken">
	    	<a rel="nofollow" title="回到顶部" id="backtop" style="display: none;"></a>
	    </div><!-- end #container -->
	</div><!-- end #body -->
	

<script src="style/js/core.min.js" type="text/javascript"></script>
<script src="style/js/popup.min.js" type="text/javascript"></script>

<!--  -->


<div id="cboxOverlay" style="display: none;"></div><div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;"><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left;"></div><div id="cboxTopCenter" style="float: left;"></div><div id="cboxTopRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxMiddleLeft" style="float: left;"></div><div id="cboxContent" style="float: left;"><div id="cboxTitle" style="float: left;"></div><div id="cboxCurrent" style="float: left;"></div><button type="button" id="cboxPrevious"></button><button type="button" id="cboxNext"></button><button id="cboxSlideshow"></button><div id="cboxLoadingOverlay" style="float: left;"></div><div id="cboxLoadingGraphic" style="float: left;"></div></div><div id="cboxMiddleRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div></body></html>