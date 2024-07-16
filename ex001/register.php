    <?php 
             $conn = new mysqli("localhost", "root", "1111", "cadastro");
            
            if ($conn->connect_error) {
                die("Conexão falhou: " . $conn->connect_error);
            }
            
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
                $email = isset($_POST['email']) ? $_POST['email'] : '';
                $password = isset($_POST['password']) ? $_POST['password'] : '';
            
                
                if (empty($nome) || empty($email) || empty($password)) {
                    die("Todos os campos são obrigatórios.");
                }
            
                
                $passwordHash = password_hash($password, PASSWORD_BCRYPT);
            
                
                $sql = "INSERT INTO users (full_name, email, password) VALUES ('$nome', '$email', '$passwordHash')";
            
                if ($conn->query($sql) === TRUE) {
                    echo "Registro criado com sucesso!";
                } else {
                    echo "Erro: " . $sql . "<br>" . $conn->error;
                }
            
                $conn->close();
            } else {
                die("Método de solicitação inválido.");
            }
        ?>