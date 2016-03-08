<?php //netteCache[01]000363a:2:{s:4:"time";s:21:"0.61766100 1389635729";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:49:"/var/www/market/app/templates/Admin/default.latte";i:2;i:1389631093;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: /var/www/market/app/templates/Admin/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '8jyqgs4mdr')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbdc5791568f_content')) { function _lbdc5791568f_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>

<ul class="nav nav-tabs">
  <li class="active"><a>Home</a></li>
  <li><a href="<?php echo htmlSpecialChars($_control->link("admins")) ?>">Administrátoři</a></li>
  <li><a href="<?php echo htmlSpecialChars($_control->link("items")) ?>">Itemy</a></li>
  <li><a href="<?php echo htmlSpecialChars($_control->link("coupons")) ?>">Slevové kupóny</a></li>
</ul>
&nbsp;
<p>Vítejte v administraci. Zde můžete přidávat/odebírat administrátory, přidávat, editovat nebo mazat itemy, vytvářet, editovat nebo mazat slevové poukazy</p><?php
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb6c543f4396_title')) { function _lb6c543f4396_title($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><h1>Administrace</h1>
<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>

<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 