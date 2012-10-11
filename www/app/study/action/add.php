<?php
defined('IN_TS') or die('Access Denied.');

$userid = intval($TS_USER['user']['userid']);
 
if($userid =='0') header("Location: ".SITE_URL."index.php/user/login");

$groupid = isset($_GET['groupid']) ? $_GET['groupid'] : '0';

//课程类型
$arrType = $db->fetch_all_assoc("select * from ".dbprefix."study_type");

//调出省份数据
$province = $new['study']->findAll('area_province');

$title = '发布课程-填写课程信息';
include template("add");