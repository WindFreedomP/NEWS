<?php

	//获取所有新闻内容并显示

	//操作数据库获取数据
	include_once 'news_public.php';

	//组织SQL获取所有新闻信息
	$sql = "select * from n_news";
	//执行
	$res = my_error($sql);				//拿到结果集

	//循环遍历所有结果
	$news = array();					//保存取出的记录（数组）

	//方案1：获取结果集中记录数，然后for循环
	/*
	$num = mysql_num_fields($res);
	for($i = 0;$i < $num;$i++){
		$news[] = mysql_fetch_assoc($res);
	}
	*/

	//方案2：利用while循环，每次取到数据之后判断保存数据的结果，只要结果不为false，那么一直取
	while($row = mysql_fetch_assoc($res)){
		$news[] = $row;
	}
	// echo "<h1>方案2</h1>";
	// echo '<pre>';
	// print_r($news);
	// echo '</pre>';

	//方案3：利用mysql_fetch_array()获得关联或者索引数组
	//注意时是一行行记录读取的
	// while($new = mysql_fetch_array($res,MYSQL_ASSOC)){
	// 	$news[$i] = $new;
	// }
	// echo '<pre>';
	// print_r($news);
	// echo '</pre>';
	//包含显示模板（HTML）
	include_once 'news.html';
?>