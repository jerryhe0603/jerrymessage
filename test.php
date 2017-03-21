<?php

require "main.php";

class Date
{
    public $year;
    public $month;
    public $day;
    
    static public $aSpecialty = array(
                                    '0' => '作詞',
                                    '1' => '作曲',
                                    '2' => '編曲',
                                    '3' => '演唱',
                                    '4' => '戲劇',
                                    '5' => '主持',
                                    '6' => '舞蹈',
                                    '7' => '模仿',
                                    '8' => '魔術',
                                    '9' => '走秀'
                                );

    public function __construct($date)
    {
        $arr = explode('-', $date);
        $this->year = $arr[0];
        $this->month = $arr[1];
        $this->day = $arr[2];
    }
 
    public function localFormat()
    {
        return $this->year . '-' .$this->month . '-' . $this->day;
    }
 
    public function englishFormat()
    {
        return $this->month . '/' .$this->day . '/' . $this->year;
    }
}
 // var_dump($_POST['contact_type_id']);
$postDate = '2016-06-02'; # 假設資料庫取出來的發文日期長這樣
 
$date = new Date($postDate);
 
// if (/* 判斷是否為台灣人身份 */) {
//     echo $date->localFormat();
// } else { // 英語人士身份
//     echo $date->englishFormat();
// }



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

while($row=mysqli_fetch_array($q)){
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
$smarty->assign("testclass", $date->localFormat());
// 上面兩行也可以用這行代替
// $smarty->assign(array("title" => "測試用的網頁標題", "content" => "測試用的網頁內容"));

//練習用
//{html_checkboxes}使用
$check_id_arr = array(0,2,8);

$aSpecialty = Date::$aSpecialty;
$smarty->assign('aSpecialty',$aSpecialty);
$smarty->assign('check_id',$check_id_arr);

$smarty->assign( 'data', array(1,2,3,4,5,6,7,8,9) );
$smarty->assign( 'tr', array('bgcolor="#eeeeee"','bgcolor="#dddddd"') );

$smarty->display('message.html');
?>