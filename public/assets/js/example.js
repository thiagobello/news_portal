function CKupdate(){
    for ( instance in CKEDITOR.instances ){
        CKEDITOR.instances[instance].updateElement();
    }
    CKEDITOR.instances[instance].setData('Digite a notícia...');
} 

$('#send_form').on('submit',function(e){

e.preventDefault();

var user = $('#user').val();
var category = $('#category').val();
var title = $('#title').val();
var date = $('#date').val(); // Caso esteja usando biblioteca de data, o método muda

CKupdate();

var notice = $('#notice').val();


    $.ajax({
        url: '/noticias-criar',
        type: 'post',
        dataType: 'JSON',
        data: {
            user: user,
            category: category,
            title: title,
            date: date,
            notice: notice
        }
        }).done(function(obj){ 
            let id = obj.id;

            let formData = new FormData();
            formData.append("image",$('#image')[0].files[0]);
            
        $.ajax({
            url: '/save-image/' + id, // AQUI SÓ ALTERAR A ROTA ANTES DO '?'
            type: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formData
        })
    alert("Noticia cadastrada com sucesso :)");
    document.getElementById("send_form").reset();
    CKupdate();
    });

});
    


