
<?php 
$link=mysqli_connect("localhost","root","mysql") or die("連接失敗");
// echo 'in';
mysqli_select_db($link,"message");
mysqli_query($link,"SET NAMES utf8");

$master_id=$_POST["master_id"];
$action_code=$_POST["action_code"];
// echo 'master_id:'.$master_id;

if($action_code=='delete_message'){
      $sql_delete = " delete from message_details where id='$master_id' ";
}
mysqli_query($link,$sql_delete); 

?>



<script type="text/javascript" >
function delete_message(master_id){
      
       document.getElementById("action_code").value='delete_message';
       document.getElementById("master_id").value=master_id;
       document.getElementById("form1").submit();
}

function edit_message(master_id,name,message){
    
       document.getElementById("action_code").value='edit_message';
       document.getElementById("master_id").value=master_id;
       document.getElementById("name").value=name;
       document.getElementById("message").value=message;
       // document.getElementById("form1").submit();
}

</script>

<?php header("Content-Type:text/html; charset=utf-8"); ?>
<html>
<head>
<title></title>
</head>
<body>
<form id='form1' name='form1' method="POST" action="message_test.php">
<h2><strong>留言</strong></h2>
<p>名稱:<input id='name' name="name" cols="52"></p>
<p>內容:</p>
<p><textarea id='message' name="message" rows="8" cols="52"></textarea></p>
<p><input type="submit" value="送出留言"> <input type="reset" value="清除留言"></p>


<?php 
      
     
      $message=$_POST["message"];
      $name=$_POST["name"];
      echo 'message:'.$message.'<br>';
      
      if($master_id==''){
            if (!empty($message)){
                  $sqlStr="insert into message_details (id,message,name,create_time) ";
                  $sqlStr.="values(uuid(),'$message','$name',now())";
                  // echo $sqlStr."<br>";
                  mysqli_query($link,$sqlStr) or die("寫入失敗");
                  echo "留言寫入成功<hr>"; 
            }else{
                  // echo "請輸入留言內容<hr>";
            }
      }else{
            $update_sql=" update message_details set name='$name',message='$message',create_time=now() where id='$master_id'";
            mysqli_query($link,$update_sql) or die("寫入失敗");
            echo "留言更新成功<hr>"; 
            $action_code='';
            $master_id='';
      }
      

      $q=mysqli_query($link,'select * from message_details');
      ?>
      <input type="hidden" id='action_code' name='action_code' value=<?php echo $action_code; ?> >
      <input type="hidden" id='master_id' name='master_id' value="">

      <table border="1" width="60%">
            <tr>
                  <th>名稱</th>
                  <th>內容</th>
                  <th>時間</th>
                  <th>編輯</th>
                  <th>刪除</th>

            </tr>
      <?php
      while($row=mysqli_fetch_row($q)){
            // var_dump($row).'<br>';
          ?>
          <tr>
                  <td>
                      <?php echo $row[1]; ?>
                  </td>
                  <td>
                        <?php echo $row[2] ?> 
                  </td>
                  <td>
                        <?php echo $row[3] ?> 
                  </td>
                  <td>
                        <input type="button" value='編輯' onclick="edit_message('<?php echo $row[0] ?>','<?php echo $row[1] ?>','<?php echo $row[2] ?>' )">
                  </td>
                  <td>
                        <input type="button" value='刪除' onclick="delete_message('<?php echo $row[0] ?>')">
                  </td>

          </tr>
          <?php 
      } 
?>
      </table>


</form>

</body>
</html>