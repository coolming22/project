<?php
	//连接数据库
	$mysql = new mysqli("localhost","root","","project");
	//判断数据库连接是否正确
	if($mysql->connect_errno){
		die($mysql->connect_errno);
	}
	//将查询内容设置成utf-8格式
	$mysql->query("set names utf8");
	//创建查询sql语句
	$sqlstr ="select prj_id,prj_title,prj_from,prj_price from travel ORDER BY prj_sold desc limit 0,16";
	//执行sql语句
	$result = $mysql ->query($sqlstr);
	// var_dump($result);
	
	//将查询出来的数据放到数组中
	//创建数组
	$myArray = array();
	
	//fetch_assoc:查询出每一条在result中数据
	while($record = $result->fetch_assoc()){
		array_push($myArray,$record);
	};
		// echo count($myArray);
	 echo json_encode($myArray);
?>