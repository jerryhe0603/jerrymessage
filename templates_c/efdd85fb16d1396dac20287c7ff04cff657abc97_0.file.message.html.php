<?php
/* Smarty version 3.1.30, created on 2017-02-21 14:39:51
  from "/data/sites/message/templates/message.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58abe0b79375a6_16324965',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'efdd85fb16d1396dac20287c7ff04cff657abc97' => 
    array (
      0 => '/data/sites/message/templates/message.html',
      1 => 1487659186,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58abe0b79375a6_16324965 (Smarty_Internal_Template $_smarty_tpl) {
?>

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

            </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['message_arr']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
            <tr>
            	<td><?php echo $_smarty_tpl->tpl_vars['item']->value[1];?>
</td>
            	<td><?php echo $_smarty_tpl->tpl_vars['item']->value[2];?>
</td>
            	<td><?php echo $_smarty_tpl->tpl_vars['item']->value[3];?>
</td>
            	<td>
            		<input type="button" value='編輯' onclick="edit_message('<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
','<?php echo $_smarty_tpl->tpl_vars['item']->value[1];?>
','<?php echo $_smarty_tpl->tpl_vars['item']->value[2];?>
')">
            	</td>
            	<td>
                    <input type="button" value='刪除' onclick="delete_message('<?php echo $_smarty_tpl->tpl_vars['item']->value[0];?>
')">
                </td>
            </tr>
			    
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</table>
	</form>
</body>


</html>

<?php }
}
