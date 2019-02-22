<?php
/* Smarty version 3.1.34-dev-7, created on 2019-02-22 11:54:48
  from 'E:\webdev\customMVC\app\home\view\Student\info_table.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5c6fe3081f5734_98765618',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '29fe092dded96ac8e9d719981884b6e68d0a0e41' => 
    array (
      0 => 'E:\\webdev\\customMVC\\app\\home\\view\\Student\\info_table.html',
      1 => 1550824346,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c6fe3081f5734_98765618 (Smarty_Internal_Template $_smarty_tpl) {
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
