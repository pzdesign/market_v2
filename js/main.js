$(function(){
    $.nette.init();
});

$.nette.ext({
    before: function(xrh, settings){
	if (!settings.nette) return;

        var question = settings.nette.el.data("confirm");
        if (question) {
            return confirm(question);
        }
    },
    success: function(payload){
        if(payload.buys){
	    alertify.log("Do vašeho košíku bylo přidáno "+ payload.buys.itemCount +"x "+ payload.buys.itemName +" (ID "+ payload.buys.itemId +").");
	}
    }
});

$(document).ready(function(){
    $(".jstooltip").tooltip({html: true});
});

function randomString()
{
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for( var i=0; i < 15; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    $("input.randomString").val(text);
}

function changeEye(eye, id){
    $("#changeEye_"+ id).attr('class', 'glyphicon glyphicon-eye-'+ eye +' trash');
}

function calculatePrice(priceForEA, ea, ID, mena, discount) {
    var text = "Cena je ";
    if(discount !== 0){
	text += "<s>"+ priceForEA + mena +"</s> ";
    }
    text += priceForEA - ((discount/100) * priceForEA) + mena +" za 1Ks<br/>Celková cena je ";
    if(discount !== 0){
	text += "<s>"+ priceForEA * ea + mena +"</s> ";
    }
    text += (priceForEA - ((discount/100) * priceForEA)) * ea + mena;
    $('#endPrice_' + ID).attr('data-original-title', text).attr('href', "?do=addToCart&itemId="+ ID +"&itemCount="+ ea);
}

var move;
function userInfoMove() {
    if($(window).width() <= 980){
        if(move !== true){
            $('.user-info').css('marginTop', '0px');
            $('.user-info-arrow>img').css("transform", "rotate(180deg)");
            move = true;
        } else{

            $('.user-info-arrow>img').css("transform", "rotate(0deg)");
            move = false;
        }
    } else{
        if(move !== true) {
            $('.user-info').animate({
                marginTop: "0px"
            }, 250);
            $('.user-info-arrow>img').css("transform", "rotate(180deg)");
            move = true;
        } else {
            $('.user-info').animate({
                'marginTop':'-200px'
            }, 250);
            $('.user-info-arrow>img').css("transform", "rotate(0deg)");
            move = false;
        }
    }
}