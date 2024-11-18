function validacaoEmail(field) {
usuario = field.value.substring(0, field.value.indexOf("@"));
dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length);

if ((usuario.length >=1) &&
    (dominio.length >=3) &&
    (usuario.search("@")==-1) &&
    (dominio.search("@")==-1) &&
    (usuario.search(" ")==-1) &&
    (dominio.search(" ")==-1) &&
    (dominio.search(".")!=-1) &&
    (dominio.indexOf(".") >=1)&&
    (dominio.lastIndexOf(".") < dominio.length - 1)) {
//document.getElementById("msgemail").innerHTML="E-mail válido";
//swal("E-mail valido");
}
else{
//document.getElementById("msgemail").innerHTML="<font color='red'>E-mail inválido </font>";
swal("E-mail invalido!");
}
}


function verificaForcaDaSenha()
{
       var passwordTextBox = document.getElementById("senha");
       var password = passwordTextBox.value;
       var caracteresEspeciais = "!£$%^&*_@#~?";
       var passwordPontos = 0;
       passwordTextBox.style.color = "white";
       // Contém caracteres especiais
       for (var i = 0; i < password.length; i++)
       {
           if (caracteresEspeciais.indexOf(password.charAt(i)) > -1)
           {
                 passwordPontos += 20;
                 break;
           }
       }
       // Contém numeros
       if (/\d/.test(password))
           passwordPontos += 20;
       // Contém letras minúsculas
       if (/[a-z]/.test(password))
           passwordPontos += 20;
       // Contém letras maiúsculas
       if (/[A-Z]/.test(password))
           passwordPontos += 20;
       if (password.length >= 8)
           passwordPontos += 20;
       var forcaSenha = "";
       var backgroundColor = "red";
       if (passwordPontos >= 100)
       {
          forcaSenha = "Forte";
           backgroundColor = "green";
       }
       else if (passwordPontos >= 80)
       {
          forcaSenha = "Média";
          backgroundColor = "gray";
       }
       else if (passwordPontos >= 60)
       {
           forcaSenha = "Fraca";
           backgroundColor = "maroon";
       }
       else
       {
          forcaSenha = "Muito Fraca";
          backgroundColor = "red";
       }
       document.getElementById("mensagem").innerHTML = forcaSenha;
       passwordTextBox.style.backgroundColor = backgroundColor;
}