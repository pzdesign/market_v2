<?php //netteCache[01]000381a:2:{s:4:"time";s:21:"0.26437500 1388265353";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:59:"C:\xampp\htdocs\Market\app\templates\Homepage\default.latte";i:2;i:1388265352;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"695f643 released on 2013-11-05";}}}?><?php

// source file: C:\xampp\htdocs\Market\app\templates\Homepage\default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'scg0hq031r')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb43d08305ce_content')) { function _lb43d08305ce_content($_l, $_args) { extract($_args)
?>        <!-- Big Message -->
        <div class="jumbotron">
            <h1>Nějaký příklad</h1>
            <p>Tento příklad je rychlé znázornění toho, jak WebShop funguje. Má tooltipy, automatické přepočítávání ceny. Celý WebShop je taktéž plně responzivní, takže ho může bez problémů zobrazit na jakémkoli zařízení</p>
            <p>Aby jste viděli jak je tento WebShop úžasný, klikněte na tlačítko!</p>
            <p>
                <a class="btn btn-lg btn-primary" href="http://webshop.mysty.cz/">Zobrazit jiný WebShop &raquo;</a>
            </p>
        </div>
    <div class='alert alert-success'><strong>Pozor sleva!</strong> Pouze toto století dostanete 2x více kreditů.</div>
    <div class='row'>
            <div class='col-md-3'>
                <div class='well itemik'>
                    <img class='item-img jstooltip' data-original-title='Obyčejný kámen' src='./images/1.png' />
                    <span class='item-name jstooltip' data-original-title='Kámen'>Stone</span>
                    <input type='number' onChange="calculatePrice(2, $('#itemEa_1').val(), 1);" value='1' placeholder='Počet' class='form-control ea' id='itemEa_1' min='1' max='64' />
                    <button type='button' onClick="addItem(1, $('#itemEa_1').val(), 1, 'Stone')" class='btn btn-primary btn-xs buy jstooltip' id='endPrice_1' data-original-title='Cena je 2€ za 1Ks<br>Celková cena je 2€'>
                        <span class='glyphicon glyphicon-shopping-cart'></span>Koupit
                    </button>
                </div>
            </div>
	</div>
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