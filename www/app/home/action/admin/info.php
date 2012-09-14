<?php 
defined('IN_TS') or die('Access Denied.');
switch($ts){

	//列表 
	case "list":
	
		$arrInfo = $new['home']->findAll('home_info');
	
		include template('admin/info_list');
		break;
	
	//添加 
	case "add":
		
		include template('admin/info_add');
		break;
		
	case "adddo":
	
		$infokey = $_POST['infokey'];
		$title = $_POST['title'];
		$content = $_POST['content'];
		
		$new['home']->create('home_info',array(
		
			'infokey'=>$infokey,
			'title'=>$title,
			'content'=>$content,
		
		));
		
		header('Location: '.SITE_URL.'index.php?app=home&ac=admin&mg=info&ts=list');
	
		break;
		
	//编辑 
	case "edit":
	
		$infoid = $_GET['infoid'];
		$strInfo = $new['home']->find('home_info',array(
		
			'infoid'=>$infoid,
		
		));
	
	
		include template('admin/info_edit');
	
		break;
		
	case "editdo":
	
		$infoid = $_POST['infoid'];
		$infokey = $_POST['infokey'];
		$title = $_POST['title'];
		$content = $_POST['content'];
		
		$new['home']->update('home_info',array(
		
			'infoid'=>$infoid,
		
		),array(
		
			'infokey'=>$infokey,
			'title'=>$title,
			'content'=>$content,
		
		));
		
		header('Location: '.SITE_URL.'index.php?app=home&ac=admin&mg=info&ts=list');
	
		break;
		
	//删除 
	case "delete":
	
		$infoid = $_POST['infoid'];
		$new['home']->delete('home_info',array(
			'infoid'=>$infoid,
		));
		
		qiMsg('删除成功！');
		
		break;
	
	case "about":
		
		$strInfo = $db->once_fetch_assoc("select * from ".dbprefix."home_info where `infokey`='about'");
		
		include template('admin/info_about');
		break;
		
	case "about_do":
		
		$infocontent = $_POST['infocontent'];
		$db->query("update ".dbprefix."home_info set `infocontent`='$infocontent' where `infokey`='about'");
		
		qiMsg("修改成功！");
		
		break;
		
	case "contact":
		$strInfo = $db->once_fetch_assoc("select * from ".dbprefix."home_info where `infokey`='contact'");
		include template('admin/info_contact');
		break;
		
	case "contact_do":
		
		$infocontent = $_POST['infocontent'];
		$db->query("update ".dbprefix."home_info set `infocontent`='$infocontent' where `infokey`='contact'");
		
		qiMsg("修改成功！");
		
		break;
		
	case "agreement":
		$strInfo = $db->once_fetch_assoc("select * from ".dbprefix."home_info where `infokey`='agreement'");
		include template('admin/info_agreement');
		break;
		
	case "agreement_do":
		
		$infocontent = $_POST['infocontent'];
		$db->query("update ".dbprefix."home_info set `infocontent`='$infocontent' where `infokey`='agreement'");
		
		qiMsg("修改成功！");
		
		break;
		
		
	case "privacy":
		$strInfo = $db->once_fetch_assoc("select * from ".dbprefix."home_info where `infokey`='privacy'");
		include template('admin/info_privacy');
		break;
		
	case "privacy_do":
		
		$infocontent = $_POST['infocontent'];
		$db->query("update ".dbprefix."home_info set `infocontent`='$infocontent' where `infokey`='privacy'");
		
		qiMsg("修改成功！");
		
		break;
	
}