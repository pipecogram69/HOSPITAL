function confirmarYRedirigir(destino) {
    // Get values from the input fields
    var usuario = document.getElementsByName("Us")[0].value;
    var contraseña = document.getElementsByName("Con")[0].value;

    // Example validation - Replace this with your actual validation logic
    if (usuario === "doctor" && contraseña === "password") {
        window.location.href = destino; // Redirect to the specified destination
    } 
}
