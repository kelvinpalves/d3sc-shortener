<?php
/* Smarty version 3.1.30-dev/71, created on 2016-05-25 10:24:01
  from "/var/www/d3sc-shortener/view/template/home.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/71',
  'unifunc' => 'content_5745a771258b28_08493900',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0139e6363f85ef7fb2337124e22202c18e145d2a' => 
    array (
      0 => '/var/www/d3sc-shortener/view/template/home.tpl',
      1 => 1464182636,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5745a771258b28_08493900 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
    <title>D3.sh - Free Shorter</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'>
    <meta charset="utf-8" >
    <link rel='stylesheet' href='assets/css/default.css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
    <div class='banner'>
        <div class='wrap'>
            <div class='banner-text'>
                <h1>D3.sh - Free Shorter</h1>
                <h2>Faça as suas URL administrável.</h2>
                <div class='form-info'>
                    <form method='post' action=''>
                        <input type='text' class='text' placeholder='http://' name='shorter_new' required>
                        <input type='submit' value='Encurtar !'>
                    </form>
                </div>
            </div>
        </div>
        <div class='clear'> </div>

        <?php if ($_smarty_tpl->tpl_vars['exec']->value == true) {?>
        <center>
            <br><br>
            <h1 class='h2-preview'>URL Encurtada</h1>
            <a href='<?php echo $_smarty_tpl->tpl_vars['descShort']->value->getShortBaseUrl();
echo $_smarty_tpl->tpl_vars['descShort']->value->getShortUrlCode();?>
' class='url-preview'><?php echo $_smarty_tpl->tpl_vars['descShort']->value->getShortBaseUrl();
echo $_smarty_tpl->tpl_vars['descShort']->value->getShortUrlCode();?>
</a>
        </center>";
        <?php }?>

    </div>
</body>
</html> <?php }
}
