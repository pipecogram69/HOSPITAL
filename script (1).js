function validarCampos() {
    var usuario = document.getElementsByName("Usuario")[0].value;
    var contraseña = document.getElementsByName("Contraseña")[0].value;

    if (usuario === "" || contraseña === "") {
        alert("Por favor, rellene todos los campos.");
        return false; // Detiene el envío del formulario si los campos están vacíos
    }

    // Si todos los campos están llenos, el formulario se enviará
    document.getElementById("formulario").submit();
}

