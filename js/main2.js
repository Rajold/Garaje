document.getElementById("formAddUser").addEventListener("submit", async function (event) {
    event.preventDefault();

    const nombre = document.getElementById("nombre").value;
    const usuario = document.getElementById("usuario").value;
    const contrasena = document.getElementById("contrasena").value;
    const perfil = document.getElementById("perfil").value;
    const estado = document.getElementById("estado").value;
    const datos = { nombre, usuario, contrasena, perfil, estado };
    // alert (datos.perfil);
3
    try {
    const datos= {
        nombre, usuario, contrasena, perfil, estado};
        console.log(JSON.stringify(datos));
    
        const response = await fetch("controladores/registrar_usuario.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(datos),
        });

        const resultado = await response.json();
        document.getElementById("mensaje").textContent = resultado.message;
    } catch (error) {
        console.error("Error al registrar usuario:", error);
        document.getElementById("mensaje").textContent = "Error al conectar con el servidor.";
    }
});