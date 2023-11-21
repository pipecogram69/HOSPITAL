document.getElementById("password").addEventListener("input", function() {
    var password = document.getElementById("password").value;
    var mensajeError = "";

    if (password.length < 8) {
        mensajeError += "La contraseña debe tener al menos 8 caracteres. ";
    }
    if (!/[A-Z]/.test(password)) {
        mensajeError += " ,debe contener al menos una letra mayúscula. ";
    }
    if (!/\d/.test(password)) {
        mensajeError += ", debe contener al menos un número. ";
    }
    if (!/[^A-Za-z0-9]/.test(password)) {
        mensajeError += ", contener al menos un carácter especial. ";
    }

    document.getElementById("mensaje-error").textContent = mensajeError;
});
