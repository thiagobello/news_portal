
$('#send_form').on('submit',function(e){
    console.log('tentou');
e.preventDefault();

var partner = $('#partner').val();
var link = $('#link').val();



    $.ajax({
        url: '/parceiros-salvar',
        type: 'POST',
        dataType: 'JSON',
        data: {
            partner: partner,
            link: link
        }
        }).done(function(obj){ 
            let id = obj.id;
            let formData = new FormData();
            formData.append("image",$('#image')[0].files[0]);
            
        $.ajax({
            url: '/partner-image/' + id,
            type: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formData 
        })
    alert("Parceiro cadastrado com sucesso =)");
    document.getElementById("send_form").reset();
    });
}); 


