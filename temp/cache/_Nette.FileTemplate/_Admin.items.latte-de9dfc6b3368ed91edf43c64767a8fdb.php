<?php //netteCache[01]000368a:2:{s:4:"time";s:21:"0.13681000 1390011333";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:54:"C:\xampp\htdocs\market\app\templates\Admin\items.latte";i:2;i:1390011329;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\xampp\htdocs\market\app\templates\Admin\items.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'bnq7vx2ypy')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb4976d89eac_content')) { function _lb4976d89eac_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>

<ul class="nav nav-tabs">
  <li><a href="<?php echo htmlSpecialChars($_control->link("default")) ?>">Home</a></li>
  <li><a href="<?php echo htmlSpecialChars($_control->link("admins")) ?>">Administrátoři</a></li>
  <li class="active"><a>Itemy</a></li>
  <li><a href="<?php echo htmlSpecialChars($_control->link("coupons")) ?>">Slevové kupóny</a></li>
  <li><a href="<?php echo htmlSpecialChars($_control->link("motd")) ?>">MOTD</a></li>
</ul>
<br>
<h3>Vytvořit nový item</h3>
<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = $_control["newItemForm"], array('class' => 'ajax')) ?>
    <?php echo $_form["item_name_cs"]->getControl()->addAttributes(array('style' => 'float:left')) ?>

    <?php echo $_form["item_name_en"]->getControl() ?>

    <?php echo $_form["item_id"]->getControl()->addAttributes(array('style' => 'float:left')) ?>

    <?php echo $_form["item_data"]->getControl() ?>

    <?php echo $_form["image"]->getControl()->addAttributes(array('style' => 'float:left')) ?>

    <?php echo $_form["price"]->getControl() ?>

    <?php echo $_form["price_discount"]->getControl() ?>

    <?php echo $_form["submit"]->getControl() ?>

<?php Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ?>

<h3>Seznam itemů</h3>

<div style="text-align: center">
<ul class="pagination">
        <li <?php if ($paginator->first) { ?>class="disabled"<?php } ?>><a <?php if ($paginator->first == false) { ?>
href="?page=<?php echo htmlSpecialChars($template->safeurl($paginator->getPage() - 1)) ?>
"<?php } ?>>&laquo;</a></li>
        <?php for ($i = 1; $i <= $paginator->pageCount; $i++) { ?><li <?php if ($paginator->getPage() == $i) { ?>
class="active"<?php } ?>><!--PAGE--><a href="?page=<?php echo htmlSpecialChars($template->safeurl($i)) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($i, ENT_NOQUOTES) ?></a></li><?php } ?>

        <li <?php if ($paginator->last) { ?>class="disabled"<?php } ?>><a <?php if ($paginator->last == false) { ?>
href="?page=<?php echo htmlSpecialChars($template->safeurl($paginator->getPage() + 1)) ?>
"<?php } ?>>&raquo;</a></li>
</ul>
</div>

<div id="<?php echo $_control->getSnippetId('itemsTable') ?>"><?php call_user_func(reset($_l->blocks['_itemsTable']), $_l, $template->getParameters()) ?>
</div>
<div style="text-align: center">
<ul class="pagination">
        <li <?php if ($paginator->first) { ?>class="disabled"<?php } ?>><a <?php if ($paginator->first == false) { ?>
href="?page=<?php echo htmlSpecialChars($template->safeurl($paginator->getPage() - 1)) ?>
"<?php } ?>>&laquo;</a></li>
        <?php for ($i = 1; $i <= $paginator->pageCount; $i++) { ?><li <?php if ($paginator->getPage() == $i) { ?>
class="active"<?php } ?>><!--PAGE--><a href="?page=<?php echo htmlSpecialChars($template->safeurl($i)) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($i, ENT_NOQUOTES) ?></a></li><?php } ?>

        <li <?php if ($paginator->last) { ?>class="disabled"<?php } ?>><a <?php if ($paginator->last == false) { ?>
href="?page=<?php echo htmlSpecialChars($template->safeurl($paginator->getPage() + 1)) ?>
"<?php } ?>>&raquo;</a></li>
</ul>
</div><?php
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb29f5265b10_title')) { function _lb29f5265b10_title($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><h1>Administrace</h1>
<?php
}}

//
// block _itemsTable
//
if (!function_exists($_l->blocks['_itemsTable'][] = '_lb90a3882983__itemsTable')) { function _lb90a3882983__itemsTable($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('itemsTable', FALSE)
;$iterations = 0; foreach ($items as $item) { ?>
    <!-- Modal -->
    <div class="modal fade" id="edit_<?php echo htmlSpecialChars($item->id) ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4>Editace itemu</h4>
                </div>
<?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = $_control["editItemForm"], array('class' => 'ajax')) ?>
                    <div class="modal-body">
                        CZ název: <?php echo $_form["item_name_cs"]->getControl()->addAttributes(array('value' => $item->item_name_cs)) ?><br>
                        EN název: <?php echo $_form["item_name_en"]->getControl()->addAttributes(array('value' => $item->item_name_en)) ?><br>
                        ID itemu: <?php echo $_form["item_id"]->getControl()->addAttributes(array('value' => $item->item_id)) ?>
:<?php echo $_form["item_data"]->getControl()->addAttributes(array('value' => $item->item_data)) ?><br>
                        Obrázek (odkaz): <?php echo $_form["image"]->getControl()->addAttributes(array('value' => $item->image)) ?><br>
                        Cena: <?php echo $_form["price"]->getControl()->addAttributes(array('value' => $item->price)) ?><br>
                        Sleva: <?php echo $_form["price_discount"]->getControl()->addAttributes(array('value' => $item->price_discount)) ?><br>
                        <?php echo $_form["id"]->getControl()->addAttributes(array('value' => $item->id)) ?>

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
	<th>#</th>
	<th>Název</th>
	<th>Item ID</th>
	<th>Odkaz na ikonu</th>
	<th>Cena</th>
	<th>Sleva</th>
	<th></th>
	<th><span class="jstooltip" data-original-title="<span class='glyphicon glyphicon-eye-open'></span> = viditelný<br><span class='glyphicon glyphicon-eye-close'></span> = neviditelný">Viditelnost</span></th>
	<th></th>
    </tr>
    </thead>
    <tbody>
<?php $iterations = 0; foreach ($items as $item) { ?>    <tr>
	<td><?php echo Nette\Templating\Helpers::escapeHtml($item->id, ENT_NOQUOTES) ?></td>
	<td><span class="jstooltip" data-original-title="<?php echo htmlSpecialChars($item->item_name_cs) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($item->item_name_en, ENT_NOQUOTES) ?></span></td>
	<td><?php echo Nette\Templating\Helpers::escapeHtml($item->item_id, ENT_NOQUOTES) ;if ($item->item_data !== 0) { ?>
:<?php echo Nette\Templating\Helpers::escapeHtml($item->item_data, ENT_NOQUOTES) ;} ?></td>
	<td><span class="jstooltip" data-original-title="<img src='<?php echo htmlSpecialChars($basePath) ;echo htmlSpecialChars($template->replace($item->image, './', '/')) ?>
'>"><?php echo Nette\Templating\Helpers::escapeHtml($item->image, ENT_NOQUOTES) ?></span></td>
	<td><?php echo Nette\Templating\Helpers::escapeHtml($item->price, ENT_NOQUOTES) ?></td>
	<td><?php echo Nette\Templating\Helpers::escapeHtml($item->price_discount, ENT_NOQUOTES) ?></td>
	<td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_<?php echo htmlSpecialChars($item->id) ?>">Editovat</button></td>
	<td><?php if ($item->visible == 1) { ?><a class="ajax" href="<?php echo htmlSpecialChars($_control->link("unvisible!", array($item->id))) ?>
"><span onmouseenter="changeEye('close', <?php echo htmlSpecialChars(Nette\Templating\Helpers::escapeJs($item->id)) ?>
);" onmouseleave="changeEye('open', <?php echo htmlSpecialChars(Nette\Templating\Helpers::escapeJs($item->id)) ?>
);" id='changeEye_<?php echo htmlSpecialChars($item->id, ENT_QUOTES) ?>' class='glyphicon glyphicon-eye-open trash'></span></a><?php } else { ?>
<a class="ajax" href="<?php echo htmlSpecialChars($_control->link("visible!", array($item->id))) ?>
"><span onmouseenter="changeEye('open', <?php echo htmlSpecialChars(Nette\Templating\Helpers::escapeJs($item->id)) ?>
);" onmouseleave="changeEye('close', <?php echo htmlSpecialChars(Nette\Templating\Helpers::escapeJs($item->id)) ?>
);" id='changeEye_<?php echo htmlSpecialChars($item->id, ENT_QUOTES) ?>' class='glyphicon glyphicon-eye-close trash'></span></a><?php } ?></td>
	<td><a class="ajax" data-confirm="Opravdu chcete odstranit tento item?" href="<?php echo htmlSpecialChars($_control->link("removeItem!", array($item->id))) ?>
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