<?php //netteCache[01]000364a:2:{s:4:"time";s:21:"0.45400600 1457509358";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:50:"C:\xampp\htdocs\market\app\templates\Sign\in.latte";i:2;i:1388677262;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\xampp\htdocs\market\app\templates\Sign\in.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '6zde0c5txt')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb46b7281a2f_content')) { function _lb46b7281a2f_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><style>
    body {background-color: #eee !important}
    .navbar {margin-bottom: 20px}
</style>
</div>
<div class="signin">
<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = $_control["signInForm"], array('class' => 'form-signin')) ;$iterations = 0; foreach ($form->errors as $error) { ?>
<div class="alert alert-danger" style="margin-top: -20px;"><?php echo Nette\Templating\Helpers::escapeHtml($error, ENT_NOQUOTES) ?></div>
<?php $iterations++; } echo $_form["username"]->getControl() ?>

<?php echo $_form["password"]->getControl() ?>

<?php echo $_form["submit"]->getControl() ?>

<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ?>
</div><?php
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
$robots = 'noindex' ?>

<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 