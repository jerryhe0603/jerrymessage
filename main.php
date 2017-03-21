<?php
// put full path to Smarty.class.php
require('/data/sites/smarty/Smarty.class.php');
$smarty = new Smarty();
$smarty->template_dir = '/data/sites/jerrymessage/templates';
$smarty->compile_dir = '/data/sites/jerrymessage/templates_c';
// $smarty->cache_dir = '/var/smarty/cache';
$smarty->config_dir = '/data/sites/jerrymessage/configs';

// $smarty->assign('name', 'Ned');
// $smarty->display('message.html');
?>
