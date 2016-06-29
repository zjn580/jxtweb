$(function(){
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
				url:delcompany,
				data:{did:did,lastid:lastid},
				success:function(msg){
					var data = eval("("+msg+")")
					console.log(data);
					if(data.success == 1){
						ts.parents('tr').remove();
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
			                str+= 	 '</td>'
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
			                str+= 	 '</td>'
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
		for (var i = 0;i<ids.length;i++) {
			if(ids.eq(i).attr('checked') == 'checked'){
				str+=','+ids.eq(i).val();
			}
		}
		var u_ids = str.substr(1);
		if(confirm('确认更新?')){
		$.ajax({
				type:"GET",
				url:updcompany,
				data:{u_ids:u_ids},
				success:function(msg){
					var data = eval('('+msg+')');
					if(data.success == 1){
						var gg = u_ids.split(",");
						for(var i=0;i<gg.length;i++){
							$('a[did='+gg[i]+']').parents('td').prev().prev().html(data.time);
						}
						
					}else if(data.success == 0){
						alert('更新失败')
					}
				}	
		})
		}
	})

	//单个更新
	$(document).on('click','.link-update',function(){
		var ids = $(this).attr('pid');
		if(confirm('确认更新?')){
		$.ajax({
				type:"GET",
				url:updcompany,
				data:{u_ids:ids},
				success:function(msg){
					var data = eval('('+msg+')');
					if(data.success == 1){
							$('a[did='+ids+']').parents('td').prev().prev().html(data.time);
					}
				}	
			})
		}
	})

	//审核
	$(document).on('click','.link-audit',function(){
		showBg();
		$('#audit').val($(this).attr('sid'))
	})
	$(document).on('click','.yes',function(){
		var c_id = $('#audit').val();
		var isaudit = $('input[name="audit"]');
		for(var i = 0;i<isaudit.length;i++){
			if(isaudit.eq(i).attr('checked') == 'checked'){
				var isauth = isaudit.eq(i).val();
			}
		}
		$.ajax({
			type:"GET",
			url:auditcompany,
			data:{c_id:c_id,audit:isauth},
			success:function(msg){
				var data = eval('('+msg+')');
				if(data.success==1){
					if(isauth==1){
						$('a[did='+c_id+']').parents('td').prev().prev().prev().prev().html('审核通过');
						closeBg()
					}else if(isauth==2){
						$('a[did='+c_id+']').parents('td').prev().prev().prev().prev().html('审核未通过');
						closeBg()
					}
				}else if(data.success==0){
					closeBg();
				}
			}
		})
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