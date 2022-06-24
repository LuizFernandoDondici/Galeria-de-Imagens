
// Funções para alterar formulario de login e formulario de cadastro de usuario.

$('#change-to-cadastrar').click(function(){
    $('#form-save-user').animate({height: "toggle", opacity: "toggle"}, "slow");
    $('#form-loginto').css("display", "none")
 });

 $('#change-to-logar').click(function(){
    $('#form-loginto').animate({height: "toggle", opacity: "toggle"}, "slow");
    $('#form-save-user').css("display", "none")
 });

