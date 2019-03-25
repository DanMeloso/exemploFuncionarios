function AdicionarNacionalidade()
{
    $('#form_nacionalidade').ajaxSubmit({
        url  : 'nacionalidade-criar-post.php',
        type : 'POST',
        success: function( data ){
            var opcao = document.createElement("option");
            var textoCompleto = data.split(";");
            var textoOpcao = document.createTextNode(textoCompleto[1]);


            opcao.appendChild(textoOpcao);
            document.getElementById('nacionalidade_id').appendChild(opcao);
            opcao.value = textoCompleto[0];

            $('#myModal').modal('hide');
        }
    });
}