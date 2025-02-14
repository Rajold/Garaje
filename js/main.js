const formLogin = document.querySelector('#formLogin');
const formAddUser = document.querySelector('#formAddUser');

formLogin.addEventListener('submit', (evento) => {
    evento.preventDefault();
    const datosForm = new FormData(formLogin);

    fetch('controladores/Login.php', {
            method: "POST",
            body: datosForm
        })
        .then(resp => resp.json())
        .then(datos => {
            if (datos.estado === 'success' && datos.perfil=== 'admin') {
                window.location.href = 'admin.html';
            } else if (datos.estado=== 'success' && datos.perfil=== 'operador'){
                window.location.href= 'loged.html';
            }
                alert('Login fallido');
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Ocurrió un error durante el login. Por favor, inténtelo de nuevo.');
        });
});

formAddUser.addEventListener('submit', (evento) => {
    evento.preventDefault();
    const datosForm = new FormData(formAddUser);
    fetch('controladores/crear_usuario.php', {
      method: "POST",
      body: datosForm
    })
    .then(resp => resp.json())
    .then(datos => {
      if (datos.estado === 'success') {
        alert('Usuario creado con éxito');
      } else {
        alert('Error al crear el usuario');
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('Ocurrió un error durante la creación del usuario. Por favor, inténtelo de nuevo.');
    });
});