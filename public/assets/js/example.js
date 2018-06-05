
$('#send_form').on('submit',function(e){
    console.log('tentou');
e.preventDefault();

var user = $('#user').val();
var category = $('#category').val();
var title = $('#title').val();
var date = $('#date').val(); // Caso esteja usando biblioteca de data, o método muda
var notice = $('#notice').summernote('code'); // aqui seria pegando com SUMMERNOTE  


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
    });
});
