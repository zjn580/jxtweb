<?php foreach ($arr as $k => $v) {?>
        <li data-id ='<?=$v['po_id']?>' class="onlineResume"> <label class="checkbox"> <input type="checkbox" /> <i></i> </label> 
         <div class="resumeShow"> 
          <a title="预览在线简历" target="_blank" class="resumeImg" href="resumeView.html?deliverId=1686182"> 
          <img src="<?=$v['pe_img']?>" width='50' height="50" /></a> 
          <div class="resumeIntro"> 
           <h3 class="unread"> <a target="_blank" title="预览jason的简历" href="resumeView.html?deliverId=1686182"> <?=$v['u_name']?>的简历 </a> <em></em> </h3> 
           <span class="fr">投递时间：<?=date('Y-m-d H:i:s',$v['td_time'])?></span> 
           <div>
             <?=$v['u_name']?> / <?=$v['pe_sex']?> / <?=$v['e_name']?> / <?=$v['ex_experience']?> / <?=$v['now_city']?>
            <br /> <?=$v['w_position']?> &middot; <?=$v['w_company']?> | <?=$v['e_name']?> &middot; <?=$v['eh_school']?>
           </div> 
           <div class="jdpublisher"> 
            <span> 应聘职位：<a title="<?=$v['pe_position']?>" target="_blank" href="http://www.lagou.com/jobs/149594.html"><?=$v['pe_position']?></a> </span> 
           </div> 
          </div> 
          <div class="links"> 
          
           <?php if($status == 0){?>
            <a data-deliverid="<?=$v['po_id']?>" data-name="jason" data-positionid="<?=$v['p_id']?>" data-email="<?=$v['email']?>" class="resume_notice" href="javascript:void(0)">通知面试</a> 
             <a data-deliverid="<?=$v['po_id']?>" class="resume_refuse" href="javascript:void(0)">不合适</a> 
             <a data-deliverid="<?=$v['po_id']?>" class="resume_caninterview" href="javascript:void(0)">待定</a> 
             <a data-resumename="jason的简历" data-positionname="随便写" data-deliverid="<?=$v['po_id']?>" data-positionid="<?=$v['p_id']?>" data-resumekey="1ccca806e13637f7b1a4560f80f08057" data-forwardcount="1" class="resume_forward" href="javascript:void(0)"> 转发 <span>(1人)</span> </a>
           <?php }elseif($status == 1){?>
             <a data-deliverid="<?=$v['po_id']?>" data-name="jason" data-positionid="<?=$v['p_id']?>" data-email="<?=$v['email']?>" class="resume_notice" href="javascript:void(0)">通知面试</a> 
             <a data-deliverid="<?=$v['po_id']?>" class="resume_refuse" href="javascript:void(0)">不合适</a> 
             <a data-resumename="jason的简历" data-positionname="随便写" data-deliverid="<?=$v['po_id']?>" data-positionid="<?=$v['p_id']?>" data-resumekey="1ccca806e13637f7b1a4560f80f08057" data-forwardcount="1" class="resume_forward" href="javascript:void(0)"> 转发 <span>(1人)</span> </a>
           <?php }elseif($status == 2){?>
             <a data-resumename="jason的简历" data-positionname="随便写" data-deliverid="<?=$v['po_id']?>" data-positionid="<?=$v['p_id']?>" data-resumekey="1ccca806e13637f7b1a4560f80f08057" data-forwardcount="1" class="resume_forward" href="javascript:void(0)"> 转发 <span>(1人)</span> </a>
             <a class="repo_idsume_del" data-deliverid="<?=$v['po_id']?>" data-positionid="<?=$v['p_id']?>" href="javascript:void(0)">删除</a> 
           <?php }elseif($status == 3){?>
             <a data-resumename="jason的简历" data-positionname="随便写" data-deliverid="<?=$v['po_id']?>" data-positionid="<?=$v['p_id']?>" data-resumekey="1ccca806e13637f7b1a4560f80f08057" data-forwardcount="1" class="resume_forward" href="javascript:void(0)"> 转发 <span>(1人)</span> </a>
             <a class="resume_del" data-deliverid="<?=$v['po_id']?>" data-positionid="<?=$v['p_id']?>" href="javascript:void(0)">删除</a> 
           <?php }elseif($status == 4){?>
             <a data-deliverid="<?=$v['po_id']?>" data-name="jason" data-positionid="<?=$v['p_id']?>" data-email="<?=$v['email']?>" class="resume_notice" href="javascript:void(0)">通知面试</a> 
             <a data-deliverid="<?=$v['po_id']?>" class="resume_refuse" href="javascript:void(0)">不合适</a> 
             <a data-deliverid="<?=$v['po_id']?>" class="resume_caninterview" href="javascript:void(0)">待定</a> 
             <a data-resumename="jason的简历" data-positionname="随便写" data-deliverid="<?=$v['po_id']?>" data-positionid="<?=$v['p_id']?>" data-resumekey="1ccca806e13637f7b1a4560f80f08057" data-forwardcount="1" class="resume_forward" href="javascript:void(0)"> 转发 <span>(1人)</span> </a>
           <?php }?>
          </div> 
         </div> 
       </li> 
 <?php }?>
       