<?php /* Smarty version 3.1.27, created on 2016-01-18 01:57:06
         compiled from "/opt/lampp/htdocs/stewie/views/welcome.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2126186800569c386295e430_17750416%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '963d5c0fb500478a1d600ec3539ecee869c7237c' => 
    array (
      0 => '/opt/lampp/htdocs/stewie/views/welcome.tpl',
      1 => 1453078179,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2126186800569c386295e430_17750416',
  'variables' => 
  array (
    'message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_569c3862990c96_90607124',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_569c3862990c96_90607124')) {
function content_569c3862990c96_90607124 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2126186800569c386295e430_17750416';
echo $_smarty_tpl->tpl_vars['message']->value;

}
}
?>