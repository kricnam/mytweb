<?php 
defined('IN_TS') or die('Access Denied.');
//解析视频URL
function formPost($url,$post_data){
	$o='';
	foreach ($post_data as $k=>$v){
		$o.= "$k=".urlencode($v)."&";
	}
	$post_data=substr($o,0,-1);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
	$result = curl_exec($ch);
	return $result;
}

$url = $_POST['parseurl'];
$urlArr = parse_url($url);
$domainArr = explode('.',$urlArr['host']);
$data['type'] = $domainArr[count($domainArr)-2];
$str = formPost('http://share.pengyou.com/json.php?mod=usershare&act=geturlinfo',array('url'=>$url));
echo $str;