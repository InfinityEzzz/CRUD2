<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="auth-body">
    <div class="login-container">
        <h1 class= "auth-h1">Login</h1>
        <form method="POST" action="{{ route('autentication.loginUser') }}">
            @csrf
            <div class="form-group">
                <label class= "form-label" for="email">Email:</label>
                <input class= "form-group input" type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label class= "form-label" for="password">Password:</label>
                <input class= "form-group input" type="password" id="password" name="password" required>
            </div>
            <button class="auth-button" type="submit">Accesar</button>
        </form>

        <br><p  class="link">¿No tienes una cuenta? <a href="{{ route('autentication.register') }}">Registrate aquí</a></p>
    </div>
</body>

</html>