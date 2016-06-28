<form id="deliveryForm">
    <ul class="reset my_delivery">
        <?php foreach($arr as $v) {?>
        <li>
            <div class="d_item">
                <h2 title="随便写">
                    <a target="_blank" href="http://www.lagou.com/jobs/149594.html">
                        <em><?=$v['p_name']?></em>
                        <span>（<?=$v['sa_salary']?>）</span>
                        <!--  -->
                    </a>
                </h2>
                <div class="clear"></div>
                <a title="公司名称" class="d_jobname" target="_blank" href="http://www.lagou.com/c/25927.html">
                    <?=$v['u_name']?> <span>[<?=$v['city_name']?>]</span>
                </a>
                <span class="d_time"><?= date('Y-m-d H:i:s',$v['td_time'])?></span>
                <div class="clear"></div>
            </div>

        </li>
        <?php } ?>
    </ul>
    <input type="hidden" value="-1" name="tag">
    <input type="hidden" value="" name="r">
</form>