<?php //netteCache[01]000362a:2:{s:4:"time";s:21:"0.65652900 1389524186";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:48:"/var/www/market/app/templates/Admin/admins.latte";i:2;i:1389522823;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: /var/www/market/app/templates/Admin/admins.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'rbhcz4ctku')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbd5b47352cd_content')) { function _lbd5b47352cd_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>

<ul class="nav nav-tabs">
  <li><a href="<?php echo htmlSpecialChars($_control->link("default")) ?>">Main</a></li>
  <li class="active"><a>Administrátoři</a></li>
  <li><a href="<?php echo htmlSpecialChars($_control->link("items")) ?>">Itemy</a></li>
  <li><a href="<?php echo htmlSpecialChars($_control->link("coupons")) ?>">Slevové kupóny</a></li>
</ul>
<br>
<h3>Přidat administrátora</h3>
<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = $_control["addAdminForm"], array('class' => 'ajax')) ;echo $_form["username"]->getControl() ;echo $_form["submit"]->getControl() ;Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ?>

<br>
<h3>Seznam administrátorů</h3>
<table class="table table-hover" style="text-align: center"<?php echo ' id="' . $_control->getSnippetId('adminsTable') . '"' ?>>
<?php call_user_func(reset($_l->blocks['_adminsTable']), $_l, $template->getParameters()) ?>
</table>
<?php
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbf2f20f7853_title')) { function _lbf2f20f7853_title($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><h1>Administrace</h1>
<?php
}}

//
// block _adminsTable
//
if (!function_exists($_l->blocks['_adminsTable'][] = '_lb0115b0f491__adminsTable')) { function _lb0115b0f491__adminsTable($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('adminsTable', FALSE)
?>    <thead>
    <tr>
	<th>Nick</th>
	<th>Role</th>
	<th></th>
    </tr>
    </thead>
    <tbody>
<?php $iterations = 0; foreach ($admins as $admin) { ?>    <tr>
	<td><?php echo Nette\Templating\Helpers::escapeHtml($admin->username, ENT_NOQUOTES) ?></td>
	<td><?php echo Nette\Templating\Helpers::escapeHtml($admin->role, ENT_NOQUOTES) ?></td>
	<td><a class="ajax" href="<?php echo htmlSpecialChars($_control->link("removeAdmin!", array($admin->id))) ?>
"><span class='glyphicon glyphicon-remove trash'></span></a></td>
    </tr>
<?php $iterations++; } ?>
    </tbody>
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