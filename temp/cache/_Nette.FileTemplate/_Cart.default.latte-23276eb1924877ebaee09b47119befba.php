<?php //netteCache[01]000369a:2:{s:4:"time";s:21:"0.80776500 1457456322";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:55:"C:\xampp\htdocs\market\app\templates\Cart\default.latte";i:2;i:1457456319;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\xampp\htdocs\market\app\templates\Cart\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'rgoc6syfuj')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbb429799b24_content')) { function _lbb429799b24_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
 ?>
<div id="<?php echo $_control->getSnippetId('obsahKosiku') ?>"><?php call_user_func(reset($_l->blocks['_obsahKosiku']), $_l, $template->getParameters()) ?>
</div><?php
}}

//
// block _obsahKosiku
//
if (!function_exists($_l->blocks['_obsahKosiku'][] = '_lb14d20fcc60__obsahKosiku')) { function _lb14d20fcc60__obsahKosiku($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('obsahKosiku', FALSE)
?>    <div style="text-align: center">
        <ul class="pagination" style="margin: 0 0 20px;">
            <li <?php if ($paginator->first) { ?>class="disabled"<?php } ?>><a <?php if ($paginator->first == false) { ?>
href="?page=<?php echo htmlSpecialChars($template->safeurl($paginator->getPage() - 1)) ?>
"<?php } ?>>&laquo;</a></li>
            <?php for ($i = 1; $i <= $paginator->pageCount; $i++) { ?><li <?php if ($paginator->getPage() == $i) { ?>
class="active"<?php } ?>><!--PAGE--><a class="" href="?page=<?php echo htmlSpecialChars($template->safeurl($i)) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($i, ENT_NOQUOTES) ?></a></li><?php } ?>

            <li <?php if ($paginator->last) { ?>class="disabled"<?php } ?>><a <?php if ($paginator->last == false) { ?>
href="?page=<?php echo htmlSpecialChars($template->safeurl($paginator->getPage() + 1)) ?>
"<?php } ?>>&raquo;</a></li>
        </ul>
    </div>
<?php if ($items->fetch() == false) { ?>
<div class='alert alert-danger'><strong>Pozor!</strong> Váš nákupní košík je prázdný.</div>
<?php } else { ?>
<table class="table table-hover" style="text-align: center">
    <thead>
    <tr>
        <th>#</th>
        <th>Název</th>
        <th>Počet</th>
	<th>Cena za kus</th>
        <th>Celková cena</th>
                <th><a class="ajax" data-confirm="Opravdu chcete smazat veškerý obsah košíku?" href="<?php echo htmlSpecialChars($_control->link("clearCart!")) ?>
"><span class="glyphicon glyphicon-trash trash"></span></a></th>
    </tr>
    </thead>
    <tbody>
<?php $iterations = 0; foreach ($items as $item) { ?>    <tr>
	    <td><img src="<?php echo htmlSpecialChars($template->safeurl($basePath)) ?>
/<?php echo htmlSpecialChars($template->safeurl($item->item->image)) ?>"></td>
	    <td><span class="jstooltip" data-original-title="<?php echo htmlSpecialChars($item->item->item_name_cs) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($item->item->item_name_en, ENT_NOQUOTES) ?></span></td>
        <td><?php Nette\Latte\Macros\FormMacros::renderFormBegin($form = $_form = $_control["countForm"], array('class' => 'ajax')) ;echo $_form["count"]->getControl()->addAttributes(array('value' => $item->count)) ;echo $_form["itemid"]->getControl()->addAttributes(array('value' => $item->id)) ;echo $_form["submit"]->getControl() ;Nette\Latte\Macros\FormMacros::renderFormEnd($_form) ?></td>
	    <td><?php if ($item->item->price_discount !== 0) { ?><s><?php echo Nette\Templating\Helpers::escapeHtml($item->item->price, ENT_NOQUOTES) ;echo Nette\Templating\Helpers::escapeHtml($parametry['mena'], ENT_NOQUOTES) ?>
</s><?php } ?>
  <?php echo Nette\Templating\Helpers::escapeHtml($item->item->price - (($item->item->price_discount/100) * $item->item->price), ENT_NOQUOTES) ;echo Nette\Templating\Helpers::escapeHtml($parametry['mena'], ENT_NOQUOTES) ?></td>
	    <td><?php if ($item->item->price_discount !== 0) { ?><s><?php echo Nette\Templating\Helpers::escapeHtml($item->item->price * $item->count, ENT_NOQUOTES) ;echo Nette\Templating\Helpers::escapeHtml($parametry['mena'], ENT_NOQUOTES) ?>
</s><?php } ?>
  <?php echo Nette\Templating\Helpers::escapeHtml(($item->item->price - (($item->item->price_discount/100) * $item->item->price)) * $item->count, ENT_NOQUOTES) ;echo Nette\Templating\Helpers::escapeHtml($parametry['mena'], ENT_NOQUOTES) ?></td>
                <td><a class="ajax" href="<?php echo htmlSpecialChars($_control->link("removeFromCart!", array($item->id))) ?>
"><span class='glyphicon glyphicon-remove trash'></span></a></td>
    </tr>
<?php $iterations++; } ?>
    </tbody>
</table>
<div class="well buy-box">
    <span>Celková cena: <strong><?php echo Nette\Templating\Helpers::escapeHtml($price, ENT_NOQUOTES) ;echo Nette\Templating\Helpers::escapeHtml($parametry['mena'], ENT_NOQUOTES) ?></strong></span>
    <br>
    <a class="btn btn-sm btn-primary ajax" href="<?php echo htmlSpecialChars($_control->link("order!")) ?>
">Koupit&raquo;</a>
</div>
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