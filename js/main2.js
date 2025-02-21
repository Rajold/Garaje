
document.getElementById("formAddUser").addEventListener("submit", async function (event) {
    event.preventDefault();

    const nombre = document.getElementById("nombre").value;
    const usuario = document.getElementById("usuario").value;
    const contrasena = document.getElementById("contrasena").value;
    const perfil = document.getElementById("perfil").value;
    const estado = document.getElementById("estado").value;
    
    const datos = { nombre, usuario, contrasena, perfil, estado }; // Solo una definición
    
    try {
        //console.log("Enviando datos:", JSON.stringify(datos));
        
        const response = await fetch("controladores/registrar_usuario.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(datos),
        });
        
        const text = await response.text(); // Para depurar la respuesta del servidor
        console.log("Respuesta del servidor:", text);
        
        const resultado = JSON.parse(text); // Convertir a JSON después de revisar
        document.getElementById("mensaje").textContent = resultado.message;
    } catch (error) {
        console.error("Error al registrar usuario:", error);
        document.getElementById("mensaje").textContent = "Error al conectar con el servidor.";
    }
})
;