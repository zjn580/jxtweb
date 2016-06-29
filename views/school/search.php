 <?php foreach($schools as $school){?>
    <li >
        <a href="?r=school/myhome&id=<?php echo $school['s_id']?>" target="_blank">
            <h3 title="<?php echo $school['u_name']?>"><?php echo $school['u_name']?></h3>
            <div class="comLogo">
                <img src="./school/<?php echo $school['s_logo']?>" width="190" height="190" alt="<?php echo $school['u_name']?>" />
                <ul>
                    <li><?php echo $school['u_name']?></li>
                    <li><?php echo $school['city_id']?>，<?php echo $school['n_name']?></li>
                </ul>
            </div>
        </a>
        <a href="h/jobs/148931.html" target="_blank"> 能源管理项目经理</a>
        <ul class="reset ctags">
            <?php
            $tags = explode(',',$school['s_tags']) ;
            foreach($tags as $tag){?>
                <li><?php echo $tag?></li>
            <?php }?>
        </ul>
    </li>
<?php }?>