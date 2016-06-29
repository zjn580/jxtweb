
@include('public/header')
<script type="text/javascript">
    var delcompany = "{{url('delcompany')}}";
</script>
<input type="hidden" id="status" value="1">
<div class="main-wrap">
    <div class="crumb-wrap">
        <div class="crumb-list"><i class="icon-font"></i><a href="">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">企业信息</span></div>
    </div>
    <div class="search-wrap">
        <div class="search-content">
            <form action="/jscss/admin/design/index" method="post">
                <table class="search-tab">
                    <tr>
                        <th width="120">选择分类:</th>
                        <td>
                            <select name="search-sort" id="">
                                <option value="">全部</option>
                                <option value="19">精品界面</option><option value="20">推荐界面</option>
                            </select>
                        </td>
                        <th width="70">关键字:</th>
                        <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                        <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <div class="result-wrap">
        <form name="myform" id="myform" method="post">
            <div class="result-title">
                <div class="result-list">
                    <a href="{{URL('insert')}}"><i class="icon-font"></i>新增信息</a>
                    <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                    <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>批量更新</a>
                </div>
            </div>
            <div class="result-content">
                <table class="result-tab" width="100%">
                    <tr>
                        <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                        <th>ID</th>
                        <th>公司名称</th>
                        <th>企业性质</th>
                        <th>审核状态</th>
                        <th>发布人</th>
                        <th>更新时间</th>
                        <th>发布时间</th>
                        <th>操作</th>
                    </tr>
                    @foreach($arr as $v)
                    <tr>
                        <td class="tc"><input name="id[]" value="{{$v['c_id']}}" type="checkbox"></td>
                        <td>{{$v['c_id']}}</td>
                        <td title="{{$v['u_name']}}"><a target="_blank" href="#" title="{{$v['u_name']}}">{{$v['u_name']}}</a>
                        </td>
                        <td>{{$v['n_name']}}</td>
                        <td>
                            <?php 
                                switch ($v['c_status']) {
                                    case '0':
                                        echo '待审核';
                                        break;
                                    case '1':
                                        echo '审核通过';
                                        break;
                                    case '2':
                                        echo '审核未通过';
                                        break;
                                }
                            ?>
                        </td>
                        <td>{{$v['c_linkman']}}</td>
                        <td><?=date('Y-m-d H:i:s',$v['c_uptime'])?></td>
                        <td><?=date('Y-m-d H:i:s',$v['u_time'])?></td>
                        <td>
                            <a class="link-audit" href="javascript:showBg()">审核</a>
                            <a class="link-update" href="javascript:void(0)" >刷新</a>
                            <a class="link-del" href="javascript:void(0)" did="<?=$v['c_id']?>" >删除</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
              <div class="paging" id="pagelist">
                       <ul>
                           <li><a href="{{url('corporate/1')}}">首页</a></li>
                           <li><a href='<?=url("corporate/$up")?>'>上页</a></li>
                           @for ($i = 1; $i <= $pages ; $i++)
                               <li><a href='<?=url("corporate/$i")?>'>{{$i}}</a></li>
                           @endfor
                           <li><a href='<?=url("corporate/$next")?>'>下页</a></li>
                           <li><a href="<?=url("corporate/$pages")?>">尾页</a></li>
                           <li class="pageinfo">第{{$page}}页</li>
                           <li class="pageinfo">共{{$pages}}页</li>
                       </ul>
               </div>

            </div>
        </form>
    </div>
</div>

@include('public/footer')
