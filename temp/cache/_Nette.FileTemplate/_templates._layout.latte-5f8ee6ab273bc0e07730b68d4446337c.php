<?php //netteCache[01]000372a:2:{s:4:"time";s:21:"0.22084700 1388409429";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:50:"C:\xampp\htdocs\Market\app\templates\@layout.latte";i:2;i:1388398352;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"695f643 released on 2013-11-05";}}}?><?php

// source file: C:\xampp\htdocs\Market\app\templates\@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'uqp4m1retl')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb043cf60c43_title')) { function _lb043cf60c43_title($_l, $_args) { extract($_args)
?>Main<?php
}}

//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lbf65a2f40a8_head')) { function _lbf65a2f40a8_head($_l, $_args) { extract($_args)
;
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
	<meta charset="utf-8" />
	<meta name="description" content="" />
<?php if (isset($robots)): ?>	<meta name="robots" content="<?php echo htmlSpecialChars($robots) ?>" />
<?php endif ?>

	<title><?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
ob_start(); call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars()); echo $template->striptags(ob_get_clean())  ?> | Webshop</title>

	<link rel="stylesheet" media="screen,projection,tv" href="<?php echo htmlSpecialChars($basePath) ?>/css/bootstrap.css" />
	<link rel="stylesheet" media="print" href="<?php echo htmlSpecialChars($basePath) ?>/css/bootstrap.css" />
	<link rel="shortcut icon" href="<?php echo htmlSpecialChars($basePath) ?>/favicon.ico" />
	<script src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/netteForms.js"></script>
	<script src="<?php echo htmlSpecialChars($basePath) ?>/js/main.js"></script>
	<script>
	    $(function () {
		$.nette.ext('flash', {
		    complete: function () {
			 $('.flash').animate({
			    opacity: 1.0
			 }, 4000).fadeOut(2000);
			}
		}
		$.nette.init();
	    });
	</script>
	<?php call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars())  ?>

</head>

<body>
        <div class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo htmlSpecialChars($_control->link("Homepage:")) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($params['servername'], ENT_NOQUOTES) ?></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <!-- Seznam serverů -->
<?php $iterations = 0; foreach ($params["servers"] as $server): ?>                    <li class="dropdown"><a href="Server:<?php echo htmlSpecialChars($server['name']) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($server['name'], ENT_NOQUOTES) ?></a></li>
<?php $iterations++; endforeach ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class=""><a href="#"><img src="<?php echo htmlSpecialChars($basePath) ?>/images/cart_16.png" class="img_cart" /> Košík</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
    <!-- Informace o hráči -->
<?php if ($user->isLoggedIn()): ?>	<div class="user-info">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td>Uživatelské jméno</td>
                    <td><?php echo Nette\Templating\Helpers::escapeHtml($user->getIdentity()->username, ENT_NOQUOTES) ?></td>
                </tr>
                <tr>
                    <td>Stav konta</td>
                    <td><?php echo Nette\Templating\Helpers::escapeHtml($balance, ENT_NOQUOTES) ?>
 <?php echo Nette\Templating\Helpers::escapeHtml($params['mena'], ENT_NOQUOTES) ?></td>
                </tr>
                <tr>
                    <td>Zakoupených itemů</td>
                    <td>53</td>
                </tr>
		<tr>
		    <td>Možnosti:</td>
		    <td><a class="btn btn-lg btn-primary" href="<?php echo htmlSpecialChars($_control->link("Sign:out")) ?>
">Odhlásit se&raquo;</a></td>
		</tr>
                </tbody>
            </table>
        </div>
<?php endif ;if ($user->isLoggedIn()): ?>    <div class="user-info-arrow" onClick="userInfoMove()">
            <img src="<?php echo htmlSpecialChars($basePath) ?>/images/arrow-down.svg" height="15px" />
    </div>
<?php endif ?>
    <!-- /Informace o hráči -->
    <div class="container">
	
	<!--FLASHES-->
<?php $iterations = 0; foreach ($flashes as $flash): ?>	<div class="alert alert-<?php echo htmlSpecialChars($flash->type) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; endforeach ;Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ?>
    </div>
</body>
</html>
