$(function(){
	pageInit("bbcode");
});
function pageInit(textareaid)
{
	
	var plugins={
	
		//ThinkSAAS附件
		tsAttach:{c:'tsAttach',t:'我的附件',e:function(){
			var _this=this;
			  _this.saveBookmark();
			 _this.showIframeModal('我的附件',siteUrl+'index.php?app=attach&ac=ajax&ts=my',function(v){  _this.pasteHTML(v,false); },400,420);
		}},
		
		//ThinkSAAS相册
		tsPhoto:{c:'tsPhoto',t:'我的相册',e:function(){
			var _this=this;
			 _this.saveBookmark();
			 _this.showIframeModal('我的相册',siteUrl+'index.php?app=photo&ac=ajax&ts=album',function(v){  _this.pasteHTML(v,false); },400,420);
		}},
		
		//插入远程音乐
		tsMusic:{c:'tsMusic',t:'插入远程音乐',h:1,e:function(){
			var _this=this;
			var title = '';
			
			var htmlCode=$('<div>插入MP3音乐</div><div>地址：<input type="text" id="xheMusicUrl" value="http://" class="xheText" /></div>'+
						   '<div>标题：<input type="text" id="xheMusicTit" value="" class="xheText" /></div><div style="text-align:right;"><input type="button" id="xheSave" value="确定" /></div>');
			var jCode=$(htmlCode),jSave=$('#xheSave',jCode),jValue=$('#xheMusicUrl',jCode),jTit=$('#xheMusicTit',jCode);
			jSave.click(function(){
				if(jValue.val() !='http://'){
					if(jTit.val() !='') { title = ','+jTit.val();}
					_this.pasteHTML('[mp3='+jValue.val()+title+']',false);
				}
				_this.hidePanel();
				return false;	
			});
			
			_this.saveBookmark();
			_this.showDialog(htmlCode);
		}},
		
		//插入远程视频
		tsVideo:{c:'tsVideo',t:'插入视频地址',h:1,e:function(){
			var _this=this;
			_this.saveBookmark();
			var htmlCode=$('<div>插入视频地址(支持优酷土豆等播放地址)</div><div><img src="" id="urlImg" style="display:none"/></div><div>地址: <input type="text" id="xheVidoeUrl" value="" class="xheText" /></div><div>标题: <input type="text" id="xheVidoeTitle" value="" class="xheText" /></div><div style="text-align:right;"><input type="button" id="xheSave" value="解析" /></div>');
			var jCode=$(htmlCode),jSave=$('#xheSave',jCode),jimg=$('#urlImg',jCode),jtitle=$('#xheVidoeTitle',jCode),jValue=$('#xheVidoeUrl',jCode);
			jSave.click(function(){
				if(jimg.attr('src') != '')
				{
					_this.pasteHTML('[video='+rsJson.result.coverurl+','+rsJson.result.flash+','+jtitle.val()+']',false);
					_this.hidePanel();
				}
				if(jValue.val() !='')
				{
					url = jValue.val();
					
					var urls = siteUrl+'index.php?app=pubs&ac=plugin&plugin=xheditor&in=video';
					jSave.val('稍等...');jSave.attr('disabled',true);
					$.post(urls,{parseurl:url},function(rs){
								rsJson = eval('(' + rs + ')');
							if(rsJson.err != 0)
							{
								jSave.val('解析网址');jSave.attr('disabled',false);
								alert(rsJson.msg);	return false;
							}else{
								jSave.val('完成');jSave.attr('disabled',false);
								jimg.attr('src',rsJson.result.coverurl);jimg.show();
								jtitle.val(rsJson.result.title);
							 return false;
							}		
					})
				}
				
				return false;	
			});
			_this.saveBookmark();
			_this.showDialog(htmlCode);
		}},
	
		//代码
		Code:{c:'btnCode',t:'插入代码',h:1,e:function(){
			var _this=this;
			var htmlCode='<div><select id="xheCodeType"><option value="html">HTML/XML</option><option value="js">Javascript</option><option value="css">CSS</option><option value="php">PHP</option><option value="java">Java</option><option value="py">Python</option><option value="pl">Perl</option><option value="rb">Ruby</option><option value="cs">C#</option><option value="c">C++/C</option><option value="vb">VB/ASP</option><option value="">其它</option></select></div><div><textarea id="xheCodeValue" wrap="soft" spellcheck="false" style="width:300px;height:100px;" /></div><div style="text-align:right;"><input type="button" id="xheSave" value="确定" /></div>';			var jCode=$(htmlCode),jType=$('#xheCodeType',jCode),jValue=$('#xheCodeValue',jCode),jSave=$('#xheSave',jCode);
			jSave.click(function(){
				_this.loadBookmark();
				_this.pasteText('[code='+jType.val()+']\r\n'+jValue.val()+'\r\n[/code]');
				_this.hidePanel();
				return false;	
			});
			_this.saveBookmark();
			_this.showDialog(jCode);
		}},
		Flv:{c:'btnFlv',t:'插入Flv视频',h:1,e:function(){
			var _this=this;
			var htmlFlv='<div>Flv文件:&nbsp; <input type="text" id="xheFlvUrl" value="http://" class="xheText" /></div><div>宽度高度: <input type="text" id="xheFlvWidth" style="width:40px;" value="480" /> x <input type="text" id="xheFlvHeight" style="width:40px;" value="400" /></div><div style="text-align:right;"><input type="button" id="xheSave" value="确定" /></div>';
			var jFlv=$(htmlFlv),jUrl=$('#xheFlvUrl',jFlv),jWidth=$('#xheFlvWidth',jFlv),jHeight=$('#xheFlvHeight',jFlv),jSave=$('#xheSave',jFlv);
			jSave.click(function(){
				_this.loadBookmark();
				_this.pasteText('[flv='+jWidth.val()+','+jHeight.val()+']'+jUrl.val()+'[/flv]');
				_this.hidePanel();
				return false;	
			});
			_this.saveBookmark();
			_this.showDialog(jFlv);
		}}
	},emots={
		msn:{name:'MSN',count:40,width:22,height:22,line:8},
		pidgin:{name:'Pidgin',width:22,height:25,line:8,list:{smile:'微笑',cute:'可爱',wink:'眨眼',laugh:'大笑',victory:'胜利',sad:'伤心',cry:'哭泣',angry:'生气',shout:'大骂',curse:'诅咒',devil:'魔鬼',blush:'害羞',tongue:'吐舌头',envy:'羡慕',cool:'耍酷',kiss:'吻',shocked:'惊讶',sweat:'汗',sick:'生病',bye:'再见',tired:'累',sleepy:'睡了',question:'疑问',rose:'玫瑰',gift:'礼物',coffee:'咖啡',music:'音乐',soccer:'足球',good:'赞同',bad:'反对',love:'心',brokenheart:'伤心'}},
		ipb:{name:'IPB',width:20,height:25,line:8,list:{smile:'微笑',joyful:'开心',laugh:'笑',biglaugh:'大笑',w00t:'欢呼',wub:'欢喜',depres:'沮丧',sad:'悲伤',cry:'哭泣',angry:'生气',devil:'魔鬼',blush:'脸红',kiss:'吻',surprised:'惊讶',wondering:'疑惑',unsure:'不确定',tongue:'吐舌头',cool:'耍酷',blink:'眨眼',whistling:'吹口哨',glare:'轻视',pinch:'捏',sideways:'侧身',sleep:'睡了',sick:'生病',ninja:'忍者',bandit:'强盗',police:'警察',angel:'天使',magician:'魔法师',alien:'外星人',heart:'心动'}}
	};
	
	//完整编辑器
	$('#' + textareaid).xheditor({plugins:plugins,tools:'full',skin:'nostyle',showBlocktag:false,forcePtag:false,beforeSetSource:ubb2html,beforeGetSource:html2ubb,emots:emots,emotMark:true,shortcuts:{'ctrl+enter':submitForm}});
	
	var fulltools = 'Paste,|,Bold,FontSize,Italic,Underline,Strikethrough,|,FontColor,BackColor,Align,List,Outdent,Indent,|,Link,Unlink,|,tsAttach,tsPhoto,tsMusic,Flash,tsVideo,Emot,|Fullscreen';
	var minitools = 'Bold,FontColor,Link,Unlink,|,tsAttach,tsPhoto,tsMusic,tsVideo,Flash,Emot,|Fullscreen';
	
	$('#bbcodef').xheditor({plugins:plugins,tools:fulltools,skin:'nostyle',cleanPaste:3,showBlocktag:false,forcePtag:false,beforeSetSource:ubb2html,beforeGetSource:html2ubb,emots:emots,emotMark:true,shortcuts:{'ctrl+enter':submitForm}});
	
	$('#bbcodem').xheditor({plugins:plugins,tools:minitools,skin:'nostyle',cleanPaste:3,showBlocktag:false,forcePtag:false,beforeSetSource:ubb2html,beforeGetSource:html2ubb,emots:emots,emotMark:true,shortcuts:{'ctrl+enter':submitForm}});
	
}
function submitForm(){$('#submitForm').submit();}
