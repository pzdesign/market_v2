<?php //netteCache[01]000370a:2:{s:4:"time";s:21:"0.46103600 1390011103";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:56:"C:\xampp\htdocs\market\app\templates\Admin\coupons.latte";i:2;i:1390011030;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\xampp\htdocs\market\app\templates\Admin\coupons.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'qiss68t98l')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbc810ec0a96_content')) { function _lbc810ec0a96_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>

<ul class="nav nav-tabs">
  <li><a href="<?php echo htmlSpecialChars($_control->link("default")) ?>">Home</a></li>
  <li><a href="<?php echo htmlSpecialChars($_control->link("admins")) ?>">Administrátoři</a></li>
  <li><a href="<?php echo htmlSpecialChars($_control->link("items")) ?>">Itemy</a></li>
  <li class="active"><a>Slevové kupóny</a></li>
  <li><a href="<?php echo htmlSpecialChars($_control->link("motd")) ?>">MOTD</a></li>
</ul>
<br>
<h3>Vytvořit slevový kupón</h3>
<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = $_control["newCouponForm"], array('class' => 'ajax')) ?>
    <?php echo $_form["token"]->getControl() ?> <a class="jstooltip" data-original-title="Vygeneruje náhodný text o délce 15 znaků<br>a dá ho do políčka vlevo." href="#" onclick="randomString();"><span class="glyphicon glyphicon-random"></span></a><br>
    <?php echo $_form["expiration"]->getControl() ?><br>
    <?php echo $_form["discount"]->getControl() ?><br>
    <?php echo $_form["submit"]->getControl() ?>

<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ?>

<h3>Seznam slevových kupónů</h3>
<div id="<?php echo $_control->getSnippetId('couponsTable') ?>"><?php call_user_func(reset($_l->blocks['_couponsTable']), $_l, $template->getParameters()) ?>
</div><?php
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb1ef5daa0f6_title')) { function _lb1ef5daa0f6_title($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><h1>Administrace</h1>
<?php
}}

//
// block _couponsTable
//
if (!function_exists($_l->blocks['_couponsTable'][] = '_lbd725e028ad__couponsTable')) { function _lbd725e028ad__couponsTable($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('couponsTable', FALSE)
;$iterations = 0; foreach ($coupons as $coupon) { ?>
    <!-- Modal -->
    <div class="modal fade" id="edit_<?php echo htmlSpecialChars($coupon->id) ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4>Editace slevového kupónu</h4>
                </div>
<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = $_control["editCouponForm"], array('class' => 'ajax')) ?>
                    <div class="modal-body">
                        Token:<?php echo $_form["token"]->getControl()->addAttributes(array('value' => $coupon->token)) ?><br>
                        Expirace:<input type="date" name="expiration" id="frm-editCouponForm-expiration" value="<?php echo htmlSpecialChars($template->date($coupon->expiration_time, 'Y-m-d')) ?>"><br>
                        Sleva:<?php echo $_form["discount"]->getControl()->addAttributes(array('value' => $coupon->discount)) ?><br>
                        <?php echo $_form["id"]->getControl()->addAttributes(array('value' => $coupon->id)) ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Zavřít</button>
                        <?php echo $_form["submit"]->getControl() ?>

                    </div>
<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ?>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php $iterations++; } ?>

<table class="table table-hover" style="text-align: center">
    <thead>
    <tr>
	<th>Token</th>
	<th>Vlastník</th>
	<th>Vytvoření</th>
	<th>Vypršení</th>
	<th>Použití</th>
	<th>Sleva</th>
	<th></th>
	<th><a class="ajax" data-confirm="Opravdu chcete smazat všechny slevové kupóny?" href="<?php echo htmlSpecialChars($_control->link("clearCoupons!")) ?>
"><span class="glyphicon glyphicon-trash trash"></span></a></th>
    </tr>
    </thead>
    <tbody>
<?php $iterations = 0; foreach ($coupons as $coupon) { ?>    <tr>
	<td><?php echo Nette\Templating\Helpers::escapeHtml($coupon->token, ENT_NOQUOTES) ?></td>
	<td><?php if ($coupon->owner == null) { ?>Nikdo<?php } else { echo Nette\Templating\Helpers::escapeHtml($coupon->owner, ENT_NOQUOTES) ;} ?></td>
	<td><?php echo Nette\Templating\Helpers::escapeHtml($template->date($coupon->create_time, 'j. n. Y G:i'), ENT_NOQUOTES) ?></td>
	<td><?php if ($coupon->expiration_time == 0) { ?>Nikdy<?php } else { echo Nette\Templating\Helpers::escapeHtml($template->date($coupon->expiration_time, 'j. n. Y'), ENT_NOQUOTES) ;} ?></td>
	<td><?php if ($coupon->use_time == 0) { ?>Zatím nepoužit<?php } else { echo Nette\Templating\Helpers::escapeHtml($template->date($coupon->use_time, 'j. n. Y G:i'), ENT_NOQUOTES) ;} ?></td>
	<td><?php echo Nette\Templating\Helpers::escapeHtml($coupon->discount, ENT_NOQUOTES) ?>%</td>
	<td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_<?php echo htmlSpecialChars($coupon->id) ?>">Editovat</button></td>
	<td><a class="ajax" href="<?php echo htmlSpecialChars($_control->link("removeCoupon!", array($coupon->id))) ?>
"><span class="glyphicon glyphicon-remove trash"></span></a></td>
    </tr>
<?php $iterations++; } ?>
    </tbody>
</table>
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