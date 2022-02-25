<?php
    $host = getenv("HOST");
    $username = getenv("USERNAME");
    $password = getenv("PASSWORD");
    $db_name = getenv("DATABASE_NAME");
 
    $connection = new \MySQLi($host, $username, $password, $db_name);

    if($connection->connect_error){
        die("Desconectado! Erro: " . $connection->connect_error);
    }else{
        echo "Banco de dados conectado!\n";
    }
     
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $name =  isset($_POST["name"])
            ? $_POST["name"] : "Não informado";
        $email = isset($_POST["email"])
            ? $_POST["email"] : "Não informado";
        $password = isset($_POST["password"])
            ? $_POST["password"] : "Não informado";
        $checked_password = isset($_POST["check_password"])
            ? $_POST["check_password"] : "Não informado";

        if ($checked_password === $password) {
            $sql = "INSERT INTO user (name, email, password) VALUES ('{$name}', '{$email}', '{$password}')";

            if ($connection->query($sql)) {
                echo "New record created successfully\n";
            } else {
                echo "Error: " . $sql . "<br>" . $connection->error . "\n";
            }
            echo "Olá <strong>$name</strong>, seu é email é $email e seu acesso seria $password<br>\n";
        } else {
            echo "Ocorreu um erro: as senhas estão diferentes!\n";
        }
        $connection->close();
    }
?>