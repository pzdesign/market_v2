<?php //netteCache[01]000364a:2:{s:4:"time";s:21:"0.00459000 1457472492";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:50:"C:\xampp\htdocs\market\app\templates\@layout.latte";i:2;i:1457472488;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\xampp\htdocs\market\app\templates\@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '4f9p4hbuuo')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb6a18b670db_title')) { function _lb6a18b670db_title($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>Main<?php
}}

//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lb2006b2c695_head')) { function _lb2006b2c695_head($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
}}

//
// block _userInfo
//
if (!function_exists($_l->blocks['_userInfo'][] = '_lb0dcbbfd4a7__userInfo')) { function _lb0dcbbfd4a7__userInfo($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('userInfo', FALSE)
?>                <tr>
                    <td>Uživatelské jméno</td>
                    <td><?php echo Nette\Templating\Helpers::escapeHtml($user->getIdentity()->username, ENT_NOQUOTES) ?></td>
                </tr>
                <tr>
                    <td>Stav konta</td>
                    <td><?php echo Nette\Templating\Helpers::escapeHtml($balance, ENT_NOQUOTES) ?>
 <?php echo Nette\Templating\Helpers::escapeHtml($parametry['mena'], ENT_NOQUOTES) ?></td>
                </tr>
                <tr>
                    <td>Celková cena</td>
		            <td<?php echo ' id="' . $_control->getSnippetId('totalCost') . '"' ?>
><?php call_user_func(reset($_l->blocks['_totalCost']), $_l, $template->getParameters()) ?>
</td>
                </tr>
		        <tr>
		            <td>Možnosti:</td>
		            <td><a class="btn btn-sm btn-primary" href="<?php echo htmlSpecialChars($_control->link("Sign:out")) ?>
"><span class="glyphicon glyphicon-log-out"></span> Odhlásit se</a></td>
		        </tr>
<?php
}}

//
// block _totalCost
//
if (!function_exists($_l->blocks['_totalCost'][] = '_lbfb9c98e2cc__totalCost')) { function _lbfb9c98e2cc__totalCost($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('totalCost', FALSE)
;echo Nette\Templating\Helpers::escapeHtml($totalCost, ENT_NOQUOTES) ;echo Nette\Templating\Helpers::escapeHtml($parametry['mena'], ENT_NOQUOTES) ;
}}

//
// block _flashMessages
//
if (!function_exists($_l->blocks['_flashMessages'][] = '_lbc04add94ee__flashMessages')) { function _lbc04add94ee__flashMessages($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('flashMessages', FALSE)
;$iterations = 0; foreach ($flashes as $flash) { ?>	<div class="alert alert-<?php echo htmlSpecialChars($flash->type) ?> alert-dismissable fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?>

	</div>
<?php $iterations++; } 
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
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="">
<?php if (isset($robots)) { ?>	<meta name="robots" content="<?php echo htmlSpecialChars($robots) ?>">
<?php } ?>

	<title><?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
ob_start(); call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars()); echo $template->striptags(ob_get_clean())  ?> | Webshop</title>

	<link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/css/bootstrap.css">
	<link rel="stylesheet" media="print" href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/css/alertify.core.css">
    <link rel="stylesheet" href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/css/alertify.bootstrap.css">
    <link rel="stylesheet" href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/css/bootstrap-slider.css">
	<link rel="shortcut icon" href="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/favicon.ico">
	<?php call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars())  ?>

</head>

<body>
<div class="wrap">
        <div class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo htmlSpecialChars($_control->link("Homepage:")) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($parametry['servername'], ENT_NOQUOTES) ?></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <!-- Seznam serverů -->
                                    </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class=""><a href="<?php echo htmlSpecialChars($_control->link("Cart:")) ?>
"><img src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/images/cart_16.png" class="img_cart"> Košík</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
    <!-- Informace o hráči -->
<?php if ($user->isLoggedIn()) { ?>	<div class="user-info">
            <table class="table table-bordered">
                <tbody<?php echo ' id="' . $_control->getSnippetId('userInfo') . '"' ?>>
<?php call_user_func(reset($_l->blocks['_userInfo']), $_l, $template->getParameters()) ?>
                </tbody>
            </table>
        </div>
<?php } if ($user->isLoggedIn()) { ?>    <div class="user-info-arrow" onClick="userInfoMove()">
            <img src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/images/arrow-down.svg" height="15px">
    </div>
<?php } ?>
    <!-- /Informace o hráči -->
    <div class="container">
	
	<!--FLASHES-->
<div id="<?php echo $_control->getSnippetId('flashMessages') ?>"><?php call_user_func(reset($_l->blocks['_flashMessages']), $_l, $template->getParameters()) ?>
</div><?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ?>
    </div>
    </div>
    <div class="panel-footer">
<?php if ($user->isInRole('admin')) { ?>    <div><a href="<?php echo htmlSpecialChars($_control->link("Admin:")) ?>
">Administrace</a></div>
<?php } if ($user->isLoggedIn()) { ?>    <div>Market 0.1; Coded by and designed by zdenda204. This application uses <a href="http://nette.org/">Nette Framework 2.1</a> & <a href="http://getbootstrap.com/">Bootstrap 2.3.2</a></div>
<?php } ?>
    </div>
    <script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/jquery.js"></script>
    <script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/alertify.min.js"></script>
    <script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/netteForms.js"></script>
    <script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/bootstrap-slider.js"></script>
    <script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/nette.ajax.js"></script>
    <script src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>/js/main.js"></script>
</body>
</html>
