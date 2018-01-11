<?php
include ('conf_log.php');
header("Content-type: text/html; charset=utf-8");
//防止乱码
class record {
	public $content = "";
	public $nicheng = "";
	public $state = "";
}

if ($_GET["action"] != "") {
	switch($_GET["action"]) {
		//种类
		//1：新闻   2：会议日志  3：进展公告
		//返回当天所有的聊天记录
		case 0 : {
			$date = $_POST["date"];
			$begin = strtotime($date . '00:00:00');
			$end = strtotime($date . "23:59:59");
			$sql = "select nicheng,content from dunling_chat where time >='$begin' and time<='$end';";
			$result = mysql_query($sql);
			$data = array();
			if (!mysql_num_rows($result)) {
				echo '{"state":0}';
				break;
			}
			while ($row = mysql_fetch_array($result)) {
				$strTemp = new record;
				$strTemp -> nicheng = $row['nicheng'];
				$strTemp -> content = $row['content'];
				$strTemp -> state = 1;
				$data[] = $strTemp;
			}
			echo json_encode($data);
			break;
		}

	}
}
?>