<?php
	header("content-type","text/html;charset=utf-8");
	// 1、接收前端数据
	// $name = $_POST['username'];
	$password = $_POST['userword'];
	$phone = $_POST['phone'];
	//2、处理（连接数据库，保存数据）
    $resultStr="";
    //1)、连接数据库（搭桥）
    $conn = mysql_connect("localhost","root","root");
    if(!$conn){
    	//die("Could not connect: ".mysql_error());
    	$resultStr="connect fail";
    }else{
        //2)、选择数据库（目标）
	   	mysql_select_db("meizu",$conn);    
	    //3)、执行SQL语句（添加语句）（运输）
	    //3.1)、查询该用户名是否被注册；
	    
	    $sqlstr = "select * from phoneid where phone= '".$phone."'";
	    $result = mysql_query($sqlstr,$conn);//查询语句的返回值是表格
	    $rows = mysql_num_rows($result);//查询表格中有多少行
	    if($rows>0){//说明该用户名在数据库中是存在的。
	    	$resultStr="the phone exists";	
	    }else{
		  	$sqlstr="insert into phoneid(password,phone) values('".$password."','".$phone."')";
		    $str = mysql_query($sqlstr,$conn);
		    if($str==1){
			    $resultStr="reg succes";
			}else{
				$resultStr="reg fail";
			}
	    }
	    //4)、关闭数据库（拆桥）
	    mysql_close($conn);
	}
	
    //3、输出（响应）
 	header("Location:../index.html"); 
    
?>