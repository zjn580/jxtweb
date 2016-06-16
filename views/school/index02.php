<!--填写机构学员-->
    <div id="container">
            	
        <div class="content_mid">
            <dl class="c_section c_section_mid">
                <dt>
                    <h2><em></em>填写机构信息</h2>
                    <a class="c_addjob" href="?r=school/add_member"><i></i>添加学员</a>
                </dt>
                <dd>
                	<div class="c_text">需求量大,技术含量高的专业是吸引公司的制胜法宝哦！</div>
                 	<img width="668" height="56" class="c_steps" alt="第四步" src="./images/step4.png">
                    
                    <form method="post" action="http://www.lagou.com/cp/saveCompanyProducts.json" id="productForm">
                    	<input type="hidden" value="8f79f658e49846ae89d90a3f1590f12e" name="resubmitToken">
                    	<input type="hidden" id="companyId" name="companyId" value="25927">
                    	<div id="productDiv">
		                    <div class="formWrapper">
		                    	<input type="hidden" value="25927" name="productInfos[0].companyId">
		                        <h3>专业海报</h3>
		                        <div class="new_product mt20">
		                            <div id="productNo0" class="product_upload">
		                                <div style="background-color: rgb(147, 183, 187);">
		                                	<span>上传专业图片</span> 
		                                    <br>	
		                                   		 尺寸：380*220px  	大小：小于5M
		                                </div>
		                            </div>
		                            <div id="productShow0" class="product_upload dn productShow">
			                        	<img width="380" height="220" src="">
			                        	<span>更换专业图片<br>380*220px 小于5M</span>
			                        </div>
			                        <input type="file" title="支持jpg、jpeg、gif、png格式，文件小于5M" onchange="img_check(this,'http://www.lagou.com/c/upload.json',380,220,5,'myfiles0','myfiles0_error','productNo0','productShow0','type0','productInfos0');" name="myfiles" id="myfiles0">
			                    	<input type="hidden" value="3" name="productInfos[0].type" id="type0"> 
			                    	<input type="hidden" name="productInfos[0].productPicUrl" id="productInfos0">   
			                    </div>
			                   	<span style="display:none;" id="myfiles0_error" class="error"></span>
			                    
		                        <h3>专业名称</h3>
		                        <input type="text" placeholder="请输入专业名称" name="productInfos[0].product" id="name0">	
		                        
		                        <h3>专业人员</h3>
		                        <input type="text" placeholder="请输入专业人数" name="productInfos[0].productUrl" id="address0">	
		                        
		                        <h3>专业简介</h3> 
		                        <textarea placeholder="请简短描述该专业定位、专业特色、用户群体等" maxlength="1000" name="productInfos[0].productProfile" id="description0"></textarea>	
		                        <div class="word_count">你还可以输入 <span>500</span> 字</div>
		                    </div>
	                    </div>
                    	<a id="addMember" class="add_member" href="javascript:void(0)"><i></i>继续添加机构学员</a>
                   		<div class="clear"></div>
                    	<input type="submit" value="保存，下一步" id="step4Submit" class="btn_big fr">
                    	<a class="btn_cancel fr" href="http://www.jxt.com/web/?r=school/info05">跳过</a>
                    </form>
                </dd>
            </dl>
       	</div>
    
<script src="style/js/step4.min.js" type="text/javascript"></script>        	
			<div class="clear"></div>
			<input type="hidden" value="8f79f658e49846ae89d90a3f1590f12e" id="resubmitToken">
	    	<a rel="nofollow" title="回到顶部" id="backtop" style="display: none;"></a>
	    </div><!-- end #container -->
	</div><!-- end #body -->
	

<script src="style/js/core.min.js" type="text/javascript"></script>
<script src="style/js/popup.min.js" type="text/javascript"></script>

<!--  -->


<div id="cboxOverlay" style="display: none;"></div><div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;"><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left;"></div><div id="cboxTopCenter" style="float: left;"></div><div id="cboxTopRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxMiddleLeft" style="float: left;"></div><div id="cboxContent" style="float: left;"><div id="cboxTitle" style="float: left;"></div><div id="cboxCurrent" style="float: left;"></div><button type="button" id="cboxPrevious"></button><button type="button" id="cboxNext"></button><button id="cboxSlideshow"></button><div id="cboxLoadingOverlay" style="float: left;"></div><div id="cboxLoadingGraphic" style="float: left;"></div></div><div id="cboxMiddleRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div></body></html>