const formLogin = document.querySelector('#formLogin');

formLogin.addEventListener('submit', (evento) => {
    evento.preventDefault();
    const datosForm = new FormData(formLogin);

    fetch('controladores/Login.php', {
            method: "POST",
            body: datosForm
        })
        .then(resp => resp.json())
        .then(datos => {
            if (datos.estado === 'success') {
                window.location.href = 'loged.html';
            } else {
                alert('Login fallido');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Ocurrió un error durante el login. Por favor, inténtelo de nuevo.');
        });
});
