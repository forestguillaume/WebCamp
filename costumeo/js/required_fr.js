var input = $("form input[required], form textarea[required]");
input.attr("oninvalid", "setCustomValidity('Veuillez remplir tous les champs.');");
for (var i = 0; i < input.length; i++)
{
    if (input.eq(i).attr("onchange"))
        input.eq(i).attr("onchange", input.eq(i).attr("onchange") + "try{setCustomValidity('')}catch(e){};");
    else
        input.eq(i).attr("onchange", "try{setCustomValidity('')}catch(e){};");
}

var mail = $("form input[type=email][required]");
mail.attr("title", "Entrez une adresse valide. (exemple: abc@abc.abc)");
var postal = $("form input[name=postal][required]");
postal.attr("title", "Entrez un code postal valide. (exemple: 75001)");
var number = $("form input[name=price][required]");
number.attr("title", "Entrez un prix valide. (exemples: 49,99 | 10 | 2,5 | 1.50 | 115)");
var img = $("form input[type=file][required]");
img.attr("title", "Selectionnez une image");
var img = $("form input[type=tel][required]");
img.attr("title", "Entrez 10 chiffres sans aucun autre caractère.");