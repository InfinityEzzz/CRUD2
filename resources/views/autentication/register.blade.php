<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="auth-body">
    <div class="register-container">
        <h1 class= "auth-h1">Registro</h1>
        <form method="POST" action="{{ route('autentication.registerUser') }}">
            @csrf
            <div class="form-group">
                <label class= "form-label" for="name">Nombre:</label>
                <input class= "form-group input" type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label class= "form-label" for="email">Email:</label>
                <input class= "form-group input" type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label class= "form-label" for="password">Password:</label>
                <input class= "form-group input" type="password" id="password" name="password" required>
            </div>
            <button class="btn auth-button">Guardar</button>
        </form>
        <p  class="link">¿Ya tienes una cuenta? <a href="{{ route('autentication.login') }}">Inicia sesión aquí</a></p>

    </div>
</body>

</html>