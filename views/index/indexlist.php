 <div id="hotList">
	            <ul class="hot_pos reset">
	           
	            <?php foreach($arr as $k=>$v){?>
	            	<li class="clearfix">
		            		<div class="hot_pos_l">
			                    <div class="mb10">
		                        	<a href="
		                        	" target="_blank"><?php echo $v['p_name']; ?></a> 
		                            &nbsp;
		                            <span class="c9">[<?php echo $v['p_address']; ?>]</span>
			                    </div>
			                        <span><em class="c7">月薪： </em><?php echo $v['sa_salary']; ?></span>
			                        <span><em class="c7">经验：</em><?php echo $v['ex_experience']; ?></span>
			                        <span><em class="c7">最低学历： </em><?php echo $v['e_name']; ?></span>
			                        <br />
			                        <span><em class="c7">职位诱惑：</em><?php echo $v['p_temptation']; ?></span>
			                        <br />
				                    <span><?php
				                    	$now = time(); 
				                    	$guonian=ceil(($now-$v['p_time'])/86400); //60s*60min*24h   
										echo "已发布<strong>$guonian</strong>天！";
				                     ?></span>
			                        <!-- <a  class="wb">分享到微博</a> -->
                            </div>
		                	<div class="hot_pos_r">
		                    	<div class="mb10 recompany"><a href="h/c/399.html" target="_blank"><?php echo $v['p_email']; ?></a></div>
		                        <span><em class="c7">领域：</em> <?php echo $v['p_name']; ?></span>
		                        <span><em class="c7">创始人：</em><?php echo $v['c_linkman']; ?></span>
		                        <br />
		                        <span><em class="c7">电话：</em><?php echo $v['c_phone']; ?></span>
		                        <span><em class="c7">公司地址：</em><?php echo $v['city_name']; ?></span>
		                        <ul class="companyTags reset">
		                			<li><?php echo $v['c_tags']; ?></li>
		                        </ul>
		                    </div>
		                </li>
		            <?php } ?>
	                <a href="?r=index/index" class="btn fr" target="_blank">返回</a>
	            </ul>
            </div>