//参加或者感感兴趣
function userDoWish(studyid,status){
	$.ajax({
		type: "POST",
		url: siteUrl+"index.php?app=study&ac=do&ts=dowish",
		data: "studyid="+studyid+"&status="+status,
		beforeSend:function(){
		},
		success:function(result){
			if(result == '0'){
				art.dialog.open(siteUrl+'index.php?app=user&ac=ajax&ts=login', {title: '登录'});
			}else if(result == '1'){
				art.dialog({
					icon: 'warning',
					content: '你已经参加了该课程^_^'
				});
			}else if(result == '2'){
				art.dialog({
					time: 3,
					icon: 'succeed',
					content: '参加课程成功^_^'
				});
				window.location.reload(); 
			}
		}
	});
}

//取消参加课程
function cancelStudy(studyid,userid){
	art.dialog.confirm('确定不参加了吗？', function(){
	$.ajax({
		type: "POST",
		url: siteUrl+"index.php?app=study&ac=do&ts=cancel",
		data: "studyid="+studyid+"&userid="+userid,
		beforeSend:function(){
		},
		success:function(result){
			if(result == '1'){
				art.dialog({
					time: 3,
					icon: 'succeed',
					content: '取消参加课程^_^'
				});
				window.location.reload(); 
			}
		}
	});
	});
}

//参加课程
function doStudy(studyid,userid){
	$.ajax({
		type: "POST",
		url: siteUrl+"index.php?app=study&ac=do&ts=do",
		data: "studyid="+studyid+"&userid="+userid,
		beforeSend:function(){
		},
		success:function(result){
			if(result == '1'){
				art.dialog({
					time: 3,
					icon: 'succeed',
					content: '参加课程成功^_^'
				});
				window.location.reload(); 
			}
		}
	});
}