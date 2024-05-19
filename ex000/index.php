<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Formulário Teste</h1>
    </header>
    <section>
        <form action="form.php" method="post">
        <label for="nome">Nome Completo</label>
        <input type="text" name="nome" id="idnome">
        <label for="data">Data de Nascimento</label>
        <input type="date" name="data" id="iddata">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="idemail">
        <label for="bio">Sobre Você</label>
        <textarea name="bio" id="idbio" cols="30" rows="10"></textarea>
        <input type="submit" value="Enviar" >
        </form>
    </section>

</body>
</html>