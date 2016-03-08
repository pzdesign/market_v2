<?php //netteCache[01]000367a:2:{s:4:"time";s:21:"0.01616800 1390011788";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:53:"C:\xampp\htdocs\market\app\templates\Admin\motd.latte";i:2;i:1390011724;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\xampp\htdocs\market\app\templates\Admin\motd.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '2sovizxpjv')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbae895ce6fb_content')) { function _lbae895ce6fb_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>

<ul class="nav nav-tabs">
  <li><a href="<?php echo htmlSpecialChars($_control->link("default")) ?>">Home</a></li>
  <li><a href="<?php echo htmlSpecialChars($_control->link("admins")) ?>">Administrátoři</a></li>
  <li><a>Itemy</a></li>
  <li><a href="<?php echo htmlSpecialChars($_control->link("coupons")) ?>">Slevové kupóny</a></li>
  <li class="active"><a href="<?php echo htmlSpecialChars($_control->link("motd")) ?>
">MOTD</a></li>
</ul>
<br>
<h3>Aktuální MOTD</h3>
<div id="<?php echo $_control->getSnippetId('actualMotd') ?>"><?php call_user_func(reset($_l->blocks['_actualMotd']), $_l, $template->getParameters()) ?>
</div><h3>Změnit MOTD</h3>
<p style="font-style: italic">Můžete používat HTML tagy. Pokud chcete MOTD vypnout, <a class="ajax" href="<?php echo htmlSpecialChars($_control->link("disableMotd!")) ?>
">klikněte sem</a></p>
<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = $_control["editMotdForm"], array('class' => 'ajax')) ?>
    <?php echo $_form["motd"]->getControl() ?>

    <?php echo $_form["submit"]->getControl() ?>

<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ;
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb0bcb8072e4_title')) { function _lb0bcb8072e4_title($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><h1>Administrace</h1>
<?php
}}

//
// block _actualMotd
//
if (!function_exists($_l->blocks['_actualMotd'][] = '_lbd2325ea2d6__actualMotd')) { function _lbd2325ea2d6__actualMotd($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('actualMotd', FALSE)
;if ($motd !== null) { ?><p>Aktuální motd vypadá takto:</p>
<?php } if ($motd !== null) { ?><div class='alert alert-success'><?php echo $motd ?></div>
<?php } if ($motd == null) { ?><p>Motd není nastaveno.</p>
<?php } 
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