function validarCampos() {
    var usuario = document.getElementById("Usuario").value;
    var contraseña = document.getElementById("Contraseña").value;

    if (usuario.trim() === "" || contraseña.trim() === "") {
        alert("Por favor, complete los campos de Usuario y Contraseña.");
        return false; // Evita que el formulario se envíe si los campos no están completos
    }
}



