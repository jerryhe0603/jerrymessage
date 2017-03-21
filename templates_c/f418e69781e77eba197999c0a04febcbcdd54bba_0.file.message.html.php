<?php
/* Smarty version 3.1.30, created on 2017-03-15 18:59:30
  from "/data/sites/jerrymessage/templates/message.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58c91e92d704a6_06508846',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f418e69781e77eba197999c0a04febcbcdd54bba' => 
    array (
      0 => '/data/sites/jerrymessage/templates/message.html',
      1 => 1489574038,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58c91e92d704a6_06508846 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_checkboxes')) require_once '/data/sites/smarty/plugins/function.html_checkboxes.php';
?>
<!DOCTYPE html>
<?php echo '<script'; ?>
 type="text/javascript" >

function delete_message(master_id){
      
       document.getElementById("action_code").value='delete_message';
       document.getElementById("master_id").value=master_id;
       document.getElementById("form1").submit();
}

function edit_message(master_id,name,message){
  	// alert('IN');
       document.getElementById("action_code").value='edit_message';
       document.getElementById("master_id").value=master_id;
       document.getElementById("name").value=name;
       document.getElementById("message").value=message;
       // document.getElementById("form1").submit();
}

<?php echo '</script'; ?>
>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
</head>
<body>
	
	<form id='form1' name='form1' method="POST" action="test.php">
		<h2><strong>留言</strong></h2>
		<p><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
:<input id='name' name="name" cols="52"></p>
		<p>內容:</p>
		<p><textarea id='message' name="message" rows="8" cols="52"></textarea></p>
		<p><input type="submit" value="送出留言"> <input type="reset" value="清除留言"></p>
		
		<input type="hidden" id='action_code' name='action_code' value='<?php echo $_smarty_tpl->tpl_vars['action_code']->value;?>
' >
      	<input type="hidden" id='master_id' name='master_id' value="">
		
		<table border="1" width="60%">
			<tr>
        <th><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['details']->value;?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['time']->value;?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['edit']->value;?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['deleted']->value;?>
</th>
        <th><?php echo $_smarty_tpl->tpl_vars['testclass']->value;?>
</th>
      </tr>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['message_arr']->value, 'message');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['message']->value) {
?>
      <tr>
      	<td><?php echo $_smarty_tpl->tpl_vars['message']->value['name'];?>
</td>
      	<td><?php echo $_smarty_tpl->tpl_vars['message']->value['message'];?>
</td>
      	<td><?php echo $_smarty_tpl->tpl_vars['message']->value['create_time'];?>
</td>
      	<td>
      		<input type="button" value='編輯' onclick="edit_message('<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
','<?php echo $_smarty_tpl->tpl_vars['message']->value['name'];?>
','<?php echo $_smarty_tpl->tpl_vars['message']->value['message'];?>
')">
      	</td>
      	<td>
              <input type="button" value='刪除' onclick="delete_message('<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
')">
        </td>
        <td><?php echo $_smarty_tpl->tpl_vars['message']->value['name'];?>
</td>
      </tr>
			    
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

     
      <tr>
        <td>演藝專長</td>
        <td>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['aSpecialty']->value, 'specialty', false, 'k', 'specialty', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['specialty']->value) {
?>
          <input type="checkbox" name="specialty[]" value=<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
 ><?php echo $_smarty_tpl->tpl_vars['specialty']->value;?>

          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </td>
      </tr>

      <tr>
        <td>演藝專長</td>
        <!-- <?php echo smarty_function_html_checkboxes(array(),$_smarty_tpl);?>
使用 -->
        <td>
          <?php echo smarty_function_html_checkboxes(array('name'=>'contact_type_id','options'=>$_smarty_tpl->tpl_vars['aSpecialty']->value,'selected'=>$_smarty_tpl->tpl_vars['check_id']->value),$_smarty_tpl);?>

        </td>
      </tr>
		</table>
	</form>
</body>


</html>

<?php }
}
