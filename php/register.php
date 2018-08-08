<?php
	header("content-type","text/html;charset=utf-8");
	// 1、接收前端数据
	// $name = $_POST['username'];
	$password = $_POST['userword'];
	$phone = $_POST['phone'];
	//2、处理（连接数据库，保存数据）
    $resultStr="";

	// 2、链接数据库，添加到数据库中
	// (1)、建立链接(数据库、服务器)

	$conn = mysql_connect("localhost","root","root");

	// (2)、选择数据库
	mysql_select_db("meizu",$conn);

	// (3)、执行插入语句
	$sqlstr="insert into meizu(password,phone) values('".$password."','".$phone."')";
	mysql_query($sqlstr,$conn);

	// (4)、关闭数据库

	mysql_close($conn);

	//3、响应（告诉前端，保存成功）
	echo "<script>window.open='../index.html'</script>";
?>