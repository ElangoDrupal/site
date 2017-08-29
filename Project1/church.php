<?php 

	$localhost 	= 	"localhost";
	$root		=	"root";
	$password	=	''; 
	/*$localhost 	= 	"db618224119.db.1and1.com";
	$root		=	"dbo618224119";
	$password	=	'demowork@123#'; */
	 
	$con = mysql_connect($localhost,$root,$password);	
	if (!$con) 
	{
		die('Could not connect: ' . mysql_error());
	}	
	//$sql = mysql_select_db('db618224119',$con);
	$sql = mysql_select_db('church',$con);
?>