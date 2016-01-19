<?php /* Smarty version 3.1.27, created on 2016-01-19 19:38:00
         compiled from "/opt/lampp/htdocs/stewie/views/form.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:507867973569e8288a682e1_88867589%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a1ce961008e54b8fe4ba77e4686417a86001454f' => 
    array (
      0 => '/opt/lampp/htdocs/stewie/views/form.tpl',
      1 => 1453228677,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '507867973569e8288a682e1_88867589',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_569e8288a8ee33_58464722',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_569e8288a8ee33_58464722')) {
function content_569e8288a8ee33_58464722 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '507867973569e8288a682e1_88867589';
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Stewie Filter Test</title>
</head>
<body>
    <form action="<?php echo _base_url_;?>
/post" method="post">
        <?php echo csrf;?>

        <input name="email" placeholder="EMAIL" type="email">
        <input type="submit">
    </form>
</body>
</html><?php }
}
?>