var liste = ($("#liste"));
var commentaire = ($('<textarea>').css({resize: "vertical", float: "left", width: "500px", height: "54px", resize: "none", "margin-left": "3%"}).attr({type: 'text', id:'commentaire', placeholder:'Write a comment...'}));
var boutton = ($('<button>').append('Send').css({width: "54px", height: "54px"}));
var divcollec = ($("<div>").attr('id', 'collection').css({display: "inline"}));
var divbutton = ($("<div>"));
liste.append(commentaire);
liste.append(divbutton);
liste.append(divcollec);
divbutton.append(boutton);
$(boutton).click(click_button);
function click_button () {
var divcol = ($("#collection"));
var div = ($("<div>"));
var commentaire = ($("#commentaire"));
var value = commentaire.val();
var buton = ($('<button>')).append('x');
divcol.append(div);
div.append(value);
div.append(buton);
$(buton).click(function click_button(){
	div.remove();});
commentaire.val("");
}