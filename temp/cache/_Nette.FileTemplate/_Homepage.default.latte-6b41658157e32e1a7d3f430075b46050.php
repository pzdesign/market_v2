<?php //netteCache[01]000373a:2:{s:4:"time";s:21:"0.44446300 1457468608";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:59:"C:\xampp\htdocs\market\app\templates\Homepage\default.latte";i:2;i:1457468607;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:22:"released on 2013-12-31";}}}?><?php

// source file: C:\xampp\htdocs\market\app\templates\Homepage\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '8k23qcqtlc')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbd40ca44590_content')) { function _lbd40ca44590_content($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
 ?>
<div id="<?php echo $_control->getSnippetId('list') ?>"><?php call_user_func(reset($_l->blocks['_list']), $_l, $template->getParameters()) ?>
</div><?php
}}

//
// block _list
//
if (!function_exists($_l->blocks['_list'][] = '_lb9ef0e80cc1__list')) { function _lb9ef0e80cc1__list($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('list', FALSE)
;if ($motd !== null) { ?>    <div class='alert alert-success'><?php echo $motd ?></div>
<?php } if ($items->fetch() == false) { ?>
    <div class="alert alert-danger">Momentálně se žádný item neprodává</div>
<?php } else { ?>
 

    <div style="text-align: center">
        <ul class="pagination" style="margin: 0 0 20px;"<?php echo ' id="' . $_control->getSnippetId('pagi') . '"' ?>>
<?php call_user_func(reset($_l->blocks['_pagi']), $_l, $template->getParameters()) ?>
        </ul>
    </div>

               <a href="?do=limit" class='btn btn-primary btn-xs buy jstooltip ajax'>
                    <span class='glyphicon glyphicon-shopping-cart'></span>Koupit
                </a>  
    <div class='row'>
<?php $iterations = 0; foreach ($items as $item) { ?>
            <div class="col-md-3">
                <div class="well itemik">
                    <img class="item-img" src="<?php echo htmlSpecialChars($template->safeurl($item['image'])) ?>">
                    <span class="item-name jstooltip" data-original-title="<?php echo htmlSpecialChars($item['item_name_cs']) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($item['item_name_en'], ENT_NOQUOTES) ?></span>
<?php if ($item["price_discount"] !== 0) { ?>		    <span class="label label-info discount">-<?php echo Nette\Templating\Helpers::escapeHtml($item['price_discount'], ENT_NOQUOTES) ?>%</span>
<?php } ?>
                    <input type='number' oninput="calculatePrice(<?php echo htmlSpecialChars(Nette\Templating\Helpers::escapeJs($item['price'])) ?>
, $('#itemEa_<?php echo htmlSpecialChars(Nette\Templating\Helpers::escapeJs($item['id'])) ?>
').val(), <?php echo htmlSpecialChars(Nette\Templating\Helpers::escapeJs($item['id'])) ?>
, <?php echo htmlSpecialChars(Nette\Templating\Helpers::escapeJs($parametry['mena'])) ?>
, <?php echo htmlSpecialChars(Nette\Templating\Helpers::escapeJs($item['price_discount'])) ?>
);" value='1' placeholder='Počet' class='form-control ea' id='itemEa_<?php echo htmlSpecialChars($item['id'], ENT_QUOTES) ?>' min='1' max='1000'>
			   <a 
               href="?do=addToCart&itemId=<?php echo htmlSpecialChars($template->safeurl($item['id'])) ?>&itemCount=1" 
               class='btn btn-primary btn-xs buy jstooltip ajax' 
               id='endPrice_<?php echo htmlSpecialChars($item["id"], ENT_QUOTES) ?>' 
               data-original-title='Cena je <?php if ($item["price_discount"] !== 0) { ?>
<s><?php echo htmlSpecialChars($item["price"], ENT_QUOTES) ;echo htmlSpecialChars($parametry["mena"], ENT_QUOTES) ?>
</s> <?php } echo htmlSpecialChars($item["price"] - (($item["price_discount"]/100) * $item["price"]), ENT_QUOTES) ;echo htmlSpecialChars($parametry["mena"], ENT_QUOTES) ?>
 za 1Ks<br>Celková cena je <?php if ($item["price_discount"] !== 0) { ?><s><?php echo htmlSpecialChars($item["price"], ENT_QUOTES) ;echo htmlSpecialChars($parametry["mena"], ENT_QUOTES) ?>
</s> <?php } echo htmlSpecialChars($item["price"] - (($item["price_discount"]/100) * $item["price"]), ENT_QUOTES) ;echo htmlSpecialChars($parametry["mena"], ENT_QUOTES) ?>'>
                        <span class='glyphicon glyphicon-shopping-cart'></span>Koupit
                    </a>
                </div>
            </div>
<?php $iterations++; } ?>
	</div>

    <div style="text-align: center">
    <ul class="pagination" style="margin: 0 0 15px;">
        <li <?php if ($paginator->first) { ?>class="disabled"<?php } ?>><a <?php if ($paginator->first == false) { ?>
href="?page=<?php echo htmlSpecialChars($template->safeurl($paginator->getPage() - 1)) ?>
"<?php } ?>>&laquo;</a></li>
        <?php for ($i = 1; $i <= $paginator->pageCount; $i++) { ?><li <?php if ($paginator->getPage() == $i) { ?>
class="active"<?php } ?>><!--PAGE--><a class="ajax" href="<?php echo htmlSpecialChars($_control->link("change!", array($i))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($i, ENT_NOQUOTES) ?></a></li><?php } ?>

        <li <?php if ($paginator->last) { ?>class="disabled"<?php } ?>><a <?php if ($paginator->last == false) { ?>
href="?page=<?php echo htmlSpecialChars($template->safeurl($paginator->getPage() + 1)) ?>
"<?php } ?>>&raquo;</a></li>
    </ul>
    </div>
<?php } 
}}

//
// block _pagi
//
if (!function_exists($_l->blocks['_pagi'][] = '_lbfdacf68a80__pagi')) { function _lbfdacf68a80__pagi($_l, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('pagi', FALSE)
?>            <li <?php if ($paginator->first) { ?>class="disabled"<?php } ?>><a class="ajax <?php if ($paginator->first == false) { ?>
disabled<?php } ?>" href="<?php echo htmlSpecialChars($_control->link("change!", array($paginator->getPage()-1))) ?>
">&laquo;</a></li>
            <?php for ($i = 1; $i <= $paginator->pageCount; $i++) { ?><li <?php if ($paginator->getPage() == $i) { ?>
class="active"<?php } ?>><!--PAGE--><a class="ajax" href="<?php echo htmlSpecialChars($_control->link("change!", array($i))) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($i, ENT_NOQUOTES) ?></a></li><?php } ?>

            <li <?php if ($paginator->last) { ?>class="disabled"<?php } ?>><a class="ajax <?php if ($paginator->last == false) { ?>
disabled<?php } ?>" href="<?php echo htmlSpecialChars($_control->link("change!", array($paginator->getPage()+1))) ?>
">&raquo;</a></li>
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
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 