<?php
/* Smarty version 3.1.34-dev-7, created on 2019-02-22 08:32:28
  from 'E:\webdev\customMVC\app\home\view\Index\student_info.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5c6fb39cccd464_24670106',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b49871a36d694f876acaed82f33244c83bfea97b' => 
    array (
      0 => 'E:\\webdev\\customMVC\\app\\home\\view\\Index\\student_info.html',
      1 => 1550824346,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c6fb39cccd464_24670106 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        table{
            border: 1px solid #000;
        }
        td{
            border: 1px solid #000;
        }
    </style>
</head>
<body>
<table>
    <?php if (isset($_smarty_tpl->tpl_vars['res']->value['id'])) {?>
    <tr><td>id</td><td>name</td><td>age</td></tr>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['res']->value['id'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['res']->value['name'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['res']->value['age'];?>
</td></tr>
    <?php }?>
</table>

</body>
</html><?php }
}
