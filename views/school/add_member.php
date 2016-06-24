<!--填写机构学员-->
  <div id="container"> 
   <div class="content_mid"> 
    <dl class="c_section c_section_mid"> 
     <dt> 
      <h2><em></em>填写机构专业</h2> 
      
     </dt> 
     <dd> 
      
      <form method="post" action="?r=school/savemajor" id="productForm" enctype="multipart/form-data"> 
       <input type="hidden" value="8f79f658e49846ae89d90a3f1590f12e" name="resubmitToken" /> 
       <input type="hidden" id="companyId" name="companyId" value="25927" /> 
       <div id="productDiv"> 
        <div class="formWrapper"> 
         <input type="hidden" value="25927" name="productInfos[0].companyId" /> 
         <h3>专业名称</h3> 
         <input type="text" placeholder="请输入专业名称" name="productInfos[0].product" id="name0" /> 
         <h3>专业人员</h3> 
         <input type="text" placeholder="请输入专业人数" name="productInfos[1].productUrl" id="address0" /> 
         <h3>机构LOGO</h3> <!--非必填改必填-->
         <input type="file" name="file"/> 
         <h3>专业简介</h3> 
         <textarea placeholder="请简短描述该专业定位、专业特色、用户群体等" maxlength="1000" name="productInfos[2].productProfile" id="description0"></textarea> 
         <div class="word_count">
          你还可以输入 
          <span>500</span> 字
         </div> 
        </div> 
       </div> 
       <div class="clear"></div> 
       <input type="submit" value="添加专业" id="step4Submit" class="btn_big fr" /> 
       <a class="btn_cancel fr" href="?r=school/myhome">返回机构主页</a> 
      </form> 
     </dd> 
    </dl> 
   </div> 
   <script src="style/js/schoolstep4.min.js" type="text/javascript"></script> 
   <div class="clear"></div> 
   <input type="hidden" value="8f79f658e49846ae89d90a3f1590f12e" id="resubmitToken" /> 
   <a rel="nofollow" title="回到顶部" id="backtop" style="display: none;"></a> 
  </div>
  <!-- end #container --> 
  <!-- end #body --> 
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