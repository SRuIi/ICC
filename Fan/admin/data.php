<?php
	include('config.php');
	header("Content-type: text/html; charset=utf-8"); 
	//防止乱码
	class isnow
	{
		public $content="";
		public $id="";
		public $state="";
	}
	class all
	{
		public $content="";
		public $id="";
		public $state="";
		public $title="";
		public $author="";
		public $createDate="";
	}
	class category
	{
		public $content="";
		public $id="";
		public $state="";
		public $title="";
		public $author="";
		public $createDate="";
	}
	class record
	{
		public $content="";
		public $nicheng="";
		public $state="";
	}
	

	if($_GET["action"]!="")
	{
		switch($_GET["action"])
		{
			//种类
			//插入文章|1：ICC公告   2：交易汇报  3：资本汇报 4：新闻资讯
			case 0:{
				$category=$_POST["category"];
				$title=$_POST["title"];
				$author=$_POST["author"];
				$content=$_POST["content"];
				$date=$_POST["date"];
				$content= str_replace(array("\r\n", "\r", "\n"), "<br/>", $content);
				$sql="INSERT INTO announcement (category,title,author,content,createDate) values ('$category','$title','$author','$content','$date')";
				$res=mysql_query($sql);
				break;
			}
			/* 获取所有最新消息*/
			case 1:
			{
				$sql="select * from announcement order by createDate desc";
		        $result=mysql_query($sql);
				$data =array();
				if (!mysql_num_rows($result))  
		        {  
		            echo '{"state":0}';
		            break;
		        }  
				while($row = mysql_fetch_array($result))
			  	{		
			  		$strTemp = new all;
					$strTemp->id=$row['id'];
					$strTemp->title=$row['title'];
					$strTemp->author=$row['author'];
					$strTemp->content=$row['content'];
					$strTemp->createDate=$row['createDate'];
					$strTemp->state = 1;
				  	$data[]=$strTemp;	
			  	}
				echo json_encode($data);
				break;
			}
			
			/*分类返回最新消息*/
			//1：ICC公告   2：交易汇报  3：资本汇报 4：新闻资讯
			case 2:
			{
				$category=$_POST["category"];
				$sql="select * from announcement where category='$category'";
		        $result=mysql_query($sql);
				$data =array();
				if (!mysql_num_rows($result))  
		        {  
		            echo '{"state":0}';
		            break;
		        }  
				while($row = mysql_fetch_array($result))
			  	{		
			  		$strTemp = new category;
					$strTemp->id=$row['id'];
					$strTemp->title=$row['title'];
					$strTemp->author=$row['author'];
					$strTemp->content=$row['content'];
					$strTemp->createDate=$row['createDate'];
					$strTemp->state = 1;
				  	$data[]=$strTemp;	
			  	}
				echo json_encode($data);
				break;
			}
			/*分类返回文章详情*/
			case 3:
			{
				$id=$_POST["id"];
				$sql="select * from announcement where id='$id'";
		        $result=mysql_query($sql);
				$data =array();
				if (!mysql_num_rows($result))  
		        {  
		            echo '{"state":0}';
		            break;
		        }  
				while($row = mysql_fetch_array($result))
			  	{		
			  		$strTemp = new category;
					$strTemp->id=$row['id'];
					$strTemp->title=$row['title'];
					$strTemp->author=$row['author'];
					$strTemp->content=$row['content'];
					$strTemp->createDate=$row['createDate'];
					$strTemp->state = 1;
				  	$data[]=$strTemp;	
			  	}
				echo json_encode($data);
				break;
			}
			//订阅邮箱
			case 4:
			{
				$email=$_POST["email"];
				$date=date("Y-m-d H:i:s");
				mysql_query("INSERT INTO email (email,createDate) values('$email','$date')");
				break;
			}
			//删除文章
			case 6:
			{
				$id=$_POST["id"];
				$sql="delete from announcement where id='$id'";
		        mysql_query($sql);
		        echo '{"state":1}';
		        break;
			}
			
			
			
			//end
		}
	}
?>