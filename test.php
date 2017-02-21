<?php
include "main.php";

//撈sql
$link=mysqli_connect("localhost","root","mysql") or die("連接失敗");
// echo 'in';
mysqli_select_db($link,"message");
mysqli_query($link,"SET NAMES utf8");

$master_id=$_POST["master_id"];
$action_code=$_POST["action_code"];
$message=$_POST["message"];
$name=$_POST["name"];
// echo 'message:'.$message.'<br>';

if($action_code=='delete_message'){
      $sql_delete = " delete from message_details where id='$master_id' ";
}
mysqli_query($link,$sql_delete); 
  
if($master_id==''){
	if (!empty($message)){
	    $sqlStr="insert into message_details (id,message,name,create_time) ";
        $sqlStr.="values(uuid(),'$message','$name',now())";
        // echo $sqlStr."<br>";
        mysqli_query($link,$sqlStr) or die("寫入失敗");
        // echo "留言寫入成功<hr>"; 
        }else{
              // echo "請輸入留言內容<hr>";
        }
}else{
	$update_sql=" update message_details set name='$name',message='$message',create_time=now() where id='$master_id'";
	mysqli_query($link,$update_sql) or die("寫入失敗");
	// echo "留言更新成功<hr>"; 
	$action_code='';
    $master_id='';
}
  

$q=mysqli_query($link,'select * from message_details');

//
$message_arr = array();

while($row=mysqli_fetch_row($q)){
	$message_arr[] = $row;
}

$smarty->assign('message_arr', $message_arr);
$smarty->assign("title", "測試用的網頁標題");
$smarty->assign("content", "測試用的網頁內容");
$smarty->assign("name", "名稱");
$smarty->assign("details", "內容");
$smarty->assign("time", "時間");
$smarty->assign("edit", "編輯");
$smarty->assign("deleted", "刪除");
// 上面兩行也可以用這行代替
// $smarty->assign(array("title" => "測試用的網頁標題", "content" => "測試用的網頁內容"));
$smarty->display('message.html');
?>