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
        <h1>Formulário de Cadastro</h1>
    </header>
        <section>
            <form action="login.php" method="post">
            <label for="nome">Nome Completo:</label>
            <input type="text" name="nome" id="idnome">
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="idemail">
            <label for="password">Crie uma senha:</label>
            <input type="password" name="password" id="idpassword">
            <input type="submit" value="Criar Conta" >
            </form>
        </section>
</body>
</html>