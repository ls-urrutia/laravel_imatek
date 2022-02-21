
/* Mostrar contrasena en formulario usuario */
function mostrarContrasena(){
    var tipo = document.getElementById("password");
    if(tipo.type == "password"){
        tipo.type = "text";
    }else{
        tipo.type = "password";
    }
}
function mostrarContrasena2(){
    var tipo = document.getElementById("password_confirmation");
    if(tipo.type == "password"){
        tipo.type = "text";
    }else{
        tipo.type = "password";
    }
}
