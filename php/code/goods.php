<?php
	$index = $_GET["name"];
//	echo $index;
	
	//连接数据库
	$mysql = new mysqli("localhost","root","","project");
	//判断数据库连接是否正确
	if($mysql->connect_errno){
		die($mysql->connect_errno);
	}
	//将查询内容设置成utf-8格式
	$mysql->query("set names utf8");
	//创建查询sql语句
	//把传入的字符串用=号分割成数组，如果数组第0个前面是prj_land就进行售出量排序查询
	$smallArr = explode("=",$index);
//	echo ($smallArr[0]);
	if(($smallArr[0])=="prj_land"){
		$sqlstr ="select * from travel where $index ORDER BY prj_sold desc";
	}else{
		$sqlstr ="select * from travel where $index";
	}
	
//	$sqlstr ="select * from travel where $index ORDER BY prj_sold desc";
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