﻿<!--已投递简历状态-->
    <div id="container">
        	  	
        <div class="clearfix">
            <div class="content_l">
            	<dl class="c_delivery">
                    <dt>
                        <h1><em></em>已投递简历状态</h1>
                        <a class="d_refresh" href="?r=resume/delivery">刷新</a>
                    </dt>
                    <dd>
                    	<div class="delivery_tabs">
                    		<ul class="reset">
                    			                    			<li class="current">
                    				<a href="javascript:;"type="5">全部</a>
                    			</li>
                                <li>
                    				<a href="javascript:;" type="0">投递成功</a>
                    			</li>
                    			<li>
                    				<a href="javascript:;" type="1">被查看</a>
                    			</li>
                    			<li>
                    				<a href="javascript:;" type="2">通过初筛</a>
                    			</li>
                    			<li>
                    				<a href="javascript:;" type="3">通知面试</a>
                    			</li>
                    			<li class="last">
                    				<a href="javascript:;" type="4">不合适</a>
                    			</li>
                    		</ul>
                    	</div>
                        <form id="deliveryForm">
                            <ul class="reset my_delivery">
                               	                             	<li>
                                                              <?php     foreach($rows as $k=>$v){ ?>
                             		<div class="d_item">
                             			<h2 title="随便写">
	                                        <a target="_blank" href="#">
	                                        	<em><?php echo $v['p_name']?></em>
	                                        	<span><?php echo $v['sa_salary']?></span>
	                                    	</a>
	                                    </h2>
	                                    <div class="clear"></div>
                                            <a title="公司名称" class="d_jobname" target="_blank" href="#">
                                                <?php echo $v['u_name']?><span>[<?php echo $v['city_name']?>]</span>
                                            </a>
	                                    <span class="d_time"><?php echo $v['td_time']?></span>
	                                    <div class="clear"></div>

                               		</div><br/><br/>
                                                                <?php    } ?>
                               		                               		<div class="progress_status	dn">
	                               		                               			<ul class="status_steps">
                               				<li class="status_done status_1">1</li>
                               				<li class="status_line status_line_done"><span></span></li>
                               				<li class="status_done"><span>2</span></li>
                               				<li class="status_line status_line_done"><span></span></li>
                               				<li class="status_done"><span>3</span></li>
                               				<li class="status_line status_line_done"><span></span></li>
                               				<li class="status_done"><span>4</span></li>
                               			</ul>
                               			<ul class="status_text">
                           					<li>投递成功</li>
                           					<li class="status_text_2">简历被查看</li>
                           					<li class="status_text_3">通过初步筛选</li>
                           						                                    		<li style="margin-left: 75px;*margin-left: 60px;" class="status_text_4">不合适</li>
	                                    	                               			</ul>
                               			<ul class="status_list">
                               				    <li class="top">
                               					<div class="list_time"><em></em>2014-07-01 17:15</div>
                               					<div class="list_body">
                               						                               							简历被lixiang标记为不合适<div>您的简历已收到，但目前您的工作经历与该职位不是很匹配，因此很抱歉地通知您无法进入面试。</div>                               						                               					</div>
                               				</li>
                               				<li class="bottom">
                               					<div class="list_time"><em></em>2014-07-01 17:08</div>
                               					<div class="list_body">
                               						                               							lixiang已成功接收你的简历                               						                               					</div>
                               				</li>
                               				                               			</ul>
                               			<a class="btn_closeprogress" href="javascript:;"></a>
                               		</div>
                               		                            	</li>
                            	                            </ul>
                                                    	<input type="hidden" value="-1" name="tag">
                        	<input type="hidden" value="" name="r">
                        </form>
                    </dd>
                </dl>
            </div>	
            <div class="content_r">
            	<div class="mycenterR" id="myInfo">
            		<h2>我的信息</h2>
            		<a href="?r=resume/collect" target="_blank">我收藏的职位</a>
            		<br>
            		            		<a href="?r=resume/delivery" target="_blank">我投递的职位<span id="noticeNoPage" class="red dn">&nbsp;(0)</span></a>
            		            		<br>

            		            	</div><!--end #myInfo-->

								<div class="greybg qrcode mt20">
                	<img width="242" height="242" alt="拉勾微信公众号二维码" src="images/qr_delivery.png">
                    <span class="c7">扫描拉勾二维码，微信轻松搜工作</span>
                </div>
            </div>
       	</div>
      <input type="hidden" id="userid" name="userid" value="314873">
<div class="dn" id="recordPopBox">
	<dl>
		<dt>
			评价面试体验 
			<a class="boxclose" href="javascript:;"></a>
		</dt>
		<dd>
			<form id="recordForm">
				<input type="hidden" value="" id="recordId">
				<ul id="interviewResult" class="record_radio clearfix">
		            <li class="mr35">
		            	已收到offer
		              	<input type="radio" name="type" value="1"> 
		            </li>
		            <li>
		           	     未收到offer
		              	<input type="radio" name="type" value="2"> 
		            </li>
		        </ul>
		        <div class="dividebtm">
		        	<table>
		        		<tbody><tr>
                         	<td width="80" valign="top" align="right">面试评分：</td>
                         	<td>
                         		<ul id="recordStarSelect">
                         			<li></li>
                         			<li></li>
                         			<li></li>
                         			<li></li>
                         			<li></li>
                         		</ul>
                             	<input type="hidden" id="recordStar" value="" name="recordStar">
                             	<div class="clear"></div>
                            </td>
                        </tr>
                     	<tr>
                         	<td valign="top" align="right" class="dividebtman">面试短评：</td>
                         	<td>
                         		
                             	<input type="hidden" class="error" id="select_record_hidden" value="" name="record">
                                <input type="text" autocomplete="off" placeholder="15字以内对面试的简单描述哦" id="select_record" class="selectr_340" maxlength="15">                                      
                                <div class="boxUpDownan boxUpDown_340 dn" id="box_record" style="display: none;">
                                  <ul>
                                    <p>热门短评：</p>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                  </ul>
                            	</div>
                            </td>
                        </tr>
                        <tr>
                         	<td valign="top" align="right" class="dividebtman">面试经历：</td>
                         	<td>
                         		<textarea id="interviewDesc" placeholder="记录下自己的面试经历" style="width: 320px;"></textarea>
                         		<div class="word_count">你还可以输入 <span>500</span> 字</div>
                         		<div id="showName" class="f14 c7">
                         			<label class="checkbox">
		                        		<input type="checkbox">
		                                <i></i>
		                        	</label>
                         			匿名提交
                         		</div>
                         		<input type="hidden" value="" id="isShowName">
                         		<input type="hidden" value="" id="senduid">
                         		<input type="hidden" value="" id="poid">
                         		<input type="hidden" value="" id="deid">
                            </td>
                        </tr>
                        <tr>
                         	<td align="right" colspan="2">
                         		<input type="submit" value="确认提交" class="submitRecord btn_small">
                         	</td>
                        </tr>
                	</tbody></table>
		        </div>
			</form>
		</dd>
	</dl>
</div><!-- end #recordPopBox -->
<script src="style/js/delivery.js"></script>
<script>
$(function(){
	//location.reload(true);

	$('.Pagination').pager({
	      currPage: 1,
	      pageNOName: "pageNo",
	      form: "deliveryForm",
	      pageCount: 1,
	      pageSize:  5
	});
});
</script>
			<div class="clear"></div>
			<input type="hidden" value="" id="resubmitToken">
	    	<a rel="nofollow" title="回到顶部" id="backtop" style="display: none;"></a>
	    </div><!-- end #container -->
	</div><!-- end #body -->


<script src="style/js/core.min.js" type="text/javascript"></script>
<script src="style/js/popup.min.js" type="text/javascript"></script>

<!--  -->

<script type="text/javascript">
$(function(){
	$('#noticeDot-1').hide();
	$('#noticeTip a.closeNT').click(function(){
		$(this).parent().hide();
	});
});
var index = Math.floor(Math.random() * 2);
var ipArray = new Array('42.62.79.226','42.62.79.227');
var url = "ws://" + ipArray[index] + ":18080/wsServlet?code=314873";
var CallCenter = {
		init:function(url){
			var _websocket = new WebSocket(url);
			_websocket.onopen = function(evt) {
				console.log("Connected to WebSocket server.");
			};
			_websocket.onclose = function(evt) {
				console.log("Disconnected");
			};
			_websocket.onmessage = function(evt) {
				//alert(evt.data);
				var notice = jQuery.parseJSON(evt.data);
				if(notice.status[0] == 0){
					$('#noticeDot-0').hide();
					$('#noticeTip').hide();
					$('#noticeNo').text('').show().parent('a').attr('href',ctx+'/mycenter/delivery.html');
					$('#noticeNoPage').text('').show().parent('a').attr('href',ctx+'/mycenter/delivery.html');
				}else{
					$('#noticeDot-0').show();
					$('#noticeTip strong').text(notice.status[0]);
					$('#noticeTip').show();
					$('#noticeNo').text('('+notice.status[0]+')').show().parent('a').attr('href',ctx+'/mycenter/delivery.html');
					$('#noticeNoPage').text(' ('+notice.status[0]+')').show().parent('a').attr('href',ctx+'/mycenter/delivery.html');
				}
				$('#noticeDot-1').hide();
			};
			_websocket.onerror = function(evt) {
				console.log('Error occured: ' + evt);
			};
		}
};
CallCenter.init(url);
</script>

<div id="cboxOverlay" style="display: none;"></div><div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;"><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left;"></div><div id="cboxTopCenter" style="float: left;"></div><div id="cboxTopRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxMiddleLeft" style="float: left;"></div><div id="cboxContent" style="float: left;"><div id="cboxTitle" style="float: left;"></div><div id="cboxCurrent" style="float: left;"></div><button type="button" id="cboxPrevious"></button><button type="button" id="cboxNext"></button><button id="cboxSlideshow"></button><div id="cboxLoadingOverlay" style="float: left;"></div><div id="cboxLoadingGraphic" style="float: left;"></div></div><div id="cboxMiddleRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div></body></html>