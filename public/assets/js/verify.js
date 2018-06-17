function verify(){

/* VERIFICAÇÃO DO CREATE-NEWS E EDIT-NEWS */
 if (send_form.image.value=="") {
  alert("Selecione uma Imagem!");
  return false;
 }
 if (send_form.category.value=="") {
  alert("Selecione uma Categoria!");
  return false;
 }
 if (send_form.title.value=="") {
  alert("O campo Título é obrigatório!");
  return false;
 }
 if (send_form.notice.value=="") {
  alert("O campo Notícia é obrigatório!");
  return false;
 }


/* VERIFICAÇÃO DO CATEGORY*/
 if (send_form.category_m.value=="") {
  alert("Selecione uma Categoria!");
  return false;
 }

/* VERIFICAÇÃO DO PARTNER */
 if (send_form.partner.value=="") {
  alert("O Nome do parceiro é obrigatório!");
  return false;
 }
}