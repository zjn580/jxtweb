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
                        <td class="tc"><input name="id[]" value="{{$v['pe_id']}}" type="checkbox"></td> 
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
    
    //全选全不选
    $('.allChoose').click(function(){
        
        if($(this).attr('checked')=='checked'){
            $('input[name="id[]"]').attr('checked',true);
        }else{
            $('input[name="id[]"]').attr('checked',false);
        }
    })
        
    //单删
    $(document).on('click','.link-del',function(){
        var ts = $(this);
        var lastid = $('.result-tab tbody').children().last().children('td').eq(1).html();
        var did = $(this).attr('did');
        if(confirm('确认删除?')){
            $.ajax({
                type:"GET",
                url:'{{url('delperson')}}',
                data:{did:did,lastid:lastid},
                success:function(msg){
                    var data = eval("("+msg+")")
                    //alert(msg);exit;
                    console.log(data);
                    if(data.success == 1){
                        ts.parents('tr').remove();
                        var str='';
                        $.each(data.msg,function(k,v){
                            str+='<tr>';
                            str+=    '<td class="tc"><input name="id[]" value="'+v['pe_id']+'" type="checkbox"></td>'
                            str+=    '<td>'+v['pe_id']+'</td>'
                            str+=    '<td title="'+v['u_name']+'"><a target="_blank" href="#" title="'+v['u_name']+'">'+v['u_name']+'</a>'
                            str+=    '</td>'
                            
                            str+=    '<td>'
                            if(v['c_status']==0){
                            str+=    '待审核'
                            }else if(v['c_status']==1){
                            str+=    '审核通过'
                            }else if(v['c_status']==2){
                            str+=    '审核未通过'    
                            }
                            str+=    '</td>'
                            str+=    '<td>'+v['pe_phone']+'</td>'
                            str+=    "<td><img src='' height='30' width='30'></td>"
                            str+=    '<td>'+v['email']+'</td>'
                            str+=    '<td>'
                            str+=        '<a class="link-audit" href="javascript:showBg()">审核</a>&nbsp;'
                            str+=        '<a class="link-update" href="javascript:void(0)" >刷新</a>&nbsp;'
                            str+=        '<a class="link-del" href="javascript:void(0)" did="'+v['pe_id']+'" >删除</a>'
                            str+=    '</td>'
                            str+= '</tr>'
                        });
                    $('.result-tab tbody').append(str);
                    }else if(data.success == 2){
                        ts.parents('tr').remove();
                    }if(data.success == 0){
                        alert('删除错误');
                    }
                 }
            })
        }

    })

    //批量删除
    $(document).on('click','#batchDel',function(){
        var ids = $('input[name="id[]"]');
        var lastid = $('.result-tab tbody').children().last().children('td').eq(1).html();
        var str ='';
        var length = 0;
        for (var i = 0;i<ids.length;i++) {
            if(ids.eq(i).attr('checked') == 'checked'){
                str+=','+ids.eq(i).val();
                length ++;
            }
        }
        var c_ids = str.substr(1);
        if(confirm('确认删除?')){
            $.ajax({
                type:"GET",
                url:delcompany,
                data:{did:c_ids,lastid:lastid,length:length},
                success:function(msg){
                    var data = eval("("+msg+")")
                    if(data.success == 1){
                        var rm = c_ids.split(",");
                        for(var i=0;i<rm.length;i++){
                            $('input[value='+rm[i]+']').parents('tr').remove()
                        }  
                        var str='';
                        $.each(data.msg,function(k,v){
                            str+='<tr>';
                            str+=    '<td class="tc"><input name="id[]" value="'+v['c_id']+'" type="checkbox"></td>'
                            str+=    '<td>'+v['c_id']+'</td>'
                            str+=    '<td title="'+v['u_name']+'"><a target="_blank" href="#" title="'+v['u_name']+'">'+v['u_name']+'</a>'
                            str+=    '</td>'
                            str+=    '<td>'+v['n_name']+'</td>'
                            str+=    '<td>'
                            if(v['c_status']==0){
                            str+=    '待审核'
                            }else if(v['c_status']==1){
                            str+=    '审核通过'
                            }else if(v['c_status']==2){
                            str+=    '审核未通过'    
                            }
                            str+=    '</td>'
                            str+=    '<td>'+v['c_linkman']+'</td>'
                            str+=    '<td>'+v['c_uptime']+'</td>'                                                    
                            str+=    '<td>'+v['u_time']+'</td>'
                            str+=    '<td>'
                            str+=        '<a class="link-audit" href="javascript:showBg()">审核</a>&nbsp;'
                            str+=        '<a class="link-update" href="javascript:void(0)" >刷新</a>&nbsp;'
                            str+=        '<a class="link-del" href="javascript:void(0)" did="'+v['c_id']+'" >删除</a>'
                            str+=    '</td>'
                            str+= '</tr>'
                        });
                    $('.result-tab tbody').append(str);
                    }else if(data.success == 2){
                        ts.parents('tr').remove();
                    }if(data.success == 0){
                        alert('删除错误');
                    }
                }
            })
        }
        
    })

    //批量更新
    $(document).on('click','#updateOrd',function(){
        var ids = $('input[name="id[]"]');
        var str ='';
        var length = 0;
        for (var i = 0;i<ids.length;i++) {
            if(ids.eq(i).attr('checked') == 'checked'){
                str+=','+ids.eq(i).val();
                length ++;
            }
        }
        var u_ids = str.substr(1);
        $.ajax({
                type:"GET",
                url:delcompany,
                data:{u_ids:u_ids},
                success:function(msg){
                }
        })
    
    })

////显示灰色 jQuery 遮罩
function showBg() {
    var bh = $("body").height();
    var bw = $("body").width();
    $("#fullbg").css({
        height:bh,
        width:bw,
        display:"block"
    });
    $("#dialog").show();
}
    //关闭灰色 jQuery 遮罩
function closeBg() {
    $("#fullbg,#dialog").hide();
}
</script>

