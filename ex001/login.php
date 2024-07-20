<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Página de Login</h1>
    </header>
        <section>
            <form action="test.php" method="post">
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="idemail">
            <label for="password">Senha:</label>
            <input type="password" name="password" id="idpassword">
            <input type="submit" name="submit" value="Entrar" >
            <input type="button" value="Criar conta" onclick="window.location.href='register.php'">
            </form>
        </section>
</body>
</html>