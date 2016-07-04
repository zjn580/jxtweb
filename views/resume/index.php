<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
    <div id="container">
        
  		<div class="clearfix">
            <div class="content_l">
            	<div class="fl" id="resume_name">
	            	<div class="nameShow fl">
	            		<h1 title="jason的简历"><?php echo "{$resume_name}"?>的简历</h1>
	            		<a target="_blank" href="?r=resume/preview">预览</a>
            		</div>
            		<form class="fl dn" id="resumeNameForm">
            			<input type="text" value="jason的简历" name="resumeName" class="nameEdit c9">	
            			<input type="submit" value="保存"> | <a target="_blank" href="h/resume/preview.html">预览</a>
            		</form>
            	</div><!--end #resume_name-->
            	<div id="resumeScore">
            		<div class="score fl">
            			<canvas height="120" width="120" id="doughnutChartCanvas" style="width: 120px; height: 120px;"></canvas>
           				<div style="" class="scoreVal"><span>100</span>分</div>
            		</div>
            		
            		<div class="which fl">
            			<div>工作经历最能体现自己的工作能力，且完善后才可投递简历哦！</div>
            										<span rel="workExperience"><a>完善信息</a></span>
						            		</div>
            	</div><!--end #resumeScore-->

                <div class="profile_box" id="basicInfo">
                    <div id="qwe">
                        <h2>基本信息</h2>
                        <span class='c_edit'></span>
                        <div class='basicShow'>
                            <?php  foreach($basic as $key=>$value){ ?>
                            <div class='basic'>
                                    姓名：<span id='u_name'><?php echo $value['u_name']?></span>|
                                    性别：<span id='pe_sex'><?php echo $value['pe_sex']?></span>|
                                    学历：<span id='e_name'><?php echo $value['e_name']?></span>|<br/>
                                    经验：<span id='jingyan'><?php echo $value['ex_experience']?></span>|
                                    电话：<span id='pe_phone'><?php echo $value['pe_phone']?></span>|<br/>
                                    邮箱：<span id='youxiang'><?php echo $value['email']?></span>|<br/>
                                    状态：<span id='status_name'><?php echo $value['status_name']?></span>|
                            </div>
                            <?php } ?>

                            <div class="m_portrait">
                                <div></div>
                                <img width="120" height="120" alt="jason" src="<?php echo $portrait; ?>">
                            </div>
                        </div>
                    </div>

            		<div class="basicEdit dn" id="profileForm" >
                        <?php  foreach($basic as $key=>$value){ ?>
						   <table>
						    <tbody>
                            <tr>
						      <td valign="top">
						        <span class="redstar">*</span>
						      </td> 
						      <td>
						        <input type="text" placeholder="姓名" value="" name="u_name" id="name" >
						      </td>
						      <td valign="top"></td>
						      <td>
						          <ul class="profile_radio clearfix reset">
						            <li class="current">
						           	  	 男<em></em>
						              	<input type="radio"  name="pe_sex" value="男">
						            </li>
						            <li>
						            	  女<em></em>
						              	<input type="radio" name="pe_sex" value="女">
						            </li>
						          </ul>
						      </td>
						    </tr>
						    <tr>
						      <td valign="top">
						        <span class="redstar">*</span>
						      </td>
						      <td>
						      	<input type="hidden" id="topDegree" value="大专" name="e_id">
						        <input type="button" value="大专" id="select_topDegree" class="profile_select_190 profile_select_normal">
								<div class="boxUpDown boxUpDown_190 dn" id="box_topDegree" style="display: none;">
						        	<ul>
						        	<?php
						        		foreach ($arr1 as $key => $value){
						        	?>
					        			<li><?php echo $value['e_name']?></li>
				        			<?php
				        				}
				        			?>
						        	</ul>
						        </div>
						      </td>
						      <td valign="top">
						        <span class="redstar">*</span>
						      </td>
						      <td>
						          <input type="hidden" id="workyear" value="" name="ex_id">
						          <input type="button" value="" id="select_workyear" class="profile_select_190 profile_select_normal">
								  <div class="boxUpDown boxUpDown_190 dn" id="box_workyear" style="display: none;">
						          	 <ul>
						          	 	<?php
						        		foreach ($arr as $key => $value){
						        	?>
						          	 	  <li><?php echo $value['ex_experience']?></li>
						          	 	  	<?php
				        				}
				        			?>
						        	 </ul>
						          </div>
						      </td>
						    </tr>
						    <tr>
						      <td valign="top">
						        <span class="redstar">*</span>
						      </td>
						      <td colspan="3">
						          <input type="text" placeholder="手机号码" value="18644444444" name="pe_phone" id="tel">
						      </td>
						   	</tr>
						   	<tr>
						      <td valign="top">
						        <span class="redstar">*</span>
						      </td>
						      <td colspan="3">
						          <input type="text" placeholder="接收面试通知的邮箱" value="jason@qq.com" name="email" id="email">
						      </td>
						    </tr>
						    <tr>
						      <td valign="top"> </td>
						      <td colspan="3">
						          <input type="hidden" id="currentState" value="" name="status_id">
						          <input type="button" value="目前状态" id="select_currentState" class="profile_select_410 profile_select_normal">
								  <div class="boxUpDown boxUpDown_410 dn" id="box_currentState" style="display: none;">
						          	  <ul>
                                          <?php
                                          foreach($status as $key=>$value){
                                              ?>
                                              <li><?php echo $value['status_name']?></li>
                                          <?php
                                          }
                                          ?>
						        	  </ul>
						          </div>
						      </td>
						    </tr>
						    <tr>
						      <td></td>
						      <td colspan="3">
						          <input type="button" value="保 存" class="btn_profile_save" id="basic1">
						          <a class="btn_profile_cancel" href="javascript:;">取 消</a>
						      </td>
						    </tr>
						  </tbody>
                          </table>
                        <?php }?>
						<!--end #profileForm-->
						<div class="new_portrait">
						  <div class="portrait_upload" id="portraitNo">
						      <span>上传自己的头像</span>
						  </div>
						  <div class="portraitShow dn" id="portraitShow">
						    <img width="120" height="120" src="">
						    <span>更换头像</span>
						  </div>
						  <input type="file" title="支持jpg、jpeg、gif、png格式，文件小于5M" onchange="img_check(this,'?r=resume/upload','headPic');" name="headPic" id="headPic" class="myfiles">
							<!-- <input type="hidden" id="headPicHidden" /> -->
						  	<em>
						                  尺寸：120*120px <br>
						                  大小：小于5M
						  	</em>
						  	<span style="display:none;" id="headPic_error" class="error"></span>
						</div><!--end .new_portrait-->
            		</div><!--end .basicEdit-->
                    <?php  foreach($basic as $key=>$value){ ?>
            		<input type="hidden" id="nameVal" value="<?php echo $value['u_name']?>">
            		<input type="hidden" id="genderVal" value="<?php echo $value['pe_sex']?>">
            		<input type="hidden" id="topDegreeVal" value="<?php echo $value['e_name']?>">
            		<input type="hidden" id="workyearVal" value="<?php echo $value['ex_experience']?>">
            		<input type="hidden" id="currentStateVal" value="<?php echo $value['status_name']?>">
            		<input type="hidden" id="emailVal" value="<?php echo $value['email']?>">
            		<input type="hidden" id="telVal" value="<?php echo $value['pe_phone']?>">
            		<input type="hidden" id="pageType" value="1">
                    <?php } ?>
</div><!--end #basicInfo-->

            	<div class="profile_box" id="expectJob">
            		<h2 id="job">期望工作</h2>
            		            		<span class="c_edit dn"></span>
            		<div class="expectShow dn">
            		            			<span></span>
            		</div><!--end .expectShow-->
            		<div class="expectEdit dn" id="expectForm">
	            			<table>
	            				<tbody><tr>
	            					<td>
	            						<input type="hidden" id="expectCity" value="" name="future_city_id">
	            													        	<input type="button" value="期望城市，如：北京" id="select_expectCity" class="profile_select_287 profile_select_normal">
																				<div class="boxUpDown boxUpDown_596 dn" id="box_expectCity" style="display: none;">
								          		<dl>
								        			<dt>热门城市</dt>
								        			<dd>
                                                        <?php
                                                        foreach($city as $key=>$value){
                                                            ?>
                                                            <span><?php echo $value['city_name']?></span>
                                                        <?php
                                                        }
                                                        ?>
									        		</dd>
								        	  	</dl>
								        									        </div>  
	            					</td>
	            					<td>
	            						<ul class="profile_radio clearfix reset">
	            								            								<li class="current">
									             	 全职<em></em>
									              	<input type="radio" checked="" name="pe_work_nature" value="全职">
									            </li>
									            <li>
									              	兼职<em></em>
									              	<input type="radio" name="pe_work_nature" value="兼职">
									            </li>
									            <li>
									            	  实习<em></em>
									              	<input type="radio" name="pe_work_nature" value="实习">
									            </li>
								            								        </ul> 
	            					</td>
	            				</tr>
	            				<tr>
	            					<td>
							        	<input type="text" placeholder="期望职位，如：产品经理" value="" name="pe_position" id="expectPosition">
									</td>
	            					<td>
	            						<input type="hidden" id="expectSalary" value="" name="pe_salary">
	            							            						<input type="button" value="期望月薪" id="select_expectSalary" class="profile_select_287 profile_select_normal">
	            													        	<div class="boxUpDown boxUpDown_287 dn" id="box_expectSalary" style="display: none;">
								          	  <ul>
                                                  <?php
                                                  foreach($monthly as $key=>$value){
                                                      ?>
                                                      <li><?php echo $value['sa_salary']?></li>
                                                  <?php
                                                  }
                                                  ?>
                                              </ul>
								         </div>  
	            					</td>
	            				</tr>
	            				<tr>
	            					<td colspan="2">
										<input type="submit" value="保 存" class="btn_profile_save" id="expect">
						          		<a class="btn_profile_cancel" href="javascript:;">取 消</a>
	            					</td>
	            				</tr>
	            			</tbody>
                            </table>
            		</div><!--end .expectEdit-->
                    <?php if(!empty($expect)){?>
                        <div class="expectAdd pAdd" id="expectAdd">
                            <?php
                            foreach($expect as $key=>$value){
                                ?>
                                期望城市：<strong id="expect1"><?php echo $value['city_name']?></strong>
                                工作性质：<strong id="expect2"><?php echo $value['pe_work_nature']?></strong><br/>
                                期望职位：<strong id="expect3"><?php echo $value['pe_position']?></strong>
                                期望月薪：<strong id="expect4"><?php echo $value['sa_salary']?></strong>
                            <?php
                            }
                            ?>
                            <span id="expectinsert">添加期望工作</span>
                        </div><!--end .expectAdd-->
                    <?php
                    }else{
                        ?>
                        <div class="expectAdd pAdd" id="expectAdd" style="display: none">
                                期望城市：<strong id="expect1"></strong>
                                工作性质：<strong id="expect2"></strong><br/>
                                期望职位：<strong id="expect3"></strong>
                                期望月薪：<strong id="expect4"></strong>
                            <span id="expectinsert">添加期望工作</span>
                        </div><!--end .expectAdd-->
                        <div class="expectAdd pAdd">
                            填写准确的期望工作能大大提高求职成功率哦…<br>
                            快来添加期望工作吧！
                            <span>添加期望工作</span>
                        </div><!--end .expectAdd-->


                    <?php }?>
                    <?php foreach($expect as $key=>$value){ ?>
                        <input type="hidden" id="expectJobVal" value="">
                        <input type="hidden" id="expectCityVal" value="<?php echo $value['city_name']?>">
                        <input type="hidden" id="typeVal" value="<?php echo $value['pe_work_nature']?>">
                        <input type="hidden" id="expectPositionVal" value="<?php echo $value['pe_position']?>">
                        <input type="hidden" id="expectSalaryVal" value="<?php echo $value['sa_salary']?>">
                    <?php }?>
                </div><!--end #expectJob-->
            	<div class="profile_box" id="workExperience">
            		<h2>工作经历  <span> （投递简历时必填）</span></h2>
            		            		<span class="c_add dn"></span>
            		<div class="experienceShow dn">

            	<!--end .experienceForm-->

            		</div><!--end .experienceShow-->
            		<div class="experienceEdit dn">
                        <div class="experienceForm">
	            			<table>
	            				<tbody><tr>
							      	<td valign="top">
							        	<span class="redstar">*</span>
							      	</td>
							      	<td>
							        	<input type="text" placeholder="公司名称" name="w_company" class="companyName" id="w_company">
							      	</td>
							      	<td valign="top">
							        	<span class="redstar">*</span>
							      	</td>
							      	<td>
							          	<input type="text" placeholder="职位名称，如：产品经理" name="w_position" class="positionName" id="w_position">
							      	</td>
							    </tr>
	            				<tr>
	            					<td valign="top">
							        	<span class="redstar">*</span>
							      	</td>
	            					<td>
		            					<div class="fl">
		            						<input type="hidden" class="companyYearStart" name="w_start_time" id="w_start_time">
								        	<input type="button" value="开始年份" class="profile_select_139 profile_select_normal select_companyYearStart">
											<div class="box_companyYearStart boxUpDown boxUpDown_139 dn" style="display: none;">
									            <ul>
									        											        			<li>2014</li>
									        											        			<li>2013</li>
									        											        			<li>2012</li>
									        											        			<li>2011</li>
									        											        			<li>2010</li>
									        											        			<li>2009</li>
									        											        			<li>2008</li>
									        											        			<li>2007</li>
									        											        			<li>2006</li>
									        											        			<li>2005</li>
									        											        			<li>2004</li>
									        											        			<li>2003</li>
									        											        			<li>2002</li>
									        											        			<li>2001</li>
									        											        			<li>2000</li>
									        											        			<li>1999</li>
									        											        			<li>1998</li>
									        											        			<li>1997</li>
									        											        			<li>1996</li>
									        											        			<li>1995</li>
									        											        			<li>1994</li>
									        											        			<li>1993</li>
									        											        			<li>1992</li>
									        											        			<li>1991</li>
									        											        			<li>1990</li>
									        											        			<li>1989</li>
									        											        			<li>1988</li>
									        											        			<li>1987</li>
									        											        			<li>1986</li>
									        											        			<li>1985</li>
									        											        			<li>1984</li>
									        											        			<li>1983</li>
									        											        			<li>1982</li>
									        											        			<li>1981</li>
									        											        			<li>1980</li>
									        											        			<li>1979</li>
									        											        			<li>1978</li>
									        											        			<li>1977</li>
									        											        			<li>1976</li>
									        											        			<li>1975</li>
									        											        			<li>1974</li>
									        											        			<li>1973</li>
									        											        			<li>1972</li>
									        											        			<li>1971</li>
									        											        			<li>1970</li>
									        											        	</ul>
									        </div>
										</div>
										<div class="fl">
									        <input type="hidden" class="companyMonthStart" value="" name="w_start_time1" id="w_start_time1">
								        	<input type="button" value="开始月份" class="profile_select_139 profile_select_normal select_companyMonthStart">
											<div style="display: none;" class="box_companyMonthStart boxUpDown boxUpDown_139 dn">
									            <ul>
									        		<li>01</li><li>02</li><li>03</li><li>04</li><li>05</li><li>06</li><li>07</li><li>08</li><li>09</li><li>10</li><li>11</li><li>12</li>
									        	</ul>
									        </div>
									    </div>
									    <div class="clear"></div>
	            					</td>
	            					<td valign="top">
							        	<span class="redstar">*</span>
							      	</td>
	            					<td>
		            					<div class="fl">
		            						<input type="hidden" class="companyYearEnd" value="" name="w_end_time" id="w_end_time">
								        	<input type="button" value="结束年份" class="profile_select_139 profile_select_normal select_companyYearEnd">
											<div class="box_companyYearEnd  boxUpDown boxUpDown_139 dn" style="display: none;">
									            <ul>
									            	<li>至今</li>
									        											        			<li>2014</li>
									        											        			<li>2013</li>
									        											        			<li>2012</li>
									        											        			<li>2011</li>
									        											        			<li>2010</li>
									        											        			<li>2009</li>
									        											        			<li>2008</li>
									        											        			<li>2007</li>
									        											        			<li>2006</li>
									        											        			<li>2005</li>
									        											        			<li>2004</li>
									        											        			<li>2003</li>
									        											        			<li>2002</li>
									        											        			<li>2001</li>
									        											        			<li>2000</li>
									        											        			<li>1999</li>
									        											        			<li>1998</li>
									        											        			<li>1997</li>
									        											        			<li>1996</li>
									        											        			<li>1995</li>
									        											        			<li>1994</li>
									        											        			<li>1993</li>
									        											        			<li>1992</li>
									        											        			<li>1991</li>
									        											        			<li>1990</li>
									        											        			<li>1989</li>
									        											        			<li>1988</li>
									        											        			<li>1987</li>
									        											        			<li>1986</li>
									        											        			<li>1985</li>
									        											        			<li>1984</li>
									        											        			<li>1983</li>
									        											        			<li>1982</li>
									        											        			<li>1981</li>
									        											        			<li>1980</li>
									        											        			<li>1979</li>
									        											        			<li>1978</li>
									        											        			<li>1977</li>
									        											        			<li>1976</li>
									        											        			<li>1975</li>
									        											        			<li>1974</li>
									        											        			<li>1973</li>
									        											        			<li>1972</li>
									        											        			<li>1971</li>
									        											        			<li>1970</li>
									        											        	</ul>
									        </div>
										</div>
										<div class="fl">
									        <input type="hidden" class="companyMonthEnd" value="" name="w_end_time1" id="w_end_time1">
								        	<input type="button" value="结束月份" class="profile_select_139 profile_select_normal select_companyMonthEnd">
											<div style="display: none;" class="box_companyMonthEnd boxUpDown boxUpDown_139 dn">
									            <ul>
									        		<li>01</li><li>02</li><li>03</li><li>04</li><li>05</li><li>06</li><li>07</li><li>08</li><li>09</li><li>10</li><li>11</li><li>12</li>
									        	</ul>
									        </div>
								        </div>
								        <div class="clear"></div>
	            					</td>
	            				</tr>
	            				<tr>
	            					<td></td>
	            					<td colspan="3">
										<input type="submit" value="保 存" class="btn_profile_save" id="experience">
						          		<a class="btn_profile_cancel" href="javascript:;">取 消</a>
	            					</td>
	            				</tr>
	            			</tbody></table>
	            			<input type="hidden" class="expId" value="111">
                            <!--end .experienceForm-->
                        </div>
            		</div><!--end .experienceEdit-->
                    <?php
                    if(!empty($exper)){
                    ?>
                    <div class="experienceAdd pAdd" id="jingli1">
                        <?php
                            foreach($exper as $key=>$value){
                        ?>
                                <strong id="gongsi">公司名称：<?php echo $value['w_company']?></strong>
                                <strong id="zhiwei">职位名称：<?php echo $value['w_position']?></strong><br/>
                                <strong id="start">开始时间：<?php echo $value['w_start_time']?></strong>
                                <strong id="end">结束时间：<?php echo $value['w_end_time']?></strong><br/>
                        <?php } ?>
                        <span>添加工作经历</span>
                    </div>
            		<?php }else{?>
                        <div class="experienceAdd pAdd" id="jingli1" style="display: none">
                            公司名称：<strong id="gongsi"></strong>
                            职位名称：<strong id="zhiwei"></strong><br/>
                            开始时间：<strong id="start"></strong>
                            结束时间：<strong id="end"></strong><br/>
                        </div>
                        <div class="experienceAdd pAdd">
            		            			工作经历最能体现自己的工作能力<br>
						且完善后才可投递简历哦！
						<span>添加工作经历</span>
            		    </div><!--end .experienceAdd-->
                    <?php } ?>
            	</div><!--end #workExperience-->

            	<div class="profile_box" id="projectExperience">
            		<h2>项目经验</h2>
            		            		<span class="c_add dn"></span>
            		<div class="projectShow dn">
            		            			<ul class="plist clearfix">
	            			            			</ul>
            		</div><!--end .projectShow-->
            		<div class="projectEdit dn">
                        <div class="projectForm" id="item7">
	            			<table>
	            				<tbody><tr>
	            					<td valign="top">
							        	<span class="redstar">*</span>
							      	</td> 
							      	<td>
							        	<input type="text" placeholder="项目名称" name="p_name" class="projectName" id="p_name">
							      	</td>
	            					<td valign="top">
							        	<span class="redstar">*</span>
							      	</td> 
							      	<td>
							          	<input type="text" placeholder="担任职务，如：产品负责人" name="p_duties" class="thePost" id="p_duties">
							      	</td>
							    </tr>
	            				<tr>
	            					<td valign="top">
							        	<span class="redstar">*</span>
							      	</td> 
	            					<td>
		            					<div class="fl">
		            						<input type="hidden" class="projectYearStart" value="" name="p_start_time" id="p_start_time">
								        	<input type="button" value="开始年份" class="profile_select_139 profile_select_normal select_projectYearStart">
											<div class="box_projectYearStart  boxUpDown boxUpDown_139 dn" style="display: none;">
									            <ul>
									        											        			<li>2014</li>
									        											        			<li>2013</li>
									        											        			<li>2012</li>
									        											        			<li>2011</li>
									        											        			<li>2010</li>
									        											        			<li>2009</li>
									        											        			<li>2008</li>
									        											        			<li>2007</li>
									        											        			<li>2006</li>
									        											        			<li>2005</li>
									        											        			<li>2004</li>
									        											        			<li>2003</li>
									        											        			<li>2002</li>
									        											        			<li>2001</li>
									        											        			<li>2000</li>
									        											        			<li>1999</li>
									        											        			<li>1998</li>
									        											        			<li>1997</li>
									        											        			<li>1996</li>
									        											        			<li>1995</li>
									        											        			<li>1994</li>
									        											        			<li>1993</li>
									        											        			<li>1992</li>
									        											        			<li>1991</li>
									        											        			<li>1990</li>
									        											        			<li>1989</li>
									        											        			<li>1988</li>
									        											        			<li>1987</li>
									        											        			<li>1986</li>
									        											        			<li>1985</li>
									        											        			<li>1984</li>
									        											        			<li>1983</li>
									        											        			<li>1982</li>
									        											        			<li>1981</li>
									        											        			<li>1980</li>
									        											        			<li>1979</li>
									        											        			<li>1978</li>
									        											        			<li>1977</li>
									        											        			<li>1976</li>
									        											        			<li>1975</li>
									        											        			<li>1974</li>
									        											        			<li>1973</li>
									        											        			<li>1972</li>
									        											        			<li>1971</li>
									        											        			<li>1970</li>
									        											        	</ul>
									        </div>
										</div>
										<div class="fl">
									        <input type="hidden" class="projectMonthStart" value="" name="p_start_time1" id="p_start_time1">
								        	<input type="button" value="开始月份" class="profile_select_139 profile_select_normal select_projectMonthStart">
											<div style="display: none;" class="box_projectMonthStart boxUpDown boxUpDown_139 dn">
									            <ul>
									        		<li>01</li><li>02</li><li>03</li><li>04</li><li>05</li><li>06</li><li>07</li><li>08</li><li>09</li><li>10</li><li>11</li><li>12</li>
									        	</ul>
									        </div>
								        </div>
								        <div class="clear"></div>
	            					</td>
	            					<td valign="top">
							        	<span class="redstar">*</span>
							      	</td> 
	            					<td>
	            						<div class="fl">
		            						<input type="hidden" class="projectYearEnd" value="" name="p_end_time" id="p_end_time">
								        	<input type="button" value="结束年份" class="profile_select_139 profile_select_normal select_projectYearEnd">
											<div class="box_projectYearEnd  boxUpDown boxUpDown_139 dn" style="display: none;">
									            <ul>
									            	<li>至今</li>
									        											        			<li>2014</li>
									        											        			<li>2013</li>
									        											        			<li>2012</li>
									        											        			<li>2011</li>
									        											        			<li>2010</li>
									        											        			<li>2009</li>
									        											        			<li>2008</li>
									        											        			<li>2007</li>
									        											        			<li>2006</li>
									        											        			<li>2005</li>
									        											        			<li>2004</li>
									        											        			<li>2003</li>
									        											        			<li>2002</li>
									        											        			<li>2001</li>
									        											        			<li>2000</li>
									        											        			<li>1999</li>
									        											        			<li>1998</li>
									        											        			<li>1997</li>
									        											        			<li>1996</li>
									        											        			<li>1995</li>
									        											        			<li>1994</li>
									        											        			<li>1993</li>
									        											        			<li>1992</li>
									        											        			<li>1991</li>
									        											        			<li>1990</li>
									        											        			<li>1989</li>
									        											        			<li>1988</li>
									        											        			<li>1987</li>
									        											        			<li>1986</li>
									        											        			<li>1985</li>
									        											        			<li>1984</li>
									        											        			<li>1983</li>
									        											        			<li>1982</li>
									        											        			<li>1981</li>
									        											        			<li>1980</li>
									        											        			<li>1979</li>
									        											        			<li>1978</li>
									        											        			<li>1977</li>
									        											        			<li>1976</li>
									        											        			<li>1975</li>
									        											        			<li>1974</li>
									        											        			<li>1973</li>
									        											        			<li>1972</li>
									        											        			<li>1971</li>
									        											        			<li>1970</li>
									        											        	</ul>
									        </div>
										</div>
										<div class="fl">
									        <input type="hidden" class="projectMonthEnd" value="" name="p_end_time1" id="p_end_time1">
								        	<input type="button" value="结束月份" class="profile_select_139 profile_select_normal select_projectMonthEnd">
											<div style="display: none;" class="box_projectMonthEnd boxUpDown boxUpDown_139 dn">
									            <ul>
									        		<li>01</li><li>02</li><li>03</li><li>04</li><li>05</li><li>06</li><li>07</li><li>08</li><li>09</li><li>10</li><li>11</li><li>12</li>
									        	</ul>
									        </div>
								        </div>
								        <div class="clear"></div>
	            					</td>
	            				</tr>
	            				<tr>
	            					<td valign="top"></td> 
									<td colspan="3">
										<textarea class="projectDescription s_textarea" name="p_describe" id="p_describe" placeholder="项目描述"></textarea>
										<div class="word_count">你还可以输入 <span>500</span> 字</div>
									</td>
	            				</tr>
	            				<!-- <tr>
									<td colspan="2">
										<textarea placeholder="职责描述" name="ResponsDescription" class="ResponsDescription s_textarea"></textarea>
										<div class="word_count">你还可以输入 <span>500</span> 字</div>
									</td>
	            				</tr> -->
	            				<tr>
	            					<td valign="top"></td> 
	            					<td colspan="3">
										<input type="submit" value="保 存" class="btn_profile_save" id="project">
						          		<a class="btn_profile_cancel" href="javascript:;">取 消</a>
	            					</td>
	            				</tr>
	            			</tbody>
                            </table>
			            	<input type="hidden" value="" class="projectId">
                        </div>
            		</div><!--end .projectEdit-->
                    <?php
                    if(!empty($project)){
                    ?>
                    <div class="projectAdd pAdd" id="item6">
                        <?php
                            foreach($project as $key=>$value) {
                        ?>
                            <strong id="item1">项目名称：<?php echo $value['p_name']?></strong>
                            <strong id="item2">担任职务：<?php echo $value['p_duties']?></strong><br/>
                            <strong id="item3">开始时间：<?php echo $value['p_start_time']?></strong>
                            <strong id="item4">结束时间：<?php echo $value['p_end_time']?></strong><br/>
                            <strong id="item5">项目描述：<?php echo $value['p_describe']?></strong><br/>
                        <?php
                            }
                        ?>
                        <span>添加项目经验</span>
                    </div>
                    <?php }else{?>
                        <div class="projectAdd pAdd" id="item6" style="display: none">
                            项目名称： <strong id="item1"></strong>
                            担任职务： <strong id="item2"></strong><br/>
                            开始时间： <strong id="item3"></strong>
                            结束时间： <strong id="item4"></strong><br/>
                            项目描述： <strong id="item5"></strong><br/>
                        </div>
            		<div class="projectAdd pAdd">
            		            			项目经验是用人单位衡量人才能力的重要指标哦！<br>
						来说说让你难忘的项目吧！
						<span>添加项目经验</span>
            		</div><!--end .projectAdd-->
                    <?php }?>
            	</div><!--end #projectExperience-->

            	<div class="profile_box" id="educationalBackground">
            		<h2>教育背景<span>（投递简历时必填）</span></h2>
            							<span class="c_add dn"></span>

            		<div class="educationalEdit dn">

                        <div class="educationalForm">
	            			<table id="background6">
	            				<tbody><tr>
							      	<td valign="top">
							        	<span class="redstar">*</span>
							      	</td>
							      	<td>
							        	<input type="text" placeholder="学校名称" name="e_school" id="e_school" class="schoolName">
							      	</td>
							      	<td valign="top">
							        	<span class="redstar">*</span>
							      	</td>
							      	<td>
							      		<input type="hidden" class="degree" value="" name="edu_id" id="edu_id">
							        	<input type="button" value="学历" class="profile_select_287 profile_select_normal select_degree">
										<div class="box_degree boxUpDown boxUpDown_287 dn" style="display: none;">
								            <ul>
                                                <?php
                                                foreach ($arr1 as $key => $value){
                                                    ?>
                                                    <li><?php echo $value['e_name']?></li>
                                                <?php
                                                }
                                                ?>
								        										        	</ul>
								        </div>
							        </td>
							    </tr>
	            				<tr>
	            					<td valign="top">
							        	<span class="redstar">*</span>
							      	</td>
	            					<td>
	            						<input type="text" placeholder="专业名称" name="e_major" id="e_major" class="professionalName">
	            					</td>
	            					<td valign="top">
							        	<span class="redstar">*</span>
							      	</td>
	            					<td>
		            					<div class="fl">
		            						<input type="hidden" class="schoolYearStart" value="" name="e_start_time" id="e_start_time">
								        	<input type="button" value="开始年份" class="profile_select_139 profile_select_normal select_schoolYearStart">
											<div class="box_schoolYearStart boxUpDown boxUpDown_139 dn" style="display: none;">
									            <ul>
									        											        			<li>2014</li>
									        											        			<li>2013</li>
									        											        			<li>2012</li>
									        											        			<li>2011</li>
									        											        			<li>2010</li>
									        											        			<li>2009</li>
									        											        			<li>2008</li>
									        											        			<li>2007</li>
									        											        			<li>2006</li>
									        											        			<li>2005</li>
									        											        			<li>2004</li>
									        											        			<li>2003</li>
									        											        			<li>2002</li>
									        											        			<li>2001</li>
									        											        			<li>2000</li>
									        											        			<li>1999</li>
									        											        			<li>1998</li>
									        											        			<li>1997</li>
									        											        			<li>1996</li>
									        											        			<li>1995</li>
									        											        			<li>1994</li>
									        											        			<li>1993</li>
									        											        			<li>1992</li>
									        											        			<li>1991</li>
									        											        			<li>1990</li>
									        											        			<li>1989</li>
									        											        			<li>1988</li>
									        											        			<li>1987</li>
									        											        			<li>1986</li>
									        											        			<li>1985</li>
									        											        			<li>1984</li>
									        											        			<li>1983</li>
									        											        			<li>1982</li>
									        											        			<li>1981</li>
									        											        			<li>1980</li>
									        											        			<li>1979</li>
									        											        			<li>1978</li>
									        											        			<li>1977</li>
									        											        			<li>1976</li>
									        											        			<li>1975</li>
									        											        			<li>1974</li>
									        											        			<li>1973</li>
									        											        			<li>1972</li>
									        											        			<li>1971</li>
									        											        			<li>1970</li>
									        											        	</ul>
									        </div>
										</div>
										<div class="fl">
		            						<input type="hidden" class="schoolYearEnd" value="" name="e_end_time" id="e_end_time">
								        	<input type="button" value="结束年份" class="profile_select_139 profile_select_normal select_schoolYearEnd">
											<div class="box_schoolYearEnd  boxUpDown boxUpDown_139 dn" style="display: none;">
									            <ul>
									        											        			<li>2014</li>
									        											        			<li>2013</li>
									        											        			<li>2012</li>
									        											        			<li>2011</li>
									        											        			<li>2010</li>
									        											        			<li>2009</li>
									        											        			<li>2008</li>
									        											        			<li>2007</li>
									        											        			<li>2006</li>
									        											        			<li>2005</li>
									        											        			<li>2004</li>
									        											        			<li>2003</li>
									        											        			<li>2002</li>
									        											        			<li>2001</li>
									        											        			<li>2000</li>
									        											        			<li>1999</li>
									        											        			<li>1998</li>
									        											        			<li>1997</li>
									        											        			<li>1996</li>
									        											        			<li>1995</li>
									        											        			<li>1994</li>
									        											        			<li>1993</li>
									        											        			<li>1992</li>
									        											        			<li>1991</li>
									        											        			<li>1990</li>
									        											        			<li>1989</li>
									        											        			<li>1988</li>
									        											        			<li>1987</li>
									        											        			<li>1986</li>
									        											        			<li>1985</li>
									        											        			<li>1984</li>
									        											        			<li>1983</li>
									        											        			<li>1982</li>
									        											        			<li>1981</li>
									        											        			<li>1980</li>
									        											        			<li>1979</li>
									        											        			<li>1978</li>
									        											        			<li>1977</li>
									        											        			<li>1976</li>
									        											        			<li>1975</li>
									        											        			<li>1974</li>
									        											        			<li>1973</li>
									        											        			<li>1972</li>
									        											        			<li>1971</li>
									        											        			<li>1970</li>
									        											        	</ul>
									        </div>
	            						</div>
	            						<div class="clear"></div>
	            					</td>
	            				</tr>
	            				<tr>
	            					<td></td>
	            					<td colspan="3">
										<input type="submit" value="保 存" class="btn_profile_save" id="education">
						          		<a class="btn_profile_cancel" href="javascript:;">取 消</a>
	            					</td>
	            				</tr>
	            			</tbody></table>
	            			<input type="hidden" class="eduId" value="">
                        </div>
            			<!--end .educationalForm-->
            		</div><!--end .educationalEdit-->
                    <?php
                    if(!empty($education)){
                    ?>
                    <div class="educationalAdd pAdd" id="background7">
                        <?php
                            foreach($education as $key=>$value){
                        ?>
                                <strong id="background1">学校名称：<?php echo $value['eh_school']?></strong>
                                <strong id="background2">学历名称：<?php echo $value['e_name']?></strong><br/>
                                <strong id="background3">专业名称：<?php echo $value['eh_major']?></strong><br/>
                                <strong id="background4">开始时间：<?php echo $value['eh_start_time']?></strong>
                                <strong id="background5">结束时间：<?php echo $value['eh_end_time']?></strong><br/>
                        <?php }?>
                    </div>

                    <?php }else{?>
                        <div class="educationalAdd pAdd" id="background7" style="display: none">
                            学校名称：<strong id="background1"></strong>
                            学历名称：<strong id="background2"></strong><br/>
                            专业名称：<strong id="background3"></strong><br/>
                            开始时间：<strong id="background4"></strong>
                            结束时间：<strong id="background5"></strong><br/>
                        </div>
                        <div class="educationalAdd pAdd">
                            教育背景可以充分体现你的学习和专业能力<br>
                            且完善后才可投递简历哦！
                            <span>添加教育经历</span>
                        </div><!--end .educationalAdd-->
                    <?php }?>
            	</div><!--end #educationalBackground-->

            	<div class="profile_box" id="selfDescription">
            		<h2>自我描述</h2>
            		            		<span class="c_edit dn"></span>
            		<div class="descriptionShow dn">
            		            			
            		</div><!--end .descriptionShow-->
            		<div class="descriptionEdit dn">
                            <div class="descriptionForm" id="desc3">
	            			<table>
	            				<tbody><tr>
									<td colspan="2">
										<textarea class="selfDescription s_textarea" name="pe_intro" id="pe_intro" placeholder=""></textarea>
										<div class="word_count">你还可以输入 <span>500</span> 字</div>
									</td>
	            				</tr>
	            				<tr>
	            					<td colspan="2">
										<input type="submit" value="保 存" class="btn_profile_save" id="describe">
						          		<a class="btn_profile_cancel" href="javascript:;">取 消</a>
	            					</td>
	            				</tr>
	            			</tbody></table>
                            </div>
            		</div><!--end .descriptionEdit-->
                    <?php
                        if(!empty($desc['pe_intro'])){
                    ?>
                    <div class="descriptionAdd pAdd" id="desc2">
                            <strong id="desc1">自我描述：<?php echo $desc['pe_intro']?></strong><br/>
                    </div>
                    <?php }else{ ?>
                            <div class="descriptionAdd pAdd" id="desc2" style="display: none">
                                自我描述：  <strong id="desc1"></strong><br/>
                            </div>
            		 <div class="descriptionAdd pAdd">
            		            			描述你的性格、爱好以及吸引人的经历等，<br>
						让企业了解多元化的你！
						<span>添加自我描述</span>
            		</div><!--end .descriptionAdd-->
                    <?php } ?>
            	</div><!--end #selfDescription-->

            	<div class="profile_box" id="worksShow">
            		<h2>作品展示</h2>
            		            		<span class="c_add dn"></span>
            		<div class="workShow dn">
            		            			<ul class="slist clearfix">
            				            			</ul>
            		</div><!--end .workShow-->
            		<div class="workEdit dn" id="display1">
                            <div class="workForm">
	            			<table>
	            				<tbody><tr>
							      	<td>
							        	<input type="text" placeholder="请输入作品链接" name="w_link" id="w_link" class="workLink">
							      	</td>
							    </tr>
	            				<tr>
									<td>
										<textarea maxlength="100" class="workDescription s_textarea" name="w_explain" id="w_explain" placeholder="请输入说明文字"></textarea>
										<div class="word_count">你还可以输入 <span>100</span> 字</div>
									</td>
	            				</tr>
	            				<tr>
	            					<td>
										<input type="submit" value="保 存" class="btn_profile_save" id="works">
						          		<a class="btn_profile_cancel" href="javascript:;">取 消</a>
	            					</td>
	            				</tr>
	            			</tbody></table>
	            			<input type="hidden" class="showId" value="">
                            </div>
            			<!--end .workForm-->
            		</div><!--end .workEdit-->
                    <?php if(!empty($works)){?>
                    <div class="workAdd pAdd" id="display">
                    <?php
                    foreach($works as $key=>$value){
                    ?>
                            <strong id="link">作品链接：<?php echo $value['w_link']?></strong>
                            <strong id="caption">说明文字：<?php echo $value['w_explain']?></strong><br/>

                    <?php } ?>
                    </div>
                    <?php }else{?>
                        <div class="workAdd pAdd" id="display" style="display: none">
                            作品链接：<strong id="link"></strong>
                            说明文字：<strong id="caption"></strong><br/>
                        </div>
            		<div class="workAdd pAdd">
            		            			好作品会说话！<br>
						快来秀出你的作品打动企业吧！
						<span>添加作品展示</span>
            		</div><!--end .workAdd-->
                    <?php }?>
            	</div><!--end #worksShow-->
				<input type="hidden" id="resumeId" value="268472">
            </div><!--end .content_l-->
            <div class="content_r">
            	<div class="mycenterR" id="myInfo">
            		<h2>我的信息</h2>
            		<a target="_blank" href="?r=resume/collect">我收藏的职位</a>
                    <br/>
                    <a target="_blank" href="?r=resume/delivery">我投递的职位</a>
                </div><!--end #myInfo-->

				<div class="greybg qrcode mt20">
                	<img width="242" height="242" alt="拉勾微信公众号二维码" src="images/qr_resume.png">
                    <span class="c7">微信扫一扫，轻松找工作</span>
                </div>
            </div><!--end .content_r-->
        </div>
        
      <input type="hidden" id="userid" name="userid" value="314873">

<!-------------------------------------弹窗lightbox ----------------------------------------->
<div style="display:none;">
	<!-- 上传简历 -->
	<div class="popup" id="uploadFile">
	    <table width="100%">
	    	<tbody><tr>
	        	<td align="center">
	                <form>
	                    <a class="btn_addPic" href="javascript:void(0);">
	                    	<span>选择上传文件</span>
	                        <input type="file" onchange="file_check(this,'h/nearBy/updateMyResume.json','resumeUpload')" class="filePrew" id="resumeUpload" name="newResume" size="3" title="支持word、pdf、ppt、txt、wps格式文件，大小不超过10M" tabindex="3">
	                    </a>
	                </form>
	            </td>
	        </tr>
	    	<tr>
	        	<td align="left">支持word、pdf、ppt、txt、wps格式文件<br>文件大小需小于10M</td>
	        </tr>
	        <tr>
	        	<td align="left" style="color:#dd4a38; padding-top:10px;">注：若从其它网站下载的word简历，请将文件另存为.docx格式后上传</td>
	        </tr>
	    	<tr>
	        	<td align="center"><img width="55" height="16" alt="loading" style="visibility: hidden;" id="loadingImg" src="style/images/loading.gif"></td>
	        </tr>
	    </tbody></table>
	</div><!--/#uploadFile-->
	
	<!-- 简历上传成功 -->
	<div class="popup" id="uploadFileSuccess">
     	<h4>简历上传成功！</h4>
         <table width="100%">
             <tbody><tr>
                 <td align="center"><p>你可以将简历投给你中意的公司了。</p></td>
             </tr>
         	<tr>
             	<td align="center"><a class="btn_s" href="javascript:;">确&nbsp;定</a></td>
             </tr>
         </tbody></table>
     </div><!--/#uploadFileSuccess-->
     
	<!-- 没有简历请上传 -->
    <div class="popup" id="deliverResumesNo">
        <table width="100%">
            <tbody><tr>
                <td align="center"><p class="font_16">你在拉勾还没有简历，请先上传一份</p></td>
            </tr>
        	<tr>
            	<td align="center">
                    <form>
                        <a class="btn_addPic" href="javascript:void(0);">
                        	<span>选择上传文件</span>
                        	<input type="file" onchange="file_check(this,'h/nearBy/updateMyResume.json','resumeUpload1')" class="filePrew" id="resumeUpload1" name="newResume" size="3" title="支持word、pdf、ppt、txt、wps格式文件，大小不超过10M">
                        </a>
                    </form>
                </td>
            </tr>
        	<tr>
            	<td align="center">支持word、pdf、ppt、txt、wps格式文件，大小不超过10M</td>
            </tr>
        </tbody></table>
    </div><!--/#deliverResumesNo-->
    
    <!-- 上传附件简历操作说明-重新上传 -->
    <div class="popup" id="fileResumeUpload">
        <table width="100%">
            <tbody><tr>
                <td>
                	<div class="f18 mb10">请上传标准格式的word简历</div>
                </td>
            </tr>
            <tr>
                <td>
                	<div class="f16">
                		操作说明：<br>
                		打开需要上传的文件 - 点击文件另存为 - 选择.docx - 保存
                	</div>
                </td>
            </tr>
        	<tr>
            	<td align="center">
            		<a title="上传附件简历" href="#uploadFile" class="inline btn cboxElement">重新上传</a>
            	</td>
            </tr>
        </tbody></table>
    </div><!--/#fileResumeUpload-->
    
    <!-- 上传附件简历操作说明-重新上传 -->
    <div class="popup" id="fileResumeUploadSize">
        <table width="100%">
            <tbody><tr>
                <td>
                	<div class="f18 mb10">上传文件大小超出限制</div>
                </td>
            </tr>
            <tr>
                <td>
                	<div class="f16">
                		提示：<br>
                		单个附件不能超过10M，请重新选择附件简历！
                	</div>
                </td>
            </tr>
        	<tr>
            	<td align="center">
            		<a title="上传附件简历" href="#uploadFile" class="inline btn cboxElement">重新上传</a>
            	</td>
            </tr>
        </tbody></table>
    </div><!--/#deliverResumeConfirm-->
    
</div>
<!------------------------------------- end ----------------------------------------->  

<script src="style/js/Chart.min.js" type="text/javascript"></script>
<script src="style/js/profile.min.js" type="text/javascript"></script>
<!-- <div id="profileOverlay"></div> -->
<div class="" id="qr_cloud_resume" style="display: none;">
	<div class="cloud">
		<img width="134" height="134" src="">
		<a class="close" href="javascript:;"></a>
	</div>
</div>
<script>
$(function(){
	$.ajax({
        url:ctx+"/mycenter/showQRCode",
        type:"GET",
        async:false
   	}).done(function(data){
        if(data.success){
             $('#qr_cloud_resume img').attr("src",data.content);
        }
   	}); 
	var sessionId = "resumeQR"+314873;
	if(!$.cookie(sessionId)){
		$.cookie(sessionId, 0, {expires: 1});
	}
	if($.cookie(sessionId) &amp;&amp; $.cookie(sessionId) != 5){
		$('#qr_cloud_resume').removeClass('dn');
	}
	$('#qr_cloud_resume .close').click(function(){
		$('#qr_cloud_resume').fadeOut(200);
		resumeQR = parseInt($.cookie(sessionId)) + 1;
		$.cookie(sessionId, resumeQR, {expires: 1});
	});
});
</script>
			<div class="clear"></div>
			<input type="hidden" value="97fd449bcb294153a671f8fe6f4ba655" id="resubmitToken">
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

<script>
    $.ajax({

        type:"POST",
        data:{companyId:b,labels:a.join()},
        url:"?r=school/do_tags_insert"
        }).done(function(a){
        //alert(a)
        "success"==a?window.location.href="?r=school/info03":alert("保存失败")
    })
</script>

<script>
    //基本信息
    $('#basic1').click(function(){
        var u_name = $('#name').val();
        var sex = $("input[name='pe_sex']");
        for(var i=0;i<sex.length;i++){
            if(sex[i].checked){
              var pe_sex = sex[i].value;
            }
        }
        var e_id=$('#topDegree').val();
        var ex_id=$('#workyear').val();
        var pe_phone=$('#tel').val();
        var email=$('#email').val();
        var status_id=$('#currentState').val();
        $.ajax({
            type:"POST",
            url:"?r=resume/basicinsert",
            data:"u_name="+u_name+"&&pe_sex="+pe_sex+"&&e_id="+e_id+"&&ex_id="+ex_id+"&&pe_phone="+pe_phone+"&&email="+email+"&&status_id="+status_id,
            success:function(msg){
                if(msg=='1'){
                    $('#profileForm').hide();
                    $('#basicInfo').show();

                    var str="<div id='qwe'>"+"<h2>"+"基本信息"+"</h2>"+"<span class='c_edit'>"+"</span>"+"<div class='basicShow'>"+"<div class='basic' id='qwe'>"+"姓名："+"<span id='u_name'>"+u_name+"</span>"+"|"+"性别："+"<span id='pe_sex'>"+pe_sex+"</span>"+"|"+"学历："+"<span id='e_name'>"+e_id+"</span>"+"|"+"<br>"+"经验："+"<span id='jingyan'>"+ex_id+"</span>"+"|"+"电话："+"<span id='pe_phone'>"+pe_phone+"</span>"+"|"+"邮箱："+"<span id='youxiang'>"+email+"</span>"+"|"+"<br>"+" 状态："+"<span id='status_name'>"+status_id+"</span>"+"|"+"</div>" +"</div>"+"</div>";
                   $('#qwe').html(str);
                }
            }
        })
    })

    //期望工作
    $('#expect').click(function(){
        var future_city_id= $('#expectCity').val();
        var pe_work_natures = $("input[name='pe_work_nature']");
        for(var i=0;i<pe_work_natures.length;i++){
            if(pe_work_natures[i].checked){
                var pe_work_nature =pe_work_natures[i].value;
            }
        }
        var pe_position = $('#expectPosition').val();
        var pe_salary = $('#expectSalary').val();
        $.ajax({
            type:"POST",
            url:"?r=resume/expect",
            data:"future_city_id="+future_city_id+"&pe_work_nature="+pe_work_nature+"&pe_position="+pe_position+"&pe_salary="+pe_salary,
            success:function(msg){
                if(msg==1){
                    $('#expectForm').hide();
                    $('#expectAdd').show();
                    $('#expect1').html(future_city_id);
                    $('#expect2').html(pe_work_nature);
                    $('#expect3').html(pe_position);
                    $('#expect4').html(pe_salary);
                }
            }
        })
    })

    //工作经历
    $('#experience').click(function(){
        var w_company=$('#w_company').val();
        var w_position=$('#w_position').val();
        var w_start_time=$('#w_start_time').val();
        var w_start_time1=$('#w_start_time1').val();
        var w_end_time=$('#w_end_time').val();
        var w_end_time1=$('#w_end_time1').val();
        $.ajax({
            type:"POST",
            url:"?r=resume/experience",
            data:"w_company="+w_company+"&w_position="+w_position+"&w_start_time="+w_start_time+"&w_start_time1="+w_start_time1+"&w_end_time="+w_end_time+"&w_end_time1="+w_end_time1,
            success:function(msg){
                if(msg==1) {
                    $('.experienceForm').hide();
                    $('#jingli1').show();
                    $('#gongsi').html(w_company);
                    $('#zhiwei').html(w_position);
                    $('#start').html(w_start_time, w_start_time1);
                    $('#end').html(w_end_time, w_end_time1);
                }
            }
        })
    })

    //项目经验
    $('#project').click(function(){
        var p_name=$('#p_name').val();
        var p_duties=$('#p_duties').val();
        var p_start_time=$('#p_start_time').val();
        var p_start_time1=$('#p_start_time1').val();
        var p_end_time=$('#p_end_time').val();
        var p_end_time1=$('#p_end_time1').val();
        var p_describe=$('#p_describe').val();
        $.ajax({
            type:'POST',
            url:'?r=resume/project',
            data:'p_name='+p_name+'&p_duties='+p_duties+'&p_start_time='+p_start_time+'&p_start_time1='+p_start_time1+'&p_end_time='+p_end_time+'&p_end_time1='+p_end_time1+'&p_describe='+p_describe,
            success:function(msg){
                if(msg==1){
                    $('#item7').hide();
                    $('#item6').show();
                    $('#item1').html(p_name);
                    $('#item2').html(p_duties);
                    $('#item3').html(p_start_time,p_start_time1);
                    $('#item4').html(p_end_time,p_end_time1);
                    $('#item5').html(p_describe);
                }

            }
        })
    })

    //教育背景
    $('#education').click(function(){
        var e_school=$('#e_school').val();
        var edu_id=$('#edu_id').val();
        var e_major=$('#e_major').val();
        var e_start_time=$('#e_start_time').val();
        var e_end_time=$('#e_end_time').val();
        $.ajax({
            type:'POST',
            url:'?r=resume/education',
            data:'e_school='+e_school+'&edu_id='+edu_id+'&e_major='+e_major+'&e_start_time='+e_start_time+'&e_end_time='+e_end_time,
            success:function(msg){
               if(msg==1){
                   $('#background7').show();
                   $('#background6').hide();
                   $('#background1').html(e_school);
                   $('#background2').html(edu_id);
                   $('#background3').html(e_major);
                   $('#background4').html(e_start_time);
                   $('#background5').html(e_end_time);
               }
            }
        })
    })

    //自我描述
    $('#describe').click(function(){
        var pe_intro=$('#pe_intro').val();
        $.ajax({
            type:'POST',
            url:'?r=resume/describe',
            data:'pe_intro='+pe_intro,
            success:function(msg){
                if(msg==1){
                    $('#desc2').show();
                    $('#desc3').hide();
                    $('#desc1').html(pe_intro);
                }
            }
        })
    })

    //作品展示
    $('#works').click(function(){
        var w_link = $('#w_link').val();
        var w_explain = $('#w_explain').val();
        $.ajax({
            type:'POST',
            url:'?r=resume/works',
            data:'w_link='+w_link+'&w_explain='+w_explain,
            success:function(msg){
               if(msg==1){
                   $('#display1').hide();
                   $('#display').show();
                   $('#link').html(w_link);
                   $('#caption').html(w_explain);
               }
            }
        })
    })
</script>