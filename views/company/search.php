<?php foreach($companys as $company){?>
    <li >
        <a href="?r=company/detail&id=<?php echo $company['c_id']?>" target="_blank">
            <h3 title="<?php echo $company['u_name']?>"><?php echo $company['u_name']?></h3>
            <div class="comLogo">
                <img src="./company/<?php echo $company['c_logo']?>" width="190" height="190" alt="<?php echo $company['u_name']?>" />
                <ul>
                    <li><?php echo $company['u_name']?></li>
                    <li><?php echo $company['city_name']?>，<?php echo $company['n_name']?></li>
                </ul>
            </div>
        </a>
        <ul class="reset ctags">
            <?php
            $tags = explode(',',$company['c_tags']) ;
            foreach($tags as $tag){?>
                <li><?php echo $tag?></li>
            <?php }?>
        </ul>
    </li>
<?php }?>