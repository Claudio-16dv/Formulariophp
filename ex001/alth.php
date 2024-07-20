<?php 
            if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password'])){
                include('conn.php');
                $email = $_POST['email'];
                $password = $_POST['password'];


                $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
                $stmt->bind_param("s", $email);
                $stmt->execute();

                $result = $stmt->get_result();

                $row = $result->fetch_assoc();

                if(!password_verify($password, $row['password'])){
                    
                    print('Senha ou E-mail não está');
                }else {
                    session_start();
                    $_SESSION['email'] = $email;
                    header('location: welcome.php');
                }
            }
        ?>