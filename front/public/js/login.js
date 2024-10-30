document.addEventListener('DOMContentLoaded', function() {
    const loginButton = document.getElementById('loginButton');

    // Añadir evento clic al botón de login
    loginButton.addEventListener('click', function() {
        // Obtener los valores del formulario
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        // Validar que los campos no estén vacíos
        if (!email || !password) {
            // Mostrar mensaje de error si los campos están vacíos
            document.getElementById('error-message').textContent = 'Por favor, complete todos los campos.';
            document.getElementById('error-message').style.display = 'block';
            return;
        }

        fetch('/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                email: email,
                password: password
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la autenticación'); 
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                localStorage.setItem('authToken', data.token);
                window.location.href = '/home';
            } else {
                document.getElementById('error-message').textContent = data.message;
                document.getElementById('error-message').style.display = 'block';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('error-message').textContent = 'Ocurrió un problema al intentar iniciar sesión.';
            document.getElementById('error-message').style.display = 'block';
        });
    });
});