<!--填写公司信息 创始团队-->
    <div id="container">
          
        <div class="content_mid">
            <dl class="c_section c_section_mid">
                <dt>
                    <h2><em></em>填写公司信息</h2>
                    <a class="c_addjob" href="create.html"><i></i>发布新职位</a>
                </dt>
                <dd>
                	<div class="c_text">展示强劲的创始团队，让求职者跟随而来吧！</div>
                 	<img width="668" height="56" class="c_steps" alt="第三步" src="style/images/step3.png">
                    
                    <form method="post" action="http://www.lagou.com/cl/saveLeaderInfos.json" id="memberForm">
                    	<input type="hidden" value="52346c62232045a8ab1d45cb3e0540b7" name="resubmitToken">
                   	 	<input type="hidden" id="companyId" name="companyId" value="25927">
	                    <div id="memberDiv">
		                    <div class="formWrapper">
		                    	<input type="hidden" value="25927" name="leaderInfos[0].companyId">
		                        <div class="new_portrait">
		                            <div class="portrait_upload" id="portraitNo0">
		                                <span>上传创始人头像</span>
		                            </div>
		                            <div class="portraitShow dn" id="portraitShow0">
			                        	<img width="120" height="120" src="">
			                        	<span>更换头像</span>
			                        </div>
			                        <input type="file" value="" title="支持jpg、jpeg、gif、png格式，文件小于5M" onchange="img_check(this,'http://www.lagou.com/c/upload.json',120,120,5,'myfiles0','myfiles0_error','portraitNo0','portraitShow0','type0','leaderInfos0');" name="myfiles" id="myfiles0" class="myfiles">
			                    	<input type="hidden" value="7" name="type" id="type0">
			                    	<input type="hidden" name="leaderInfos[0].photo" id="leaderInfos0">
		                            <em>
								                                尺寸：120*120px <br> 	
								                                大小：小于5M
		                            </em>
		                            <span style="display:none;" id="myfiles0_error" class="error"></span>
		                        </div>
		                        
		                        
		                        <h3>创始人姓名</h3>
		                        <input type="text" placeholder="请输入创始人姓名" name="leaderInfos[0].name" id="name0" class="s_input1 valid">	
		                        
		                        <h3>当前职位</h3>
		                        <input type="text" placeholder="请输入当前职位，如：创始人兼CEO" name="leaderInfos[0].position" id="position0" class="s_input1 valid">	
		                        
		                        <h3>新浪微博</h3>
		                        <input type="text" placeholder="请输入创始人新浪微博地址" name="leaderInfos[0].weibo" id="weibo0">	
		                        
		                        <h3>创始人简介</h3> 
		                        <textarea placeholder="请输入该创始人的个人履历等，建议按照时间倒序分条展示" maxlength="1000" name="leaderInfos[0].remark" id="description0"></textarea>	
		                        <div class="word_count">你还可以输入 <span>500</span> 字</div>
		                    </div>
	                    </div>
                    	<a id="addMember" class="add_member" href="javascript:void(0)"><i></i>继续添加创始团队</a>
                   		<div class="clear"></div>
                    	<input type="submit" value="保存，下一步" id="step3Submit" class="btn_big fr">
                    	<a class="btn_cancel fr" href="http://www.lagou.com/c/product.html">跳过</a>
                    </form>
                </dd>
            </dl>
       	</div>
    
 
<script src="style/js/step3.min.js" type="text/javascript"></script>
			<div class="clear"></div>
			<input type="hidden" value="52346c62232045a8ab1d45cb3e0540b7" id="resubmitToken">
	    	<a rel="nofollow" title="回到顶部" id="backtop" style="display: inline;"></a>
	    </div><!-- end #container -->
	</div><!-- end #body -->


<script src="style/js/core.min.js" type="text/javascript"></script>
<script src="style/js/popup.min.js" type="text/javascript"></script>

<!--  -->


<div id="cboxOverlay" style="display: none;"></div><div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;"><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left;"></div><div id="cboxTopCenter" style="float: left;"></div><div id="cboxTopRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxMiddleLeft" style="float: left;"></div><div id="cboxContent" style="float: left;"><div id="cboxTitle" style="float: left;"></div><div id="cboxCurrent" style="float: left;"></div><button type="button" id="cboxPrevious"></button><button type="button" id="cboxNext"></button><button id="cboxSlideshow"></button><div id="cboxLoadingOverlay" style="float: left;"></div><div id="cboxLoadingGraphic" style="float: left;"></div></div><div id="cboxMiddleRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div></body></html>