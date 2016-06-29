@include('public/header')
<style>
    ul { list-style:none;}
    #pagelist {width:600px; margin:30px auto; padding:6px 0px; height:20px;}
    #pagelist ul li { float:left; border:1px solid #5d9cdf; height:20px; line-height:20px; margin:0px 2px;}
    #pagelist ul li a, .pageinfo { display:block; padding:0px 6px; background:#e6f2fe;}
    .pageinfo  { color:#555;}
    .current { background:#a9d2ff; display:block; padding:0px 6px; font-weight:bold;}
</style>

<div class="main-wrap">

    <div class="crumb-wrap">
        <div class="crumb-list"><i class="icon-font"></i><a href="">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">个人信息</span></div>
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
                    <a href="{{URL('tianjia')}}"><i class="icon-font"></i>新增信息</a>
                    <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                    <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                </div>
            </div>
            <div class="result-content">
                <table class="result-tab" width="100%">
                    <tr>
                        <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                        <th>ID</th>
                        <th>姓名</th>
                        <th>审核状态</th>
                        <th>手机</th>
                        <th>照片</th>
                        
                        <th>邮箱</th>
                        <th>操作</th>
                    </tr>
                    @foreach($person as $k=>$v)
                    <tr>
                        <td class="tc"><input name="id[]" value="59" type="checkbox"></td> 
                        <td>{{$v['pe_id']}}</td>
                        <td title=""><a target="_blank" href="#" title="">{{$v['u_name']}}</a></td>
                        <td>
                            <?php 
                                switch ($v['pe_status']) {
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
                        <td>{{$v['pe_phone']}}</td>
                        <td><img src="{{$v['pe_img']}}" height="30" width="30" alt=""></td>
                        <td>{{$v['email']}}</td>
                        
                        <td>
                            <a class="link-audit" href="javascript:showBg()">审核</a>
                            <a class="link-update" href="javascript:void(0)" >刷新</a>
                            <a class="link-del" href="javascript:void(0)" did="<?=$v['pe_id']?>" >删除</a>
                        
                        </td>

                    </tr>
                    @endforeach
                    
                </table>
                <div class="paging" id="pagelist">
                       <ul>
                           <li><a href="{{url('one/1')}}">首页</a></li>
                           <li><a href='<?=url("one/$up")?>'>上页</a></li>
                           @for ($i = 1; $i <= $pages ; $i++)
                               <li><a href='<?=url("one/$i")?>'>{{$i}}</a></li>
                           @endfor
                           <li><a href='<?=url("one/$next")?>'>下页</a></li>
                           <li><a href="<?=url("one/$pages")?>">尾页</a></li>
                           <li class="pageinfo">第{{$page}}页</li>
                           <li class="pageinfo">共{{$pages}}页</li>
                       </ul>
               </div>
            </div>
        </form>
    </div>
</div>


@include('public/footer')

<script>
    $('.link-del').click(function(){
        alert('沃尔夫圣诞节');
    })
</script>