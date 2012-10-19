<?php 

switch($ts){

	case "":
	
		include template('test');
		break;
		
	case "do":
	
		tsXupload('1','test','jpg');
	
		break;

}