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

        <?php 
            $conexao = mysqli_connect("localhost","root","1234","cadastro");

            $email = $_POST['email'];
            $email = mysqli_real_escape_string($conexao, $email);
            $sql = "SELECT email FROM cadastro.users WHERE email='$email'";
            $retorno = mysqli_query($conexao, $sql);

            if(mysqli_num_rows($retorno)>0){
                echo "Usuário Cadastrado";
            } else {
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                $sql = "INSERT INTO cadastro.users(nome,email,password) values('$nome', '$email', '$password')";
                $resultado = mysqli_query($conexao, $sql);
            }
        ?>
</body>
</html>