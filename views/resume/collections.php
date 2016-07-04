<!--我收藏的职位-->
    <div id="container">
        	  	
        <div class="clearfix">
            <div class="content_l">
            	<dl class="c_collections">
                    <dt>
                        <h1><em></em>我收藏的职位</h1>
                    </dt>
                    <dd>
                    	<form id="collectionsForm">
                            <ul class="reset my_collections">
                                <?php foreach($rows as $k=>$v){ ?>
                               	 <li data-id="133340" class="remove">
                             		<a title="携程旅行网" target="_blank" href="h/c/6636.html">
                             			<img alt="携程旅行网" src="./company/<?php echo $v['c_logo']?>">
                             		</a>
                             		<div class="co_item">
                             			<h2 title="">
	                                        <a target="_blank" href="h/jobs/133340.html">
	                                        	<em><?php echo $v['p_name']?></em>
	                                        	<span><?php echo $v['sa_salary']?></span>
	                                    	</a>
	                                    </h2>
	                                    <span class="co_time"><?php echo $v['p_time']?></span>
	                                    <div class="co_cate"><?php echo $v['u_name']?> / <?php echo $v['city_name']?> / <?php echo $v['ex_experience']?> / <?php echo $v['e_name']?></div>
	                                    <span class="co_youhuo c7"><?php echo $v['p_content']?> </span>
                                        <a class="collection_link" target="_blank" id="throw" pid="<?php echo $v['p_id']?>">投个简历</a>
                                        <i></i>
                                        <a class="collectionCancel collection_link collected" id="cancel" pid="<?php echo $v['p_id']?>">取消收藏</a>
                               		</div><br/><br/>
                            	</li>
                                <?php } ?>
                            </ul>
                        </form>
                                            </dd>
                </dl>
            </div>	
            <div class="content_r">
            	<div class="mycenterR" id="myInfo">
            		<h2>我的信息</h2>
                    <img src="<?php echo $portrait; ?>" height="120px" width="150px" />

            		            	</div><!--end #myInfo-->
            					<div class="greybg qrcode mt20">
                	<img width="242" height="242" alt="拉勾微信公众号二维码" src="images/qr_delivery.png">
                    <span class="c7">扫描拉勾二维码，微信轻松搜工作</span>
                </div>
            </div>
       	</div>
<script src="style/js/collections.min.js"></script>
<script>
$(function(){
	$('.Pagination').pager({
	      currPage: 1,
	      pageNOName: "pageNo",
	      form: "collectionsForm",
	      pageCount: 1,
	      pageSize:  5
	});
});
</script>
			<div class="clear"></div>
			<input type="hidden" value="4c6ae41d8c254f91becdb5f9ef2d4394" id="resubmitToken">
	    	<a rel="nofollow" title="回到顶部" id="backtop"></a>
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

<script>
    //删除收藏的职位
    $('.collectionCancel').click(function() {
        var p_id = $(this).attr('pid');
        $.ajax({
            type:'POST',
            url:'?r=resume/cancel',
            data:'p_id='+p_id,
            success:function(msg){
                if(msg==1){
                    $('a[pid='+p_id+']').parents('.remove').remove();
                }
            }
        })
    })

    //投简历
    $('.collection_link').click(function(){
        var p_id = $(this).attr('pid');
        $.ajax({
            type:'POST',
            url:'?r=resume/throw',
            data:'p_id='+p_id,
            success:function(msg){
                if(msg==2){
                    alert('投递成功');
                }else if(msg==0){
                    alert('请勿重复投递');
                }
            }
        })
    })

</script>