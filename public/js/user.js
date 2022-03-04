
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


$('.btn-danger').on('click', confirmacionDelete);



function confirmacionDelete() {

    var result = confirm("¿¿Seguro que quieres eliminarlo!!?? Cualquier eliminación podría afectar gravemente las operaciones y estados del equipo.");

    if (result) {
        alert("Eliminado con éxito")
    }else {
        return false;
    }

};
