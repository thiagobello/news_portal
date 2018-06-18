function verify(){

/* VERIFICAÇÃO DO CREATE-NEWS E EDIT-NEWS */

 if (send_form.category.value=="") {
  alert("Selecione uma Categoria!");
  return false;
 }

 if (send_form.notice.value=="") {
  alert("O campo Notícia é obrigatório!");
  return false;
 }
