<!--简历预览-->
<!DOCTYPE HTML>
<html>


<body>
<div id="previewWrapper">
    <div class="preview_header">
        <h1 title="简历"><?php echo"{$resume_name}"?>的简历</h1>
    </div>
    <!--end .preview_header-->

    <div class="preview_content">
        <div class="profile_box" id="basicInfo">
            <h2>基本信息</h2>

            <div class="basicShow">
                <?php
                foreach($basic as $key=>$value){
                    ?>
                    姓名：<span id="u_name"><?php echo $value['u_name']?></span>|
                    性别：<span id="pe_sex"><?php echo $value['pe_sex']?></span>|
                    学历：<span id="e_name"><?php echo $value['e_name']?></span>|<br/>
                    经验：<span id="y_year"><?php echo $value['ex_experience']?></span>|
                    电话：<span id="pe_phone"><?php echo $value['pe_phone']?></span>|<br/>
                    邮箱：<span id="youxiang"><?php echo $value['email']?></span>|<br/>
                    状态：<span id="status_name"><?php echo $value['status_name']?></span>|
                <?php } ?>
                <div class="m_portrait">
                    <div></div>
                    <img src="<?php echo $portrait; ?>" />
                </div>
            </div>
            <!--end .basicShow-->
        </div>
        <!--end #basicInfo-->

        <div class="profile_box" id="expectJob">
            <h2>期望工作</h2>

            <div class="expectShow">
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
            </div>
            <!--end .expectShow-->
        </div>
        <!--end #expectJob-->

        <div class="profile_box" id="workExperience">
            <h2>工作经历</h2>

            <div class="experienceShow">
                <?php
                foreach($exper as $key=>$value){
                    ?>
                    <strong id="start">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $value['w_start_time']?></strong>--
                    <strong id="end"><?php echo $value['w_end_time']?></strong><br/>
                    <strong id="gongsi">&nbsp;&nbsp;&nbsp;&nbsp;公司名称：<?php echo $value['w_company']?></strong>
                    <strong id="zhiwei">职位名称：<?php echo $value['w_position']?></strong><br/>
                <?php } ?>
            </div>
            <!--end .experienceShow-->
        </div>
        <!--end #workExperience-->

        <div class="profile_box" id="projectExperience">
            <h2>项目经验</h2>

            <div class="projectShow">
                <?php
                foreach($project as $key=>$value) {
                    ?>
                    <strong id="item3"><?php echo $value['p_start_time']?></strong>--
                    <strong id="item4"><?php echo $value['p_end_time']?></strong><br/>
                    <strong id="item1">项目名称：<?php echo $value['p_name']?></strong>
                    <strong id="item2">担任职务：<?php echo $value['p_duties']?></strong><br/>
                    <strong id="item5">项目描述：<?php echo $value['p_describe']?></strong><br/>
                <?php
                }
                ?>
            </div>
            <!--end .projectShow-->
        </div>
        <!--end #projectExperience-->

        <div class="profile_box" id="educationalBackground">
            <h2>教育背景</h2>

            <div class="educationalShow">
                <?php
                foreach($education as $key=>$value){
                    ?>
                    <strong id="background4">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $value['e_start_time']?></strong>--
                    <strong id="background5"><?php echo $value['e_end_time']?></strong><br/>
                    <strong id="background1">&nbsp;&nbsp;&nbsp;&nbsp;学校名称：<?php echo $value['e_school']?></strong>
                    <strong id="background2">学历名称：<?php echo $value['e_name']?></strong><br/>
                    <strong id="background3">&nbsp;&nbsp;&nbsp;&nbsp;专业名称：<?php echo $value['e_major']?></strong><br/>

                <?php }?>
            </div>
            <!--end .educationalShow-->
        </div>
        <!--end #educationalBackground-->

        <div class="profile_box" id="selfDescription">
            <h2>自我描述</h2>

            <div class="descriptionShow">
                <?php
                foreach($desc as $key=>$value){
                    ?>
                    <strong id="desc1"><?php echo $value['pe_intro']?></strong><br/>
                <?php } ?>
            </div>
            <!--end .descriptionShow-->
        </div>
        <!--end #selfDescription-->

        <div class="profile_box" id="worksShow">
            <h2>作品展示</h2>

            <div class="workShow">
                <ul class="slist clearfix">
                    <?php
                    foreach($works as $key=>$value){
                        ?>
                        <li id="link" class="f16">作品链接：<a href="<?php echo $value['w_link']?>" target="_blank"><?php echo $value['w_link']?></a></li><br/>
                        <li id="caption">说明文字：<?php echo $value['w_explain']?></li><br/>

                    <?php } ?>
                </ul>

            </div>
            <!--end .workShow-->
        </div>
        <!--end #worksShow-->
    </div>
    <!--end .preview_content-->
</div>
<!--end #previewWrapper-->

<!-------------------------------------弹窗lightbox ----------------------------------------->

<!------------------------------------- end ----------------------------------------->

</body>
</html>