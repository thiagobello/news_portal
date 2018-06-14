
$('#send_form').on('submit',function(e){
    console.log('tentou');
e.preventDefault();

var id = $('#id').val();
var category = $('#category').val();
var title = $('#title').val();
var date = $('#date').val(); // Caso esteja usando biblioteca de data, o método muda
var notice = $('#notice').val();


    $.ajax({
        url: '/noticias-editar-salvar',
        type: 'POST',
        dataType: 'JSON',
        data: {
            id: id,
            category: category,
            title: title,
            date: date,
            notice: notice
        }
        }).done(function(obj){ 
            let id_update = obj.id;
            let formData = new FormData();
            formData.append("image",$('#image')[0].files[0]);
            
        $.ajax({
            url: '/save-image/' + id_update,
            type: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formData 
        })
    });
}); 


