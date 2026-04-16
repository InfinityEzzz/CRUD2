<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="auth-body">
    <div class="error-container">
        <h1>Error</h1>
        <p>Usuario o contraseña incorrectos. Por favor, inténtalo de nuevo.</p>
        <a href="{{ route('autentication.login') }}" class="btn">Volver al login</a>
    </div>
</body>
</html> 