<?php
defined('IN_TS') or die('Access Denied.');

$userid = intval($TS_USER['user']['userid']);
 
if($userid =='0') header("Location: ".SITE_URL."index.php/user/login");

$groupid = isset($_GET['groupid']) ? $_GET['groupid'] : '0';
$studyid = isset($_GET['studyid']) ? $_GET['studyid'] : '';
if(!empty($studyid))
$strStudy = $db->once_fetch_assoc("select * from ".dbprefix."study where userid='".$userid."' and studyid='".$studyid."'");
$title = '发布课程-填写教师简介';
include template("add_1");