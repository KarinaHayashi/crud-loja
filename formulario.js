function limpaFormulario(form) {
total = form.elements.length;
for (i=0; i<total; i++) {
if (form.elements[i].type == "text"||form.elements[i].type == "textarea") {
form.elements[i].value = "";
} else if (form.elements[i].type == "checkbox") {
form.elements[i].checked = false;
} else if (form.elements[i].type == "select-one") {
form.elements[i].selectedIndex = 0;
}
}
}
function enviaFormulario(form) {
total = form.elements.length;
for (i=0; i<total; i++) {
campo = form.elements[i];
if (campo.type=="text"||campo.type=="textarea"||campo.type=="select-one") {
if (!campo.value) {
alert("Preencha o campo " + campo.name_produto + "!");
campo.focus();
setTimeout("atencao(campo)", 250);
return false;
}
}
}
form.submit();
}
var controle = 0;
function atencao(campo) {
controle += 1;
if (controle % 2 == 0) campo.style.background = '#FFFFFF';
else campo.style.background = '#E95306';
if (controle != 6) setTimeout("atencao(campo)", 250);
else controle = 0;
}