<?php
/* Smarty version 4.3.0, created on 2023-05-25 14:41:00
  from 'D:\wamp\sites\sod2a2023oop\project3\template\registratieform-signIn.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_646f575ce5afd6_39967961',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c27e62df9b5b413ca2cf683c543b5e4572402884' => 
    array (
      0 => 'D:\\wamp\\sites\\sod2a2023oop\\project3\\template\\registratieform-signIn.tpl',
      1 => 1685018445,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646f575ce5afd6_39967961 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10949119646f575ce59008_70930350', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "template/layout-signIn.tpl");
}
/* {block "content"} */
class Block_10949119646f575ce59008_70930350 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_10949119646f575ce59008_70930350',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h1 class="mt-5">Sticky footer with fixed navbar</h1>
    <form action="index.php?action=register" method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Email address</label>
            <input type="text" name="username" class="form-control" id="username">
        </div>
        <div class="mb-3">
            <label for="password1" class="form-label">Password</label>
            <input type="password" name="password1" class="form-control" id="password1">
        </div>
        <div class="mb-3">
            <label for="password2" class="form-label">Herhaal Password</label>
            <input type="password" name="password2" class="form-control" id="password2">
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
<?php
}
}
/* {/block "content"} */
}
