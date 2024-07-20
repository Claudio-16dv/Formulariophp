<?php 
            if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password'])){
                $conn = new mysqli("localhost", "root", "1111", "cadastro");
                $email = $_POST['email'];
                $password = $_POST['password'];

                print_r('Email: ' . $email);
                //$sql = "SELECT * FROM users WHERE email = '$email' end password = '$password'";

                //$result = $conn->query($sql);

                //if(mysqli_num_rows($result) < 1){
                    //print_r('Não existe');
                //}else{
                  //  print_r('Existe');
                //}
            }
            else
            {
                header('location: login.php');
            }
        
        ?>