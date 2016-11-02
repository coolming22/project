<?php
		$valueId = $_GET["valueId"];
		$valueFrom=$_GET["valueFrom"];
//		echo json_encode($valueFrom);
	
	//连接数据库
	$mysql = new mysqli("localhost","root","","project");
	//判断数据库连接是否正确
	if($mysql->connect_errno){
		die($mysql->connect_errno);
	}
	//将查询内容设置成utf-8格式
	$mysql->query("set names utf8");
	//创建查询sql语句
	$sqlstr2 ="select * from travel where prj_id=\"$valueId\"";
	//查询当前id左右相邻的
	$sqlstr1 ="select prj_id,prj_title,prj_from from travel where prj_from=\"$valueFrom\"";
	//执行sql语句
	$result2 = $mysql ->query($sqlstr2);
	$result1 = $mysql ->query($sqlstr1);
	// var_dump($result);
	
	//将查询出来的数据放到数组中
	//创建数组
	$myArray2 = array();
	$myArray1 = array();
	//fetch_assoc:查询出每一条在result中数据
	while($record2 = $result2->fetch_assoc()){
		array_push($myArray2,$record2);
	};
	while($record1 = $result1->fetch_assoc()){
		array_push($myArray1,$record1);
	};
	$nowArray = [$myArray2,$myArray1];
	
		// echo count($myArray);
	 echo json_encode($nowArray);
 
?>