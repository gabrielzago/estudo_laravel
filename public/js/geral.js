function getCidades(){
    var estado = $('#estado_id').val();

    if(estado*1 <= 0){
        alert('Informe o estado');
        return;
    }
    var _token = $("input[name='_token']").val();
    $("#cidade_id").empty();
    $('#cidade_id').append('<option value="-1">Selecione</option>');
    $.ajax({
        type: "GET",
        url: '/cidades/ajaxcidade',
        dataType:'json',
        data:{estado:estado, _token:_token},
        success: function(o){
            for (i = 0; i <= o.length; i++) {
                $('#cidade_id').append('<option value="' + o[i].id + '">' + o[i].nome + '</option>');
            }
        },
    });
}
