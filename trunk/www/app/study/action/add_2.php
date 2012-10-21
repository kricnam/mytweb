<?php
defined('IN_TS') or die('Access Denied.');

$userid = intval($TS_USER['user']['userid']);
 
if($userid =='0') header("Location: ".SITE_URL."index.php?app=user&ac=login");

$groupid = isset($_GET['groupid']) ? $_GET['groupid'] : '0';
$studyid = isset($_GET['studyid']) ? $_GET['studyid'] : '';
$title = '发布课程-发布';
include template("add_2");
