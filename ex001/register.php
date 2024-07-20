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
            <form action="" method="post">
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
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $conn = new mysqli("localhost", "root", "1111", "cadastro");
                
                if ($conn->connect_error) {
                    die("Conexão falhou: " . $conn->connect_error);
                }
                
                $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
                $email = isset($_POST['email']) ? $_POST['email'] : '';
                $password = isset($_POST['password']) ? $_POST['password'] : '';

                if (empty($nome) || empty($email) || empty($password)) {
                    die("Todos os campos são obrigatórios.");
                }
                
                $passwordHash = password_hash($password, PASSWORD_BCRYPT);
                $sql = "INSERT INTO users (full_name, email, password) VALUES ('$nome', '$email', '$passwordHash')";
                
                if ($conn->query($sql) === TRUE) {
                    header("Location: login.php");
                    exit();
                } else {
                    echo "<p>Erro: " . $sql . "<br>" . $conn->error . "</p>";
                }
                
                $conn->close();
            }
        ?>

</body>
</html>